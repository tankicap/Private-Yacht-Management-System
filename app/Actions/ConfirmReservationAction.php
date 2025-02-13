<?php

namespace App\Actions;

use App\Enums\ReservationStatus;
use App\Models\Reservation;

class ConfirmReservationAction
{
    public function execute(Reservation $reservation)
    {
        $reservation->update(['status'=>ReservationStatus::CONFIRMED]);
    }
}
