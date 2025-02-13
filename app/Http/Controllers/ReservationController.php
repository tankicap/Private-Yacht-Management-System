<?php

namespace App\Http\Controllers;

use App\Actions\CancelReservationAction;
use App\Actions\ConfirmReservationAction;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationController extends Controller
{
    //
    public function index(Request $request)
    {
        $status = $request->input('status');
        $reservations = Reservation::query()
            ->with('yacht')
            ->when($status, fn($query) => $query->where('status', $status))
            ->paginate();
        return ReservationResource::collection($reservations);
    }

    public function store(ReservationRequest $request){
        $reservation=Reservation::query()->create($request->validated());
        return ReservationResource::make($reservation);
    }

    public function confirmReservation(Reservation $reservation)
    {
        (new ConfirmReservationAction())->execute($reservation);
        return JsonResource::make([
            'message' => 'Reservation confirmed'
        ]);
    }
    public function cancelReservation(Reservation $reservation)
    {
        (new CancelReservationAction())->execute($reservation);
        return JsonResource::make([
            'message' => 'Reservation cancelled'
        ]);
    }

}
