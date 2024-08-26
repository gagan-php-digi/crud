<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class sendmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    /**
     * Create a new job instance.
     */
    public function __construct($request,$fileName)
    {
       
       
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to('gagandeepkaurchabhal@gmail.com')->send(new WelcomeEmail());
    }
}
