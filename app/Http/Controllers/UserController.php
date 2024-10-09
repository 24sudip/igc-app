<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, About, Country, CountryDetail, University, UniversityDetail, SuccessStory, Event, Review, Blog, Category};
use App\Models\{Comment, Contact, Student, Partner, Survey};
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index() {
        return view('frontend.index', [
            'about'=>About::first(),
            'events'=>Event::where('status', 1)->latest()->limit(3)->get(),
            'reviews'=>Review::where('status', 1)->latest()->limit(5)->get(['review_photo','name','what_say','company','designation']),
            'countries'=>Country::where('status', 1)->latest()->limit(3)->get(),
            'success_stories'=>SuccessStory::where('status', 1)->latest()->limit(3)->get(),
            'blogs'=>Blog::where('published', 1)->latest()->limit(4)->get(),
            'partners'=>Partner::where('status', 1)->latest()->limit(5)->get(['partner_photo','website']),
        ]);
    }

    public function FrontendStoreUser(Request $request) {
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
        Auth::login($user);

        return redirect(route('dashboard'));
    }

    public function UserDetail($id) {
        $user= User::findOrFail($id);
        if ($user->role == 'team' || $user->role == 'advisor') {
            return view('frontend.team-advisor-detail', compact('user'));
        } else {
            return "<h1>You Are Not Allowed</h1>";
        }
    }

    public function About() {
        return view('frontend.about', [
            'about'=>About::first()
        ]);
    }

    public function CountryList() {
        return view('frontend.country-list', [
            'countries'=>Country::where('status', 1)->latest()->paginate(6)
        ]);
    }

    public function CountryDetails($id, $slug) {
        $country_detail = CountryDetail::where('country_id', $id)->first();
        if ($country_detail == null) {
            return "<h1>Not Available</h1>";
        }
        return view('frontend.country-details', compact('country_detail'));
    }

    public function UniversityList() {
        return view('frontend.university-list', [
            'universities'=>University::where('status', 1)->latest()->paginate(6)
        ]);
    }

    public function UniversityDetail($id) {
        $university_detail= UniversityDetail::where('university_id', $id)->first();
        if ($university_detail == null) {
            return "<h1>Not Available</h1>";
        }
        return view('frontend.universityDetail', compact('university_detail'));
    }

    public function SuccessStoryList() {
        return view('frontend.success-story-list', [
            'success_stories'=>SuccessStory::where('status', 1)->latest()->paginate(6)
        ]);
    }

    public function SuccessStoryDetail($id) {
        return view('frontend.success-story-detail', [
            'success_story'=>SuccessStory::findOrFail($id)
        ]);
    }

    public function EventList() {
        return view('frontend.event-list', [
            'events'=>Event::where('status', 1)->latest()->paginate(6)
        ]);
    }

    public function BlogList() {
        return view('frontend.blog-list', [
            'blogs'=>Blog::where('published', 1)->latest()->paginate(5)
        ]);
    }

    public function BlogDetail($id, $slug) {
        return view('frontend.blog-detail', [
            'blog'=>Blog::findOrFail($id),
            'categories'=>Category::all(),
            'comments'=>Comment::where('blog_id', $id)->where('parent_id', null)->limit(5)->get()
        ]);
    }

    public function CategoryBlog($cat_id) {
        $blogs= Blog::where('category_id', $cat_id)->latest()->paginate(5);
        return view('frontend.category-blog', compact('blogs'));
    }

    public function StoreComment(Request $request) {
        $request->validate([
            'subject'=>'required',
            'message'=>'required',
        ]);
        $blog_id = $request->blog_id;
        Comment::insert([
            'user_id'=>Auth::user()->id,
            'blog_id'=>$blog_id,
            'parent_id'=>null,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>now()
        ]);
        Session::flash('frontend_message','Comment Added Successfully!');
        return redirect()->back();
    }

    public function Contact() {
        return view('frontend.contact', [
            'countries'=>Country::where('status', 1)->get(['name'])
        ]);
    }

    public function FrontendSurveyStore(Request $request) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'country'=>'required',
            'desired_level_of_education'=>'required',
        ]);
        $survey = new Survey();
        $survey->name = $request->name;
        $survey->phone = $request->phone;
        $survey->email = $request->email;
        $survey->country = $request->country;
        $survey->desired_level_of_education = $request->desired_level_of_education;
        $survey->save();
        Session::flash('frontend_message','Survey Created Successfully!');
        return redirect()->back();
    }

    public function StoreContact(Request $request) {
        if (Auth::check()) {
            $request->validate([
                'subject'=>'required',
                'message'=>'required',
            ]);
            Contact::create([
                'user_id'=>Auth::user()->id,
                'subject'=>$request->subject,
                'message'=>$request->message,
                // 'created_at'=>now()
            ]);
            Session::flash('frontend_message','Message Sent Successfully!');
            return redirect()->back();
        } else {
            Session::flash('frontend_message','Please Login Your Account First!');
            return redirect()->back();
        }
    }

    public function SearchUniversity(Request $request) {
        $search = $request->university_name;
        $universities = University::where('status', 1)->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->latest()->paginate(6);
        return view('frontend.searched-university', compact('universities'));
    }

    public function PrivacyPolicy() {
        return view('frontend.privacy-policy');
    }

    public function ManagementList() {
        return view('frontend.management-list', [
            'teams'=>User::where('role','team')->where('is_active', 1)->get()
        ]);
    }

    public function AdvisorList() {
        return view('frontend.advisor-list', [
            'advisors'=>User::where('role','advisor')->where('is_active', 1)->get()
        ]);
    }

    public function ReviewList() {
        return view('frontend.review-list', [
            'reviews'=>Review::where('status', 1)->paginate(6)
        ]);
    }
}
