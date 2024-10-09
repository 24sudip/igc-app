<?php

namespace App\Livewire\Enrollment;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\{LanguageScore, StudentTrack};

class AddScore extends Component
{
    public $score_id;
    #[Validate('required')]
    public $type;
    #[Validate('required')]
    public $overall_score;
    #[Validate('required')]
    public $reading_score;
    #[Validate('required')]
    public $writing_score;
    #[Validate('required')]
    public $listening_score;
    #[Validate('required')]
    public $speaking_score;
    #[Validate('required')]
    public $expire_date;

    public function score_insert() {
        $this->validate();
        LanguageScore::create([
            'student_id'=>StudentTrack::first()->student_id,
            'type'=>$this->type,
            'overall_score'=>$this->overall_score,
            'reading_score'=>$this->reading_score,
            'writing_score'=>$this->writing_score,
            'listening_score'=>$this->listening_score,
            'speaking_score'=>$this->speaking_score,
            'expire_date'=>$this->expire_date,
        ]);
        $this->reset();
        session()->flash('ScoreMsg', 'Score Successfully Added.');
    }

    public function edit_score($id) {
        $edit_language_score = LanguageScore::where('id', $id)->first();
        $this->score_id = $edit_language_score->id;
        $this->type = $edit_language_score->type;
        $this->overall_score = $edit_language_score->overall_score;
        $this->reading_score = $edit_language_score->reading_score;
        $this->writing_score = $edit_language_score->writing_score;
        $this->listening_score = $edit_language_score->listening_score;
        $this->speaking_score = $edit_language_score->speaking_score;
        $this->expire_date = $edit_language_score->expire_date;
    }

    public function cancel_edit() {
        $this->reset();
    }

    public function score_update($id) {
        LanguageScore::findOrFail($id)->update([
            'type'=>$this->type,
            'overall_score'=>$this->overall_score,
            'reading_score'=>$this->reading_score,
            'writing_score'=>$this->writing_score,
            'listening_score'=>$this->listening_score,
            'speaking_score'=>$this->speaking_score,
            'expire_date'=>$this->expire_date,
        ]);
        $this->reset();
        session()->flash('ScoreMsg', 'Score Successfully Updated.');
    }

    public function delete_score($id) {
        LanguageScore::findOrFail($id)->delete();
        session()->flash('ScoreMsg', 'Score Successfully Deleted.');
    }

    public function render()
    {
        $student_id = StudentTrack::first()->student_id;
        $language_scores = LanguageScore::where('student_id', $student_id)->get();
        return view('livewire.enrollment.add-score', compact('language_scores'));
    }
}
