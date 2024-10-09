<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use File;

class TeamController extends Controller
{
    public function TeamDashboard() {
        return view('team.team-dashboard');
    }

    public function TeamIndex() {
        return view('team.index',[
            'teams'=>User::where('role','team')->get(['id','name','message','designation','phone','email','photo','priority'])
        ]);
    }

    public function TeamCreate() {
        return view('team.create');
    }

    public function TeamStore(Request $request) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:users',
        ]);

        $user = new User();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo'=>'image'
            ]);
            $fileName = time().'_'. $request->photo->getClientOriginalName();
            $filePath = $request->photo->storeAs('public/profile_photo', $fileName);
            $user->photo = $fileName;
        }

        $user->password = Hash::make($request->email);
        $user->role = 'team';
        $user->name = $request->name;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->message = $request->message;
        $user->professional_experience = $request->professional_experience;
        $user->education = $request->education;
        $user->research = $request->research;
        $user->publication = $request->publication;
        $user->is_active = $request->is_active;
        if ($request->priority) {
            $user->priority = $request->priority;
        }
        $user->save();

        Session::flash('success_message','Team Created Successfully!');
        return redirect()->route('team.index');
    }

    public function TeamEdit($id) {
        return view('team.edit',[
            'user' => User::findOrFail($id),
        ]);
    }

    public function TeamUpdate(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>['required','unique:users,email,'.$id],
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo'=>'image'
            ]);
            if ($user->photo) {
                if (file_exists(public_path('storage/profile_photo/'.$user->photo))) {
                    File::delete(public_path('storage/profile_photo/'.$user->photo));
                }
            }
            $fileName = time().'_'. $request->photo->getClientOriginalName();
            $filePath = $request->photo->storeAs('public/profile_photo', $fileName);
            $user->photo = $fileName;
        }

        $user->name = $request->name;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->email = $request->email;

        $user->message = $request->message;
        $user->professional_experience = $request->professional_experience;
        $user->education = $request->education;
        $user->research = $request->research;
        $user->publication = $request->publication;
        $user->is_active = $request->is_active;
        if ($request->priority) {
            $user->priority = $request->priority;
        }
        $user->save();

        Session::flash('success_message','Team Updated Successfully!');
        return redirect()->route('team.index');
    }

    public function TeamShow($id) {
        return view('team.show',[
            'user'=>User::findOrFail($id)
        ]);
    }

    public function TeamDelete($id) {
        $user = User::findOrFail($id);
        if ($user->photo) {
            if (file_exists(public_path('storage/profile_photo/'.$user->photo))) {
                File::delete(public_path('storage/profile_photo/'.$user->photo));
            }
        }
        $user->delete();
        Session::flash('success_message','Team Deleted Successfully!');
        return redirect()->route('team.index');
    }
}
