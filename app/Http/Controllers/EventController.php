<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Session;
use File;

class EventController extends Controller
{
    public function EventIndex() {
        return view('event.index', [
            'events'=>Event::get(['id','title','event_date','venue','event_photo','status'])
        ]);
    }

    public function EventCreate() {
        return view('event.create');
    }

    public function EventStore(Request $request) {
        $request->validate([
            'title'=>'required',
            'event_date'=>'required',
            'venue'=>'required',
        ]);
        $event = new Event();
        if ($request->hasFile('event_photo')) {
            $request->validate([
                'event_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->event_photo->getClientOriginalName();
            $filePath = $request->event_photo->storeAs('public/event_photo', $fileName);
            $event->event_photo = $fileName;
        }
        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->venue = $request->venue;
        $event->description = $request->description;
        $event->status = $request->status;
        $event->save();
        Session::flash('success_message','Event Created Successfully!');
        return redirect()->route('event.index');
    }

    public function EventEdit($id) {
        return view('event.edit', [
            'event'=>Event::findOrFail($id)
        ]);
    }

    public function EventUpdate(Request $request, $id) {
        $request->validate([
            'title'=>'required',
            'event_date'=>'required',
            'venue'=>'required',
        ]);
        $event = Event::findOrFail($id);
        if ($request->hasFile('event_photo')) {
            $request->validate([
                'event_photo'=>'image'
            ]);
            if ($event->event_photo) {
                if (file_exists(public_path('storage/event_photo/'.$event->event_photo))) {
                    File::delete(public_path('storage/event_photo/'.$event->event_photo));
                }
            }
            $fileName = time().'_'. $request->event_photo->getClientOriginalName();
            $filePath = $request->event_photo->storeAs('public/event_photo', $fileName);
            $event->event_photo = $fileName;
        }
        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->venue = $request->venue;
        $event->description = $request->description;
        $event->status = $request->status;
        $event->save();
        Session::flash('success_message','Event Updated Successfully!');
        return redirect()->route('event.index');
    }

    public function EventDelete($id) {
        $event = Event::findOrFail($id);
        if ($event->event_photo) {
            if (file_exists(public_path('storage/event_photo/'.$event->event_photo))) {
                File::delete(public_path('storage/event_photo/'.$event->event_photo));
            }
        }
        $event->delete();
        Session::flash('success_message','Event Deleted Successfully!');
        return redirect()->route('event.index');
    }
}
