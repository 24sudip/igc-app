<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Session;
use File;

class AboutController extends Controller
{
    public function AboutIndex() {
        return view('about.index',[
            'about'=>About::first(),
        ]);
    }

    public function AboutEdit() {
        return view('about.edit',[
            'about'=>About::first(),
        ]);
    }

    public function AboutUpdate(Request $request) {
        $about = About::first();
        if ($request->hasFile('mission_photo')) {
            $request->validate([
                'mission_photo'=>'image'
            ]);
            if ($about->mission_photo) {
                if (file_exists(public_path('storage/mission_photo/'.$about->mission_photo))) {
                    File::delete(public_path('storage/mission_photo/'.$about->mission_photo));
                }
            }
            $fileName = time().'_'. $request->mission_photo->getClientOriginalName();
            $filePath = $request->mission_photo->storeAs('public/mission_photo', $fileName);
            $about->mission_photo = $fileName;
        }

        if ($request->hasFile('vission_photo')) {
            $request->validate([
                'vission_photo'=>'image'
            ]);
            if ($about->vission_photo) {
                if (file_exists(public_path('storage/vission_photo/'.$about->vission_photo))) {
                    File::delete(public_path('storage/vission_photo/'.$about->vission_photo));
                }
            }
            $fileName = time().'_'. $request->vission_photo->getClientOriginalName();
            $filePath = $request->vission_photo->storeAs('public/vission_photo', $fileName);
            $about->vission_photo = $fileName;
        }

        if ($request->hasFile('achievements_photo')) {
            $request->validate([
                'achievements_photo'=>'image'
            ]);
            if ($about->achievements_photo) {
                if (file_exists(public_path('storage/achievements_photo/'.$about->achievements_photo))) {
                    File::delete(public_path('storage/achievements_photo/'.$about->achievements_photo));
                }
            }
            $fileName = time().'_'. $request->achievements_photo->getClientOriginalName();
            $filePath = $request->achievements_photo->storeAs('public/achievements_photo', $fileName);
            $about->achievements_photo = $fileName;
        }

        if ($request->hasFile('facilities_photo')) {
            $request->validate([
                'facilities_photo'=>'image'
            ]);
            if ($about->facilities_photo) {
                if (file_exists(public_path('storage/facilities_photo/'.$about->facilities_photo))) {
                    File::delete(public_path('storage/facilities_photo/'.$about->facilities_photo));
                }
            }
            $fileName = time().'_'. $request->facilities_photo->getClientOriginalName();
            $filePath = $request->facilities_photo->storeAs('public/facilities_photo', $fileName);
            $about->facilities_photo = $fileName;
        }

        if ($request->hasFile('activities_photo')) {
            $request->validate([
                'activities_photo'=>'image'
            ]);
            if ($about->activities_photo) {
                if (file_exists(public_path('storage/activities_photo/'.$about->activities_photo))) {
                    File::delete(public_path('storage/activities_photo/'.$about->activities_photo));
                }
            }
            $fileName = time().'_'. $request->activities_photo->getClientOriginalName();
            $filePath = $request->activities_photo->storeAs('public/activities_photo', $fileName);
            $about->activities_photo = $fileName;
        }
        
        $about->mission = $request->mission;
        $about->vission = $request->vission;
        $about->achievements = $request->achievements;
        $about->facilities = $request->facilities;
        $about->activities = $request->activities;
        $about->save();
        Session::flash('success_message','About Updated Successfully!');
        return redirect()->route('about.index');
    }
}
