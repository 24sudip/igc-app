<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Session;
use File;

class ReviewController extends Controller
{
    public function ReviewIndex() {
        return view('review.index', [
            'reviews'=>Review::all()
        ]);
    }

    public function ReviewCreate() {
        return view('review.create');
    }

    public function ReviewStore(Request $request) {
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'company'=>'required',
            'what_say'=>'required',
        ]);
        $review = new Review();
        if ($request->hasFile('review_photo')) {
            $request->validate([
                'review_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->review_photo->getClientOriginalName();
            $filePath = $request->review_photo->storeAs('public/review_photo', $fileName);
            $review->review_photo = $fileName;
        }
        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->company = $request->company;
        $review->what_say = $request->what_say;
        $review->status = $request->status;
        $review->save();
        Session::flash('success_message','Review Created Successfully!');
        return redirect()->route('review.index');
    }

    public function ReviewEdit($id) {
        return view('review.edit', [
            'review'=>Review::findOrFail($id)
        ]);
    }

    public function ReviewUpdate(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'company'=>'required',
            'what_say'=>'required',
        ]);
        $review = Review::findOrFail($id);
        if ($request->hasFile('review_photo')) {
            $request->validate([
                'review_photo'=>'image'
            ]);
            if ($review->review_photo) {
                if (file_exists(public_path('storage/review_photo/'.$review->review_photo))) {
                    File::delete(public_path('storage/review_photo/'.$review->review_photo));
                }
            }
            $fileName = time().'_'. $request->review_photo->getClientOriginalName();
            $filePath = $request->review_photo->storeAs('public/review_photo', $fileName);
            $review->review_photo = $fileName;
        }
        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->company = $request->company;
        $review->what_say = $request->what_say;
        $review->status = $request->status;
        $review->save();
        Session::flash('success_message','Review Updated Successfully!');
        return redirect()->route('review.index');
    }

    public function ReviewDelete($id) {
        $review = Review::findOrFail($id);
        if ($review->review_photo) {
            if (file_exists(public_path('storage/review_photo/'.$review->review_photo))) {
                File::delete(public_path('storage/review_photo/'.$review->review_photo));
            }
        }
        $review->delete();
        Session::flash('success_message','Review Deleted Successfully!');
        return redirect()->route('review.index');
    }
}
