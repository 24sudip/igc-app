<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Comment, Contact};
use Session;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class AdminController extends Controller
{
    public function AdminDashboard() {
        return view('admin.index');
    }

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function ManageAccount() {
        return view('admin.manage-account');
    }

    public function ChangeProfile(Request $request) {
        $request->validate([
            'name'=>'required'
        ]);
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        Session::flash('success_message','Profile Updated Successfully!');
        return redirect()->back();
    }

    public function ChangeEmail(Request $request) {
        $request->validate([
            'email'=>['required','unique:users,email,'.auth()->user()->id]
        ]);
        $user = User::findOrFail(Auth::id());
        $user->email = $request->email;
        $user->save();
        Session::flash('success_message','Email Updated Successfully!');
        return redirect()->back();
    }

    public function ChangePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation'=>'required'
        ]);
        $user = User::findOrFail(auth()->user()->id);
        if (Hash::check($request->old_password, auth()->user()->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            Session::flash('success_message','Password Changed Successfully!');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('Current Password Is Wrong');
        }
    }

    public function ProfileData() {
        $user = User::findOrFail(auth()->user()->id);
        $pdf = Pdf::loadView('admin.profile-data', compact('user'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('profileData.pdf');
    }

    public function RegisterUser() {
        return view('admin.register-user');
    }

    public function StoreUser(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->save();
        Session::flash('success_message','User Registered Successfully!');
        return redirect()->back();
    }

    public function AdminDelete() {
        $user = User::findOrFail(Auth::id());
        if ($user->photo) {
            if (file_exists(public_path('storage/profile_photo/'.$user->photo))) {
                File::delete(public_path('storage/profile_photo/'.$user->photo));
            }
        }
        $user->delete();
        Auth::logout();
        return redirect('/login');
    }

    public function AdminBlogComment() {
        $comments = Comment::where('parent_id', null)->latest()->get();
        return view('comment.comment-all', compact('comments'));
    }

    public function AdminCommentReply($id) {
        $comment = Comment::where('id', $id)->first();
        return view('comment.reply-comment', compact('comment'));
    }

    public function ReplyMessage(Request $request) {
        $id = $request->id;
        $user_id = $request->user_id;
        $blog_id = $request->blog_id;
        Comment::insert([
            'user_id'=>$user_id,
            'blog_id'=>$blog_id,
            'parent_id'=>$id,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>now()
        ]);
        Session::flash('success_message','Reply Added Successfully!');
        return redirect()->back();
    }

    public function ContactMessage() {
        return view('contact.contact-message', [
            'user_msg'=>Contact::latest()->get()
        ]);
    }

    public function ContactDetail($id) {
        $contact = Contact::findOrFail($id);
        return view('contact.contact-detail', compact('contact'));
    }

    public function ContactUpdate(Request $request, $id) {
        Contact::findOrFail($id)->update([
            'status'=>'1'
        ]);
        $send_mail = Contact::findOrFail($id);
        $data = [
            'subject'=>$send_mail->subject,
            'mail_text'=>$request->mail_text,
        ];
        Mail::to($request->email)->send(new ContactMail($data));
        Session::flash('success_message','You Have Confirmed Message By Email Successfully!');
        return redirect()->route('contact.message');
    }
}
