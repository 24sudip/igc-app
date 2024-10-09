<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Student, StudentTrack, Apply, EducationBackground, JobDetail, LanguageScore};
use Session;
use App\Exports\{StudentExport, EducationBackgroundExport, LanguageScoreExport, JobDetailExport, ApplyExport};
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function StudentIndex() {
        return view('student.index', [
            'students'=>Student::latest()->get(['id','created_at','name','phone','email'])
        ]);
    }

    public function StudentCreate() {
        return view('student.create');
    }

    public function StudentStore(Request $request) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'guardian_name'=>'required',
            'guardian_phone'=>'required',
            'guardian_email'=>'required',
            'guardian_relation'=>'required',
            'education_gap'=>'required',
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->guardian_name = $request->guardian_name;
        $student->guardian_phone = $request->guardian_phone;
        $student->guardian_email = $request->guardian_email;
        $student->guardian_relation = $request->guardian_relation;
        $student->education_gap = $request->education_gap;
        $student->save();
        Session::flash('success_message','Enrollment Of Student Created Successfully!');
        return redirect()->route('student.index');
    }

    public function StudentEdit($id) {
        StudentTrack::first()->update([
            'student_id'=>$id
        ]);
        return view('student.edit', [
            'student'=> Student::findOrFail($id)
        ]);
    }

    public function StudentUpdate(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'guardian_name'=>'required',
            'guardian_phone'=>'required',
            'guardian_email'=>'required',
            'guardian_relation'=>'required',
            'education_gap'=>'required',
        ]);
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->guardian_name = $request->guardian_name;
        $student->guardian_phone = $request->guardian_phone;
        $student->guardian_email = $request->guardian_email;
        $student->guardian_relation = $request->guardian_relation;
        $student->education_gap = $request->education_gap;
        $student->save();
        Session::flash('success_message','Enrollment Of Student Updated Successfully!');
        return redirect()->route('student.index');
    }

    public function StudentExport() {
        return Excel::download(new StudentExport, 'PersonalDetail.xlsx');
    }

    public function BackgroundExport() {
        return Excel::download(new EducationBackgroundExport, 'EducationBackground.xlsx');
    }

    public function ScoreExport() {
        return Excel::download(new LanguageScoreExport, 'LanguageScore.xlsx');
    }

    public function JobExport() {
        return Excel::download(new JobDetailExport, 'JobDetail.xlsx');
    }

    public function WhereApplyExport() {
        return Excel::download(new ApplyExport, 'WhereToApply.xlsx');
    }

    public function StudentInvoice($id) {
        $student = Student::where('id', $id)->first();
        $applies = Apply::where('student_id', $id)->get();
        $education_backgrounds = EducationBackground::where('student_id', $id)->get();
        $job_details = JobDetail::where('student_id', $id)->get();
        $language_scores = LanguageScore::where('student_id', $id)->get();
        $pdf = Pdf::loadView('student.invoice', compact('student','applies','education_backgrounds','job_details','language_scores'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('EnrollmentOfStudent.pdf');
    }

    public function FrontendStudentCreate() {
        return view('frontend.student-create');
    }

    public function FrontendStudentStore(Request $request) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'guardian_name'=>'required',
            'guardian_phone'=>'required',
            'guardian_email'=>'required',
            'guardian_relation'=>'required',
            'education_gap'=>'required',
        ]);
        $student = new Student();
        $student->login_id = Auth::user()->id;
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->guardian_name = $request->guardian_name;
        $student->guardian_phone = $request->guardian_phone;
        $student->guardian_email = $request->guardian_email;
        $student->guardian_relation = $request->guardian_relation;
        $student->education_gap = $request->education_gap;
        $student->save();
        Session::flash('student_message','Enrollment Of Student Created Successfully!');
        return redirect()->route('dashboard');
    }

    public function FrontendStudentEdit($id) {
        StudentTrack::first()->update([
            'student_id'=>$id
        ]);
        $student= Student::findOrFail($id);
        if ($student->login_id == Auth::user()->id) {
            return view('frontend.student-edit', compact('student'));
        } else {
            return "<h1>You Are Not Allowed</h1>";
        }
    }

    public function FrontendStudentUpdate(Request $request ,$id) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'guardian_name'=>'required',
            'guardian_phone'=>'required',
            'guardian_email'=>'required',
            'guardian_relation'=>'required',
            'education_gap'=>'required',
        ]);
        $student = Student::findOrFail($id);
        if ($student->login_id == Auth::user()->id) {
            # code...
            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->date_of_birth = $request->date_of_birth;
            $student->address = $request->address;
            $student->guardian_name = $request->guardian_name;
            $student->guardian_phone = $request->guardian_phone;
            $student->guardian_email = $request->guardian_email;
            $student->guardian_relation = $request->guardian_relation;
            $student->education_gap = $request->education_gap;
            $student->save();
            Session::flash('student_message','Enrollment Of Student Updated Successfully!');
            return redirect()->route('dashboard');
        }
    }

    public function FrontendStudentDownload($id) {
        $student = Student::where('id', $id)->first();
        if ($student->login_id == Auth::user()->id) {
            # code...
            $applies = Apply::where('student_id', $id)->get();
            $education_backgrounds = EducationBackground::where('student_id', $id)->get();
            $job_details = JobDetail::where('student_id', $id)->get();
            $language_scores = LanguageScore::where('student_id', $id)->get();
            $pdf = Pdf::loadView('student.invoice', compact('student','applies','education_backgrounds','job_details','language_scores'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
            return $pdf->download('EnrollmentOfStudent.pdf');
        } else {
            Session::flash('student_message','You Are Not Allowed!');
            return redirect()->route('dashboard');
        }
    }
}
