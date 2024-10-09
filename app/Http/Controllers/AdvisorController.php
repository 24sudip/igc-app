<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use File;

class AdvisorController extends Controller
{
    public function AdvisorDashboard() {
        return view('advisor.advisor-dashboard');
    }

    public function AdvisorIndex() {
        return view('advisor.index', [
            'advisors'=>User::where('role','advisor')->get(['id','name','message','designation','phone','email','photo','priority','is_active'])
        ]);
    }

    public function AdvisorCreate() {
        return view('advisor.create');
    }

    public function AdvisorStore(Request $request) {
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
        $user->role = 'advisor';
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

        Session::flash('success_message','Advisor Created Successfully!');
        return redirect()->route('advisor.index');
    }

    public function AdvisorEdit($id) {
        return view('advisor.edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    public function AdvisorUpdate(Request $request, $id) {
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

        Session::flash('success_message','Advisor Updated Successfully!');
        return redirect()->route('advisor.index');
    }

    public function AdvisorShow($id) {
        return view('advisor.show', [
            'user' => User::findOrFail($id),
        ]);
    }

    public function AdvisorDelete($id) {
        $user = User::findOrFail($id);
        if ($user->photo) {
            if (file_exists(public_path('storage/profile_photo/'.$user->photo))) {
                File::delete(public_path('storage/profile_photo/'.$user->photo));
            }
        }
        $user->delete();
        Session::flash('success_message','Advisor Deleted Successfully!');
        return redirect()->route('advisor.index');
    }
}
