<?php

namespace App\Livewire\Enrollment;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\{Apply, StudentTrack};

class AddApply extends Component
{
    public $apply_id;
    #[Validate('required')]
    public $university;
    #[Validate('required')]
    public $program_level;
    #[Validate('required')]
    public $intake;
    #[Validate('required')]
    public $subject;
    #[Validate('required')]
    public $tution_fee;
    #[Validate('required')]
    public $application_fee;
    #[Validate('required')]
    public $country;

    public function apply_insert() {
        $this->validate();
        Apply::create([
            'student_id'=>StudentTrack::first()->student_id,
            'university'=>$this->university,
            'program_level'=>$this->program_level,
            'intake'=>$this->intake,
            'subject'=>$this->subject,
            'tution_fee'=>$this->tution_fee,
            'application_fee'=>$this->application_fee,
            'country'=>$this->country,
        ]);
        $this->reset();
        session()->flash('WhrAplyMsg', 'Where To Apply Successfully Added.');
    }

    public function edit_apply($id) {
        $edit_where_apply = Apply::where('id', $id)->first();
        $this->apply_id = $edit_where_apply->id;
        $this->university = $edit_where_apply->university;
        $this->program_level = $edit_where_apply->program_level;
        $this->intake = $edit_where_apply->intake;
        $this->subject = $edit_where_apply->subject;
        $this->tution_fee = $edit_where_apply->tution_fee;
        $this->application_fee = $edit_where_apply->application_fee;
        $this->country = $edit_where_apply->country;
    }

    public function cancel_edit() {
        $this->reset();
    }

    public function apply_update($id) {
        Apply::findOrFail($id)->update([
            'university'=>$this->university,
            'program_level'=>$this->program_level,
            'intake'=>$this->intake,
            'subject'=>$this->subject,
            'tution_fee'=>$this->tution_fee,
            'application_fee'=>$this->application_fee,
            'country'=>$this->country,
        ]);
        $this->reset();
        session()->flash('WhrAplyMsg', 'Where To Apply Successfully Updated.');
    }

    public function delete_apply($id) {
        Apply::findOrFail($id)->delete();
        session()->flash('WhrAplyMsg', 'Where To Apply Successfully Deleted.');
    }

    public function render()
    {
        $student_id = StudentTrack::first()->student_id;
        $applies = Apply::where('student_id', $student_id)->get();
        return view('livewire.enrollment.add-apply', compact('applies'));
    }
}
