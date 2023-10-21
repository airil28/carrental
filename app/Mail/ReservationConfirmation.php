<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $vehicle;
    private $renter;
    /**
     * Create a new message instance.
     */
    public function __construct($vehicle, $renter)
    {
        $this->vehicle = $vehicle;
        $this->renter = $renter;
    }

    public function build()
    {
        return $this->from('your-email@example.com')
            ->view('emails.reservation-confirmation')
            ->with([
                'vehicle' => $this->vehicle,
                'renter' => $this->renter,
            ])
            ->subject('Reservation Confirmation');
    }

}
