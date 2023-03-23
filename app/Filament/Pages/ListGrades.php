<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class ListGrades extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.list-grades';

    protected static ?string $navigationGroup = 'Student Grades';

    // protected static ?string $navigationLabel = 'Submit Grades';

    protected ?string $maxContentWidth = 'full';

    public $section_students = [];
    public $sections = [];
    public $selectedSection = -1;
    public $grade_level;
    public $quarter;
    public $level_subjects;
    public $grades = [];
    public $section_student_id;
    public $user;
    public $student_grades = [];
    public $grade_students = [];

    public function mount()
    {
        $this->level_subjects = [];
    }

    public function updated()
    {
        $this->grade_students = DB::table('grade_students')
            ->join('section_students', 'grade_students.section_student_id', '=', 'section_students.id')
            ->join('sections', 'section_students.section_id', '=', 'sections.id')
            ->join('students', 'section_students.student_id', '=', 'students.id')
            ->join('levels', 'section_students.level_id', '=', 'levels.id')
            ->join('school_years', 'section_students.schoolyear_id', '=', 'school_years.id')
            ->where('section_students.section_id', '=', $this->selectedSection)
            ->select('grade_students.*', 'students.name as studentName', 'sections.name as sectionName', 'school_years.name as schoolYearName', 'levels.name as levelName')
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

        if ($this->selectedSection !== '-1') {

            $this->grade_students = DB::table('grade_students')
                ->join('section_students', 'grade_students.section_student_id', '=', 'section_students.id')
                ->join('sections', 'section_students.section_id', '=', 'sections.id')
                ->join('students', 'section_students.student_id', '=', 'students.id')
                ->join('levels', 'section_students.level_id', '=', 'levels.id')
                ->join('school_years', 'section_students.schoolyear_id', '=', 'school_years.id')
                ->where('section_students.section_id', '=', $this->selectedSection)
                ->select('grade_students.*', 'students.name as studentName', 'sections.name as sectionName', 'school_years.name as schoolYearName', 'levels.name as levelName')
                ->get();

            // dd($grade_students);



            // $this->section_students = DB::table('section_students')
            //     ->join('students', 'section_students.student_id', '=', 'students.id')
            //     ->where('section_students.section_id', '=', $this->selectedSection)
            //     ->select('section_students.*', 'students.name as studentName')
            //     ->get();
            // $this->sections = DB::table('sections')
            //     ->where('sections.level_id', '=', $this->grade_level)
            //     ->get();
        }
    }

    public function goToUpdateGrades($id)
    {
        // dd($id);

        // return redirect()->route('update-grade', ['id' => $id]);
        return redirect()->to('admin/update-grades?student_id='. $id);
    }
}
