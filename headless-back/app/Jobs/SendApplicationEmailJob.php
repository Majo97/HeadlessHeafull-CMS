<?php
namespace App\Jobs;

use App\Mail\ApplicationSubmittedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Application;

class SendApplicationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $application;

    /**
     * Create a new job instance.
     *
     * @param  Application  $application
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('hola@gmail.com')->send(new ApplicationSubmittedMail($this->application));
      /*  $companyMembers = $this->application->position->members;

        foreach ($companyMembers as $member) {
            Mail::to($member->email)->send(new ApplicationSubmittedMail($this->application));
        }*/
    }
}

