<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnquiryRequest;
use App\Models\District;
use App\Models\Enquiry;
use App\Models\State;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class EnquiryController extends Controller
{
   public function store(CreateEnquiryRequest $request)
   {
        Enquiry::create($request->all());
        return Redirect::back()->with('success', 'Enquiry submitted successfully!');
   }

   public function getState(Request $request)
   {
        $states = State::all();

        return  response()->json($states);
   }
   public function getDistrict(Request $request)
   {
       $district = District::where('state_id',$request->state_id)->get();
       return  response()->json($district);
   }
}
