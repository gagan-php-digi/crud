<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Mail\WelcomeEmail;
use App\Jobs\sendmail;

class SendMailController extends Controller
{
    public function index() {
        $order=[
            'title'=>'this is mail from gagandeep',
            'body'=>'I  am successful php/laravel developer'
        ];
        Mail::to('gagandeepkaurchabhal@gmail.com')->send(new OrderShipped($order));
        echo "mail send success";
    }


    public function contactemail() {
         return view('email.contact-form');
    }



    public function sendcontactemail(Request $request) {

        $request->validate([
            'title'=>'required',
            'attachment'=>'required|mimes:pdf,docx,xls'
        ]);

        $fileName=time(). "." .$request->file('attachment')->extension();
        $request->file('attachment')->move('uploads',$fileName);
        // $adminEmail="gagandeepkaurchabhal@gmail.com";
        // $response=Mail::to($adminEmail)->send(new WelcomeEmail($request->all(),$fileName));
        $response=sendmail::dispatch($request->all(), $fileName);
        
        if($response) {
            echo "mail send successfully";
        }

        else {
            echo "error";
        }



    }


    
}
