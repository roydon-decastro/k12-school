<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\GradeStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Symfony\Contracts\Service\Attribute\Required;

class Grades extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-scale';

    protected static string $view = 'filament.pages.grades';

    protected static ?string $navigationGroup = 'Student Grades';

    protected static ?string $navigationLabel = 'Submit Grades';

    protected ?string $maxContentWidth = 'full';

    public $section_students = [];
    public $sections = [];
    public $selectedSection = "";
    public $grade_level;
    public $quarter;
    public $level_subjects;
    public $grades = [];
    public $section_student_id;
    public $user;
    public $student_grades = [];

    public function mount()
    {
        $this->level_subjects = [];
    }


    public function updated()
    {
        $this->section_students = DB::table('section_students')
            ->join('students', 'section_students.student_id', '=', 'students.id')
            ->where('section_students.section_id', '=', $this->selectedSection)
            ->select('section_students.*', 'students.name as studentName')
            ->get();
        $this->sections = DB::table('sections')
            ->where('sections.level_id', '=', $this->grade_level)
            ->get();
        $this->level_subjects = DB::table('subjects')
            ->join('level_subjects', 'subjects.id', '=', 'level_subjects.subject_id')
            ->where('level_subjects.level_id', '=', $this->grade_level)
            ->orderBy('subjects.name')
            ->get();
    }

    public function filterByGradeLevel()
    {
        $this->section_students = [];
        $this->level_subjects = [];
        $this->selectedSection = "";
        $this->quarter = "";

        if ($this->grade_level !== "") {
            $this->sections = DB::table('sections')
                ->where('sections.level_id', '=', $this->grade_level)
                ->get();
            $this->level_subjects = DB::table('subjects')
                ->join('level_subjects', 'subjects.id', '=', 'level_subjects.subject_id')
                ->where('level_subjects.level_id', '=', $this->grade_level)
                ->orderBy('subjects.name')
                ->get();
        }
    }

    public function filterBySection()
    {
        $this->grades = [];
        $this->student_grades = [];
        $this->quarter = "";


        if ($this->selectedSection !== "") {
            $this->section_students = DB::table('section_students')
                ->join('students', 'section_students.student_id', '=', 'students.id')
                ->where('section_students.section_id', '=', $this->selectedSection)
                ->select('section_students.*', 'students.name as studentName')
                ->get();
            $this->sections = DB::table('sections')
                ->where('sections.level_id', '=', $this->grade_level)
                ->get();
        }
    }

    public function submit()
    {
        // $validatedData = $this->quarter->validate([
        //     $this->quarter => 'required'
        // ], [
        //     $this->quarter.'required' => 'Please select an option'
        // ]);

        // if ($validatedData[$this->quarter] == '-1') {
        //     return redirect()->back()->withErrors([$this->quarter => 'Please select a valid option']);
        // }
        // dd($this->quarter);
        // dd($this->student_grades);
        foreach ($this->student_grades as $ind_student_grade) {
            switch ($this->quarter) {
                case ('1'):
                    $student_grade = new GradeStudent();
                    $student_grade->section_student_id = $ind_student_grade['section_student_id'];
                    $student_grade->q1 = $ind_student_grade['grades'];
                    $student_grade->save();
                    $this->student_grades = [];
                    session()->flash('message', '1st Quarter grades successfully added.');
                    break;
                case ('2'):
                    $q2_grades = DB::table('grade_students')
                        ->where('section_student_id', '=', $ind_student_grade['section_student_id'])
                        ->update(array('q2' => $ind_student_grade['grades']));
                    $this->student_grades = [];
                    session()->flash('message', '2nd Quarter grades successfully added.');
                    break;
                case ('3'):
                    $q3_grades = DB::table('grade_students')
                        ->where('section_student_id', '=', $ind_student_grade['section_student_id'])
                        ->update(array('q3' => $ind_student_grade['grades']));
                    $this->student_grades = [];
                    session()->flash('message', '3rd Quarter grades successfully added.');
                    break;
                case ('4'):
                    $q4_grades = DB::table('grade_students')
                        ->where('section_student_id', '=', $ind_student_grade['section_student_id'])
                        ->update(array('q4' => $ind_student_grade['grades']));
                    $this->student_grades = [];
                    session()->flash('message', '4th Quarter grades successfully added.');
                    break;
                default:
                    dd('Something went wrong.');
            }
        }

        return redirect()->to('admin/list-grades');
    }

}
