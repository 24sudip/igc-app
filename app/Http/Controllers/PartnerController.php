<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Session;
use File;

class PartnerController extends Controller
{
    public function PartnerIndex() {
        return view('partner.index', [
            'partners'=>Partner::all()
        ]);
    }

    public function PartnerCreate() {
        return view('partner.create');
    }

    public function PartnerStore(Request $request) {
        $request->validate([
            'title'=>'required',
            'website'=>'required',
        ]);
        $partner = new Partner();
        if ($request->hasFile('partner_photo')) {
            $request->validate([
                'partner_photo'=>'image'
            ]);
            $fileName = time().'_'. $request->partner_photo->getClientOriginalName();
            $filePath = $request->partner_photo->storeAs('public/partner_photo', $fileName);
            $partner->partner_photo = $fileName;
        }
        $partner->title = $request->title;
        $partner->website = $request->website;
        $partner->status = $request->status;
        $partner->save();
        Session::flash('success_message','Partner Created Successfully!');
        return redirect()->route('partner.index');
    }

    public function PartnerEdit($id) {
        return view('partner.edit', [
            'partner'=>Partner::findOrFail($id)
        ]);
    }

    public function PartnerUpdate(Request $request, $id) {
        $request->validate([
            'title'=>'required',
            'website'=>'required',
        ]);
        $partner = Partner::findOrFail($id);
        if ($request->hasFile('partner_photo')) {
            $request->validate([
                'partner_photo'=>'image'
            ]);
            if ($partner->partner_photo) {
                if (file_exists(public_path('storage/partner_photo/'.$partner->partner_photo))) {
                    File::delete(public_path('storage/partner_photo/'.$partner->partner_photo));
                }
            }
            $fileName = time().'_'. $request->partner_photo->getClientOriginalName();
            $filePath = $request->partner_photo->storeAs('public/partner_photo', $fileName);
            $partner->partner_photo = $fileName;
        }
        $partner->title = $request->title;
        $partner->website = $request->website;
        $partner->status = $request->status;
        $partner->save();
        Session::flash('success_message','Partner Updated Successfully!');
        return redirect()->route('partner.index');
    }

    public function PartnerDelete($id) {
        $partner = Partner::findOrFail($id);
        if ($partner->partner_photo) {
            if (file_exists(public_path('storage/partner_photo/'.$partner->partner_photo))) {
                File::delete(public_path('storage/partner_photo/'.$partner->partner_photo));
            }
        }
        $partner->delete();
        Session::flash('success_message','Partner Deleted Successfully!');
        return redirect()->route('partner.index');
    }
}
