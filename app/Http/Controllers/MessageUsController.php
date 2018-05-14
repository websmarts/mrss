<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;




class MessageUsController extends Controller
{
    
    public function index(Request $request)
    {
        $validator = Validator::make($request->input('form_data'), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required| min:8 |max:14',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422 );
        }


        $this->emailEnquiry($request);
        
        
        return response()->json($request->all());
       
    }
    private function emailEnquiry($request)
    {
        //$to = "iwmaclagan@gmail.com";

        $to = env('MAIL_ENQUIRIES_TO', "john@mrselfstorage.com.au");      

        Mail::to($to)->send(new \App\Mail\MessageUs($request->input('form_data')));
    }
}
