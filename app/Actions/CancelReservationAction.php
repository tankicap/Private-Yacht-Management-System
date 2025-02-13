<?php

namespace App\Actions;

use App\Enums\ReservationStatus;
use App\Models\Reservation;

class CancelReservationAction
{
    public function execute(Reservation $reservation)
    {
        $reservation->update(['status'=>ReservationStatus::CANCELLED]);
    }
}
