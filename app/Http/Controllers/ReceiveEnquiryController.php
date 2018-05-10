<?php

namespace App\Http\Controllers;

use App\Location;
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
            'postcode' => 'nullable|digits_between:3,4',
            'state' => 'nullable',
            'email' => 'required|email',
            'phone' => 'required| min:8 |max:14',
            'howhear' => 'required',
            'module_delivery_date' => 'required|date|after:now',
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
        //$to = "iwmaclagan@gmail.com";

        $to = env('MAIL_ENQUIRIES_TO', "john@mrselfstorage.com.au");

        // $locations = Location::all();

        // $raw = $request->all();

        // $data['contact_data'] = $raw['contact_data'];


        // $data['locations'] = Location::all();
        // dd($request->all());
        $data=[];


        // Prepart $request->cart
        $cartFields = [
            'description',
            'qty_ordered',
            'price',
            'ext_price'
        ];

        $products = [];
        foreach($request->cart['products'] as $p){
            foreach($p as $key => $val){
                if(in_array($key,$cartFields)){
                    $products[$p['id']][$key] = $val;
                }       
            }
        }

        $data['contact_data'] = $request->contact_data;
        $data['pickup_location'] = Location::find($request->cart['pickupLocation']);
        $data['return_location'] = Location::find($request->cart['returnLocation']);
        $data['products'] = $products;
        $data['costs'] = $request->cost;
        $data['premiums'] = $request->premiums;
        $data['service'] = $request->service;
        $data['removal'] = $request->removal_fee;
        $data['prepayment_interest'] = $request->prepayment_interest;

        //dd($data);

        Mail::to($to)->send(new \App\Mail\NewEnquiry($data));
    }
}
