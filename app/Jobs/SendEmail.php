<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Email;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\Email\EmailService;

class SendEmail implements ShouldQueue
{

    use Queueable;
public $email ;
    /**
     * Create a new job instance.
     */
    public function __construct(Email $email)
    {
        $this->email = $email ;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       $users = User::whereNotNull('email')->get() ;

       foreach($users as $user){
        $emailService = new EmailService ;

        $details = [
            'title' => $user->subject ,
            'body' => $user->body
        ];
        $emailService->setDetails($details);
        $emailService->setFrom('s313dasht@gmail.com', 'protection');
        $emailService->setSubject($this->email->subject);
        $emailService->setTo($user->email);
        $messagesService = new MessageService($emailService);
        $messagesService->send();
       }
    }
}
