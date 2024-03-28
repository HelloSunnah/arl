<?php

namespace App\Mail;

use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ScheduleCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }



    public function build()
    {
        return $this->view('email.schedule_created')
                    ->subject('New Schedule Created')
                    ->from('sunnah209@gmail.com', 'Sunnah');
    }

}
