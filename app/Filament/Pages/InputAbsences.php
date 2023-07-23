<?php

namespace App\Filament\Pages;

use Carbon\Carbon;
use Filament\Pages\Page;
use App\Models\StudentAttendance;
use Illuminate\Support\Facades\DB;

class InputAbsences extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.input-absences';

    protected static ?string $navigationGroup = 'Student Attendance';

    protected static ?string $navigationLabel = 'Input Multiple Absences';

    protected ?string $maxContentWidth = 'full';

    public $section_students = [];
    public $sections = [];
    public $selectedSection = "";
    public $selectedGradeLevel;
    public $level_subjects;
    public $section_student_id;
    public $user;
    public $attendance = [];


    public function mount()
    {
    }

    public function updated()
    {
        if ($this->selectedGradeLevel !== "") {
            $this->level_subjects = DB::table('subjects')
                ->join('level_subjects', 'subjects.id', '=', 'level_subjects.subject_id')
                ->where('level_subjects.level_id', '=', $this->selectedGradeLevel)
                ->orderBy('subjects.name')
                ->get();
        }
        if ($this->selectedSection !== "") {
            $this->section_students = DB::table('section_students')
                ->leftJoin('students', 'section_students.student_id', '=', 'students.id')
                ->leftJoin('sections', 'section_students.section_id', '=', 'sections.id')
                ->where('section_students.section_id', '=', $this->selectedSection)
                ->select(
                    'students.name as studentName',
                    'sections.name as sectionName',
                    'section_students.level_id',
                    'section_students.id'
                )
                ->get();

            $this->sections = DB::table('sections')
                ->where('sections.level_id', '=', $this->selectedGradeLevel)
                ->get();
        }
    }



    public function filterByGradeLevel()
    {
        $this->section_students = [];
        $this->selectedSection = "";

        if ($this->selectedGradeLevel !== "") {
            $this->sections = DB::table('sections')
                ->where('sections.level_id', '=', $this->selectedGradeLevel)
                ->get();
            $this->level_subjects = DB::table('subjects')
                ->join('level_subjects', 'subjects.id', '=', 'level_subjects.subject_id')
                ->where('level_subjects.level_id', '=', $this->selectedGradeLevel)
                ->orderBy('subjects.name')
                ->get();
        }
    }

    public function filterBySection()
    {
        $this->section_students = [];
        // $this->level_subjects = [];


        if ($this->selectedSection !== "") {

            $this->section_students = DB::table('section_students')
                ->leftJoin('students', 'section_students.student_id', '=', 'students.id')
                ->leftJoin('sections', 'section_students.section_id', '=', 'sections.id')
                ->where('section_students.section_id', '=', $this->selectedSection)
                ->select(
                    'students.name as studentName',
                    'sections.name as sectionName',
                    'section_students.level_id',
                    'section_students.student_id',
                    'section_students.id'
                )
                ->get();
            $this->attendance = $this->section_students->map(function ($student) {
                $studentName = $student->studentName;
                $sectionName = $student->sectionName;
                $level_id = $student->level_id;
                $student_id = $student->student_id;
                $id = $student->id;
                return [
                    'studentName' => $studentName,
                    'sectionName' => $sectionName,
                    'section_student_id' => $id,
                    'student_id' => $student_id,
                    'level_id' => $level_id,
                    'absent_count' => 0,
                    'absent_dates_array' => []

                ];
            })->values()->toArray();

            $this->sections = DB::table('sections')
                ->where('sections.level_id', '=', $this->selectedGradeLevel)
                ->get();
        }
    }


    public function submit()
    {
        // dd($this->attendance);
        // dd($this->attendance[0]['absent_dates_array']);
           // fyi loop thru all the students
           foreach ($this->attendance as $singleStudentAttendance) {
            // dd($singleStudentAttendance);
            foreach($singleStudentAttendance['absent_dates_array'] as $index => $singleAbsentDate ) {
                    // dd($singleAbsentDate);
                    // dd($index . ' ' . $singleStudentAttendance['absent_count']);
                    if($index > $singleStudentAttendance['absent_count']) {
                        break;
                    }

                    $student_attendance = new StudentAttendance();
                    $student_attendance->school_id = 2;
                    $student_attendance->section_id = $this->selectedSection;
                    $student_attendance->level_id = $this->selectedGradeLevel;
                    $student_attendance->student_id = $singleStudentAttendance['student_id'];
                    $student_attendance->absent_date = $singleAbsentDate;
                    $student_attendance->is_absent = true;
                    // $student_attendance->subjects = json_encode($this->selectedSubject);
                    $student_attendance->save();
                    // $this->attendance = [];
                }
            }

        return redirect()->to('admin');
    }
}
