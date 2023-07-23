<?php

namespace App\Filament\Pages;

use App\Models\StudentAttendance;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubjectAttendance extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.subject-attendance';

    protected static ?string $navigationGroup = 'Student Attendance';

    protected static ?string $navigationLabel = 'Get Daily Attendance';

    protected ?string $maxContentWidth = 'full';

    public $section_students = [];
    public $sections = [];
    public $selectedSection = "";
    public $selectedSubject = "";
    public $selectedGradeLevel;
    // public $quarter;
    public $level_subjects;
    // public $grades = [];
    public $section_student_id;
    public $user;
    public $attendance = [];
    // public $student_grades = [];

    public function mount()
    {
        // dd(Carbon::now());
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
                    'present' => true,
                ];
            })->values()->toArray();

            $this->sections = DB::table('sections')
                ->where('sections.level_id', '=', $this->selectedGradeLevel)
                ->get();
        }
    }

    public function submit()
    {
        // fyi loop thru all the students
        foreach ($this->attendance as $singleStudentAttendance) {
            // fyi check singleStudent if marked as absent. Present field is unchecked.
            if ($singleStudentAttendance['present'] == false) {
                // fyi we only process absent students. We will check if the student
                // fyi has already been marked absent by other subjects
                $student_absent = DB::table('student_attendances')
                    ->where('level_id', '=', $this->selectedGradeLevel)
                    ->where('section_id', '=', $this->selectedSection)
                    ->where('student_id', '=', $singleStudentAttendance['student_id'])
                    ->whereDate('absent_date', Carbon::today())
                    ->first();
                // fyi if the student already has a record for the samed day, same subject
                // fyi same section, same level then we update the 'subjects' field
                if ($student_absent) {
                    // fyi: if we enter here, it means that the student already has a record
                    // fyi: of being absent in other subjects.
                    // fyi: we will get the subjects field
                    $subjectsAbsent = json_decode($student_absent->subjects);
                    $subjectsAbsentArray = [];
                    // fyi: we will check if the 'subjects' field type is string or array.
                    // fyi: string means the student has just been marked with 1 subject absent.
                    if (gettype($subjectsAbsent) === 'string') {
                        // fyi: array handling. Create a new array then insert the
                        // fyi: 'subjects' value and the new subjectSelected.
                        $subjectsAbsentArray[] = ($subjectsAbsent);
                        $subjectsAbsentArray[] = ($this->selectedSubject);
                        DB::table('student_attendances')
                        ->where('id', $student_absent->id)
                        ->update([
                            'subjects' => json_encode($subjectsAbsentArray)
                        ]);
                    // fyi: if the 'subjects' type is array, it means the student has been marked
                    // fyi: as absent in multiple subjects already.
                    } elseif (gettype($subjectsAbsent) === 'array') {
                        // fyi: since it's already an array, we just insert the selectedSubject
                        $subjectsAbsent[] = ($this->selectedSubject);
                        DB::table('student_attendances')
                        ->where('id', $student_absent->id)
                        ->update([
                            'subjects' => json_encode($subjectsAbsent)
                        ]);
                    }

                // fyi: if this is the first subject that the student is marked absent
                // fyi: then we create a new record.
                } else {
                    $student_attendance = new StudentAttendance();
                    $student_attendance->school_id = 2;
                    $student_attendance->section_id = $this->selectedSection;
                    $student_attendance->level_id = $this->selectedGradeLevel;
                    $student_attendance->student_id = $singleStudentAttendance['student_id'];
                    $student_attendance->absent_date = Carbon::today();
                    $student_attendance->subjects = json_encode($this->selectedSubject);
                    $student_attendance->save();
                    $this->attendance = [];
                }
            }
        }
        return redirect()->to('admin');
    }
}
