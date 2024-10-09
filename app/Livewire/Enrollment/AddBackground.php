<?php

namespace App\Livewire\Enrollment;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\{EducationBackground, StudentTrack};

class AddBackground extends Component
{
    public $background_id;
    #[Validate('required')]
    public $degree;
    #[Validate('required')]
    public $subject;
    #[Validate('required')]
    public $result;
    #[Validate('required')]
    public $passing_year;
    #[Validate('required')]
    public $name_of_institute;

    public function education_background_insert()
    {
        $this->validate();
        EducationBackground::create([
            'student_id'=>StudentTrack::first()->student_id,
            'degree'=>$this->degree,
            'subject'=>$this->subject,
            'result'=>$this->result,
            'passing_year'=>$this->passing_year,
            'name_of_institute'=>$this->name_of_institute,
        ]);
        $this->reset();
        session()->flash('BgAddMsg', 'Education Background Successfully Added.');
    }

    public function edit_education_background($id)
    {
        $editEducationBackground = EducationBackground::where('id', $id)->first();
        $this->background_id = $editEducationBackground->id;
        $this->degree = $editEducationBackground->degree;
        $this->subject = $editEducationBackground->subject;
        $this->result = $editEducationBackground->result;
        $this->passing_year = $editEducationBackground->passing_year;
        $this->name_of_institute = $editEducationBackground->name_of_institute;
    }

    public function cancel_edit() {
        $this->reset();
    }

    public function education_background_update($id) {
        EducationBackground::findOrFail($id)->update([
            'degree'=>$this->degree,
            'subject'=>$this->subject,
            'result'=>$this->result,
            'passing_year'=>$this->passing_year,
            'name_of_institute'=>$this->name_of_institute,
        ]);
        $this->reset();
        session()->flash('BgAddMsg', 'Education Background Successfully Updated.');
    }

    public function delete_background($id) {
        EducationBackground::findOrFail($id)->delete();
        session()->flash('BgAddMsg', 'Education Background Successfully Deleted.');
    }

    public function render()
    {
        $student_id = StudentTrack::first()->student_id;
        $education_backgrounds = EducationBackground::where('student_id', $student_id)->get();
        return view('livewire.enrollment.add-background', compact('education_backgrounds'));
    }
}
