<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{CountryDetail, Country};
use Session;
use File;

class CountryDetailController extends Controller
{
    public function CountryDetailIndex() {
        return view('countryDetail.index', [
            'country_details'=>CountryDetail::all()
        ]);
    }

    public function CountryDetailCreate() {
        return view('countryDetail.create', [
            'countries'=>Country::get(['id','name'])
        ]);
    }

    public function CountryDetailStore(Request $request) {
        $request->validate([
            'country_id'=>'required',
            'first_collapsible_description_title'=>'required',
            'second_collapsible_description_title'=>'required',
            'third_collapsible_description_title'=>'required',
        ]);
        $country_detail = new CountryDetail();
        if ($request->hasFile('country_detail_photo')) {
            $request->validate([
                'country_detail_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->country_detail_photo->getClientOriginalName();
            $filePath = $request->country_detail_photo->storeAs('public/country_detail_photo', $fileName);
            $country_detail->country_detail_photo = $fileName;
        }
        $country_detail->country_id = $request->country_id;
        $country_detail->description = $request->description;
        $country_detail->first_collapsible_description_title = $request->first_collapsible_description_title;
        $country_detail->first_collapsible_description = $request->first_collapsible_description;
        $country_detail->second_collapsible_description_title = $request->second_collapsible_description_title;
        $country_detail->second_collapsible_description = $request->second_collapsible_description;
        $country_detail->third_collapsible_description_title = $request->third_collapsible_description_title;
        $country_detail->third_collapsible_description = $request->third_collapsible_description;
        $country_detail->save();
        Session::flash('success_message','Country Detail Created Successfully!');
        return redirect()->route('country.detail.index');
    }

    public function CountryDetailEdit($id) {
        return view('countryDetail.edit', [
            'country_detail'=>CountryDetail::findOrFail($id),
            'countries'=>Country::get(['id','name'])
        ]);
    }

    public function CountryDetailUpdate(Request $request, $id) {
        $request->validate([
            'country_id'=>'required',
            'first_collapsible_description_title'=>'required',
            'second_collapsible_description_title'=>'required',
            'third_collapsible_description_title'=>'required',
        ]);
        $country_detail = CountryDetail::findOrFail($id);
        if ($request->hasFile('country_detail_photo')) {
            $request->validate([
                'country_detail_photo'=>'image'
            ]);
            if ($country_detail->country_detail_photo) {
                if (file_exists(public_path('storage/country_detail_photo/'.$country_detail->country_detail_photo))) {
                    File::delete(public_path('storage/country_detail_photo/'.$country_detail->country_detail_photo));
                }
            }
            $fileName = time().'_'. $request->country_detail_photo->getClientOriginalName();
            $filePath = $request->country_detail_photo->storeAs('public/country_detail_photo', $fileName);
            $country_detail->country_detail_photo = $fileName;
        }
        $country_detail->country_id = $request->country_id;
        $country_detail->description = $request->description;
        $country_detail->first_collapsible_description_title = $request->first_collapsible_description_title;
        $country_detail->first_collapsible_description = $request->first_collapsible_description;
        $country_detail->second_collapsible_description_title = $request->second_collapsible_description_title;
        $country_detail->second_collapsible_description = $request->second_collapsible_description;
        $country_detail->third_collapsible_description_title = $request->third_collapsible_description_title;
        $country_detail->third_collapsible_description = $request->third_collapsible_description;
        $country_detail->save();
        Session::flash('success_message','Country Detail Updated Successfully!');
        return redirect()->route('country.detail.index');
    }

    public function CountryDetailDelete($id) {
        $country_detail = CountryDetail::findOrFail($id);
        if ($country_detail->country_detail_photo) {
            if (file_exists(public_path('storage/country_detail_photo/'.$country_detail->country_detail_photo))) {
                File::delete(public_path('storage/country_detail_photo/'.$country_detail->country_detail_photo));
            }
        }
        $country_detail->delete();
        Session::flash('success_message','Country Detail Deleted Successfully!');
        return redirect()->route('country.detail.index');
    }
}
