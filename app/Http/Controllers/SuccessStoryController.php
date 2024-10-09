<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuccessStory;
use Session;
use File;

class SuccessStoryController extends Controller
{
    public function SuccessStoryIndex() {
        return view('success-story.index', [
            'success_stories'=>SuccessStory::all()
        ]);
    }

    public function SuccessStoryCreate() {
        return view('success-story.create');
    }

    public function SuccessStoryStore(Request $request) {
        $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'university'=>'required',
            'country'=>'required',
            'file_open_date'=>'required',
            'visa_grant_date'=>'required',
            'processing_duration'=>'required'
        ]);
        $success_story = new SuccessStory();
        if ($request->hasFile('success_story_photo')) {
            $request->validate([
                'success_story_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->success_story_photo->getClientOriginalName();
            $filePath = $request->success_story_photo->storeAs('public/success_story_photo', $fileName);
            $success_story->success_story_photo = $fileName;
        }
        $success_story->name = $request->name;
        $success_story->subject = $request->subject;
        $success_story->university = $request->university;
        $success_story->country = $request->country;
        $success_story->file_open_date = $request->file_open_date;
        $success_story->visa_grant_date = $request->visa_grant_date;
        $success_story->processing_duration = $request->processing_duration;
        $success_story->story = $request->story;
        $success_story->status = $request->status;
        $success_story->save();
        Session::flash('success_message','Success Story Created Successfully!');
        return redirect()->route('success.story.index');
    }

    public function SuccessStoryEdit($id) {
        return view('success-story.edit', [
            'success_story'=>SuccessStory::findOrFail($id)
        ]);
    }

    public function SuccessStoryUpdate(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'university'=>'required',
            'country'=>'required',
            'file_open_date'=>'required',
            'visa_grant_date'=>'required',
            'processing_duration'=>'required'
        ]);
        $success_story = SuccessStory::findOrFail($id);
        if ($request->hasFile('success_story_photo')) {
            $request->validate([
                'success_story_photo'=>'image'
            ]);
            if ($success_story->success_story_photo) {
                if (file_exists(public_path('storage/success_story_photo/'.$success_story->success_story_photo))) {
                    File::delete(public_path('storage/success_story_photo/'.$success_story->success_story_photo));
                }
            }
            $fileName = time().'_'. $request->success_story_photo->getClientOriginalName();
            $filePath = $request->success_story_photo->storeAs('public/success_story_photo', $fileName);
            $success_story->success_story_photo = $fileName;
        }
        $success_story->name = $request->name;
        $success_story->subject = $request->subject;
        $success_story->university = $request->university;
        $success_story->country = $request->country;
        $success_story->file_open_date = $request->file_open_date;
        $success_story->visa_grant_date = $request->visa_grant_date;
        $success_story->processing_duration = $request->processing_duration;
        $success_story->story = $request->story;
        $success_story->status = $request->status;
        $success_story->save();
        Session::flash('success_message','Success Story Updated Successfully!');
        return redirect()->route('success.story.index');
    }

    public function SuccessStoryDelete($id) {
        $success_story = SuccessStory::findOrFail($id);
        if ($success_story->success_story_photo) {
            if (file_exists(public_path('storage/success_story_photo/'.$success_story->success_story_photo))) {
                File::delete(public_path('storage/success_story_photo/'.$success_story->success_story_photo));
            }
        }
        $success_story->delete();
        Session::flash('success_message','Success Story Deleted Successfully!');
        return redirect()->route('success.story.index');
    }
}
