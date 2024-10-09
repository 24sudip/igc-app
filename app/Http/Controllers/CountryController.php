<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Session;
use File;

class CountryController extends Controller
{
    public function CountryIndex() {
        return view('country.index', [
            'countries'=>Country::all()
        ]);
    }

    public function CountryCreate() {
        return view('country.create');
    }

    public function CountryStore(Request $request) {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        $country = new Country();
        if ($request->hasFile('country_photo')) {
            $request->validate([
                'country_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->country_photo->getClientOriginalName();
            $filePath = $request->country_photo->storeAs('public/country_photo', $fileName);
            $country->country_photo = $fileName;
        }
        $country->name = $request->name;
        $country->slug = $request->slug;
        $country->description = $request->description;
        $country->status = $request->status;
        $country->save();
        Session::flash('success_message','Country Created Successfully!');
        return redirect()->route('country.index');
    }

    public function CountryEdit($id) {
        return view('country.edit', [
            'country'=>Country::findOrFail($id)
        ]);
    }

    public function CountryUpdate(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        $country = Country::findOrFail($id);
        if ($request->hasFile('country_photo')) {
            $request->validate([
                'country_photo'=>'image'
            ]);
            if ($country->country_photo) {
                if (file_exists(public_path('storage/country_photo/'.$country->country_photo))) {
                    File::delete(public_path('storage/country_photo/'.$country->country_photo));
                }
            }
            $fileName = time().'_'. $request->country_photo->getClientOriginalName();
            $filePath = $request->country_photo->storeAs('public/country_photo', $fileName);
            $country->country_photo = $fileName;
        }
        $country->name = $request->name;
        $country->slug = $request->slug;
        $country->description = $request->description;
        $country->status = $request->status;
        $country->save();
        Session::flash('success_message','Country Updated Successfully!');
        return redirect()->route('country.index');
    }

    public function CountryDelete($id) {
        $country = Country::findOrFail($id);
        if ($country->country_photo) {
            if (file_exists(public_path('storage/country_photo/'.$country->country_photo))) {
                File::delete(public_path('storage/country_photo/'.$country->country_photo));
            }
        }
        $country->delete();
        Session::flash('success_message','Country Deleted Successfully!');
        return redirect()->route('country.index');
    }
}
