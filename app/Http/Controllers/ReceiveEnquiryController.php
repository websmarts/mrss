<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class ReceiveEnquiryController extends Controller
{
    
    public function index(Request $request)
    {
        $validator = Validator::make($request->input('contact_data'), [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'suburb' => 'required',
            'postcode' => 'required',
            'state' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'howhear' => 'required',
            'module_delivery_date' => 'required',
            'comments' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422 );
        }


        $this->emailEnquiry($request);
        
        
        return response()->json($request->all());
       
    }
    private function emailEnquiry($request)
    {
        $to = "iwmaclagan@gmail.com";
        Mail::to($to)->send(new \App\Mail\NewEnquiry($request->all()));
    }
}
