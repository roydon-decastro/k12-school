<?php

namespace App\Filament\Pages;



use Filament\Forms;
use Livewire\Component;
use Filament\Pages\Page;
use App\Models\GradeStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Filament\Notifications\Notification;

class UpdateGrades extends Page
// class UpdateGrades extends Page implements Forms\Contracts\HasForms
{
    // use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.update-grades';

    protected static ?string $title = 'Edit Student Grades';

    protected static ?string $slug = 'update-grades';

    protected static ?string $navigationLabel = 'Edit Student Grades';

    protected static ?string $navigationGroup = 'Student Grades';

    protected ?string $maxContentWidth = 'full';

    public $section_students = [];
    public $student_id;
    public $sections = [];
    public $selectedSection = "";
    public $selectedStudent = "";
    public $grade_level;
    public $quarter;
    public $level_subjects;
    public $grades = [];
    public $section_student_id;
    public $user;
    public $student_grades = [];
    public $grade_students;
    public $q1_edit = [];
    public $q2_edit = [];
    public $q3_edit = [];
    public $q4_edit = [];
    public $grade_student_id;


    public function mount()
    {

    }

    public function updated()
    {
        // $this->grade_students = DB::table('grade_students')
        //     ->join('section_students', 'grade_students.section_student_id', '=', 'section_students.id')
        //     ->join('sections', 'section_students.section_id', '=', 'sections.id')
        //     ->join('students', 'section_students.student_id', '=', 'students.id')
        //     ->join('levels', 'section_students.level_id', '=', 'levels.id')
        //     ->join('school_years', 'section_students.schoolyear_id', '=', 'school_years.id')
        //     ->where('section_students.section_id', '=', $this->selectedSection)
        //     ->select('grade_students.*', 'students.name as studentName', 'sections.name as sectionName', 'school_years.name as schoolYearName', 'levels.name as levelName')
        //     ->get();

        $this->grade_students = DB::table('grade_students')
            ->join('section_students', 'grade_students.section_student_id', '=', 'section_students.id')
            ->join('students', 'section_students.student_id', '=', 'students.id')
            ->where('grade_students.section_student_id', '=', $this->selectedStudent)
            ->select('grade_students.*', 'students.name as studentName')
            ->get();
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
        $this->grade_students = [];
        $this->level_subjects = [];
        $this->selectedSection = -1;
        $this->quarter = -1;

        if ($this->grade_level !== '-1') {
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
        $this->grade_students = [];
        $this->selectedStudent = -1;


        if ($this->selectedSection !== '-1') {

            $this->section_students = DB::table('section_students')
                ->join('students', 'section_students.student_id', '=', 'students.id')
                ->where('section_students.section_id', '=', $this->selectedSection)
                ->select('section_students.*', 'students.name as studentName')
                ->get();
        }
    }

    public function filterByStudent()
    {
        $this->grades = [];
        $this->q1_edit = [];
        $this->q2_edit = [];
        $this->q3_edit = [];
        $this->q4_edit = [];


        if ($this->selectedStudent !== '-1') {

            // dd($this->selectedStudent);

            $this->grade_students = DB::table('grade_students')
                ->join('section_students', 'grade_students.section_student_id', '=', 'section_students.id')
                ->join('students', 'section_students.student_id', '=', 'students.id')
                ->where('grade_students.section_student_id', '=', $this->selectedStudent)
                ->select('grade_students.*', 'students.name as studentName')
                ->get();

            // dd(gettype($this->grade_students));

        }
    }

    public function UpdateStudentGrades()
    {
        $grade_student = GradeStudent::find($this->grade_student_id);
        if (is_array($this->q1_edit) && !empty($this->q1_edit)) {
            $q1_current = $grade_student->q1;
            $updated_q1 = array_replace($q1_current, $this->q1_edit);
            $grade_student->q1 = $updated_q1;
            $grade_student->save();
        }

        if (is_array($this->q2_edit) && !empty($this->q2_edit)) {
            $q2_current = $grade_student->q2;
            $updated_q2 = array_replace($q2_current, $this->q2_edit);
            $grade_student->q2 = $updated_q2;
            $grade_student->save();
        }


        if (is_array($this->q3_edit) && !empty($this->q3_edit)) {
            $q3_current = $grade_student->q3;
            $updated_q3 = array_replace($q3_current, $this->q3_edit);
            $grade_student->q3 = $updated_q3;
            $grade_student->save();
        }

        if (is_array($this->q4_edit) && !empty($this->q4_edit)) {
            $q4_current = $grade_student->q4;
            $updated_q4 = array_replace($q4_current, $this->q4_edit);
            $grade_student->q4 = $updated_q4;
            $grade_student->save();
        }

        session()->flash('message', 'Post successfully updated.');
        return redirect()->to('admin/list-grades');
    }
}
