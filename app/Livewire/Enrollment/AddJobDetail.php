<?php

namespace App\Livewire\Enrollment;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\{JobDetail, StudentTrack};

class AddJobDetail extends Component
{
    public $job_detail_id;
    #[Validate('required')]
    public $company;
    #[Validate('required')]
    public $designation;
    #[Validate('required')]
    public $duration;
    #[Validate('required')]
    public $salary_type;

    public function job_detail_insert() {
        $this->validate();
        JobDetail::create([
            'student_id'=>StudentTrack::first()->student_id,
            'company'=>$this->company,
            'designation'=>$this->designation,
            'duration'=>$this->duration,
            'salary_type'=>$this->salary_type,
        ]);
        $this->reset();
        session()->flash('JbDtlMsg', 'Job Detail Successfully Added.');
    }

    public function edit_job($id) {
        $edit_job_detail = JobDetail::where('id', $id)->first();
        $this->job_detail_id = $edit_job_detail->id;
        $this->company = $edit_job_detail->company;
        $this->designation = $edit_job_detail->designation;
        $this->duration = $edit_job_detail->duration;
        $this->salary_type = $edit_job_detail->salary_type;
    }

    public function cancel_edit() {
        $this->reset();
    }

    public function job_update($id) {
        JobDetail::findOrFail($id)->update([
            'company'=>$this->company,
            'designation'=>$this->designation,
            'duration'=>$this->duration,
            'salary_type'=>$this->salary_type,
        ]);
        $this->reset();
        session()->flash('JbDtlMsg', 'Job Detail Successfully Updated.');
    }

    public function delete_job($id) {
        JobDetail::findOrFail($id)->delete();
        session()->flash('JbDtlMsg', 'Job Detail Successfully Deleted.');
    }

    public function render()
    {
        $student_id = StudentTrack::first()->student_id;
        $job_details = JobDetail::where('student_id', $student_id)->get();
        return view('livewire.enrollment.add-job-detail', compact('job_details'));
    }
}
