<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Email;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use App\Actions\Email\StoreAction;
use App\Http\Controllers\Controller;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\Email\EmailService;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = Email::all();
        return view('admin.email.index',compact('emails')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.email.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , StoreAction $action)
    {
        // $data = $request->all() ;
     if($action->execute($request)){
        return redirect()->route('email.index') ;
     }
     else{
        return redirect()->route('email.index')->with('error' , 'error') ;
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function send(Email $email)
    {

        $user = User::whereNotNull('email')->get() ;


        //  $emailService = new EmailService ;
 
        //  $details = [
        //      'title' => $email->subject ,
        //      'body' => $email->body
        //  ];
        //  $emailService->setDetails($details);
        //  $emailService->setFrom('s313dasht@gmail.com', 'protectiooon');
        //  $emailService->setSubject($email->subject);
        //  $emailService->setTo('s313dasht@gmail.com');
        //  $messagesService = new MessageService($emailService);
        //  $messagesService->send();
    



        SendEmail::dispatch($email) ;
        return back();
        
        
    }
}
