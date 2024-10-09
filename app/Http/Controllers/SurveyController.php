<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Survey, Country};
use Session;
use App\Exports\SurveyExport;
use App\Imports\SurveyImport;
use Maatwebsite\Excel\Facades\Excel;

class SurveyController extends Controller
{
    public function SurveyIndex() {
        return view('survey.index', [
            'surveys'=>Survey::all()
        ]);
    }

    public function SurveyCreate() {
        return view('survey.create', [
            'countries'=>Country::where('status', 1)->get(['name'])
        ]);
    }

    public function SurveyStore(Request $request) {
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
        Session::flash('success_message','Survey Created Successfully!');
        return redirect()->route('survey.index');
    }

    public function SurveyEdit($id) {
        return view('survey.edit', [
            'survey'=>Survey::findOrFail($id),
            'countries'=>Country::where('status', 1)->get(['name'])
        ]);
    }

    public function SurveyUpdate(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'country'=>'required',
            'desired_level_of_education'=>'required',
        ]);
        $survey = Survey::findOrFail($id);
        $survey->name = $request->name;
        $survey->phone = $request->phone;
        $survey->email = $request->email;
        $survey->country = $request->country;
        $survey->desired_level_of_education = $request->desired_level_of_education;
        $survey->save();
        Session::flash('success_message','Survey Updated Successfully!');
        return redirect()->route('survey.index');
    }

    public function SurveyDelete($id) {
        $survey = Survey::findOrFail($id);
        $survey->delete();
        Session::flash('success_message','Survey Deleted Successfully!');
        return redirect()->route('survey.index');
    }

    public function SurveyExport() {
        return Excel::download(new SurveyExport, 'survey.xlsx');
    }

    public function SurveyImport(Request $request) {
        Excel::import(new SurveyImport, $request->file('import_file'));
        Session::flash('success_message','Survey Imported Successfully!');
        return redirect()->back();
    }
}
