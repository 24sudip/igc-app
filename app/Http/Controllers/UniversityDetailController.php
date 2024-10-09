<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UniversityDetail, University};
use Session;
use File;

class UniversityDetailController extends Controller
{
    public function UniversityDetailIndex() {
        return view('university-detail.index', [
            'university_details'=>UniversityDetail::all()
        ]);
    }

    public function UniversityDetailCreate() {
        return view('university-detail.create', [
            'universities'=>University::get(['id','name'])
        ]);
    }

    public function UniversityDetailStore(Request $request) {
        $request->validate([
            'university_id'=>'required',
            'website'=>'required',
        ]);
        $university_detail = new UniversityDetail();
        if ($request->hasFile('university_detail_photo')) {
            $request->validate([
                'university_detail_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->university_detail_photo->getClientOriginalName();
            $filePath = $request->university_detail_photo->storeAs('public/university_detail_photo', $fileName);
            $university_detail->university_detail_photo = $fileName;
        }
        $university_detail->university_id = $request->university_id;
        $university_detail->website = $request->website;
        $university_detail->about = $request->about;
        $university_detail->save();
        Session::flash('success_message','University Detail Created Successfully!');
        return redirect()->route('university.detail.index');
    }

    public function UniversityDetailShow($id) {
        return view('university-detail.show', [
            'university_detail'=>UniversityDetail::findOrFail($id),
        ]);
    }

    public function UniversityDetailEdit($id) {
        return view('university-detail.edit', [
            'university_detail'=>UniversityDetail::findOrFail($id),
            'universities'=>University::get(['id','name'])
        ]);
    }

    public function UniversityDetailUpdate(Request $request, $id) {
        $request->validate([
            'university_id'=>'required',
            'website'=>'required',
        ]);
        $university_detail = UniversityDetail::findOrFail($id);
        if ($request->hasFile('university_detail_photo')) {
            $request->validate([
                'university_detail_photo'=>'image'
            ]);
            if ($university_detail->university_detail_photo) {
                if (file_exists(public_path('storage/university_detail_photo/'.$university_detail->university_detail_photo))) {
                    File::delete(public_path('storage/university_detail_photo/'.$university_detail->university_detail_photo));
                }
            }
            $fileName = time().'_'. $request->university_detail_photo->getClientOriginalName();
            $filePath = $request->university_detail_photo->storeAs('public/university_detail_photo', $fileName);
            $university_detail->university_detail_photo = $fileName;
        }
        $university_detail->university_id = $request->university_id;
        $university_detail->website = $request->website;
        $university_detail->about = $request->about;
        $university_detail->save();
        Session::flash('success_message','University Detail Updated Successfully!');
        return redirect()->route('university.detail.index');
    }

    public function UniversityDetailDelete($id) {
        $university_detail = UniversityDetail::findOrFail($id);
        if ($university_detail->university_detail_photo) {
            if (file_exists(public_path('storage/university_detail_photo/'.$university_detail->university_detail_photo))) {
                File::delete(public_path('storage/university_detail_photo/'.$university_detail->university_detail_photo));
            }
        }
        $university_detail->delete();
        Session::flash('success_message','University Detail Deleted Successfully!');
        return redirect()->route('university.detail.index');
    }
}
