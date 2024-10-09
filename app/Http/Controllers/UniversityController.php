<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{University, Country};
use Session;
use File;

class UniversityController extends Controller
{
    public function UniversityIndex() {
        return view('university.index', [
            'universities'=>University::all()
        ]);
    }

    public function UniversityCreate() {
        return view('university.create', [
            'countries'=>Country::get(['id','name'])
        ]);
    }

    public function UniversityStore(Request $request) {
        $request->validate([
            'country_id'=>'required',
            'name'=>'required',
        ]);
        $university = new University();
        if ($request->hasFile('university_logo')) {
            $request->validate([
                'university_logo'=>'image'
            ]);
            $fileName = time().'_'. $request->university_logo->getClientOriginalName();
            $filePath = $request->university_logo->storeAs('public/university_logo', $fileName);
            $university->university_logo = $fileName;
        }
        $university->country_id = $request->country_id;
        $university->name = $request->name;
        $university->status = $request->status;
        $university->save();
        Session::flash('success_message','University Created Successfully!');
        return redirect()->route('university.index');
    }

    public function UniversityEdit($id) {
        return view('university.edit', [
            'university'=>University::findOrFail($id),
            'countries'=>Country::get(['id','name'])
        ]);
    }

    public function UniversityUpdate(Request $request, $id) {
        $request->validate([
            'country_id'=>'required',
            'name'=>'required',
        ]);
        $university = University::findOrFail($id);
        if ($request->hasFile('university_logo')) {
            $request->validate([
                'university_logo'=>'image'
            ]);
            if ($university->university_logo) {
                if (file_exists(public_path('storage/university_logo/'.$university->university_logo))) {
                    File::delete(public_path('storage/university_logo/'.$university->university_logo));
                }
            }
            $fileName = time().'_'. $request->university_logo->getClientOriginalName();
            $filePath = $request->university_logo->storeAs('public/university_logo', $fileName);
            $university->university_logo = $fileName;
        }
        $university->country_id = $request->country_id;
        $university->name = $request->name;
        $university->status = $request->status;
        $university->save();
        Session::flash('success_message','University Updated Successfully!');
        return redirect()->route('university.index');
    }

    public function UniversityDelete($id) {
        $university = University::findOrFail($id);
        if ($university->university_logo) {
            if (file_exists(public_path('storage/university_logo/'.$university->university_logo))) {
                File::delete(public_path('storage/university_logo/'.$university->university_logo));
            }
        }
        $university->delete();
        Session::flash('success_message','University Deleted Successfully!');
        return redirect()->route('university.index');
    }
}
