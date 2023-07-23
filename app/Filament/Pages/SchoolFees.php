<?php

namespace App\Filament\Pages;

use App\Models\LevelFee;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class SchoolFees extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'School Fees';

    protected ?string $maxContentWidth = 'full';

    protected static ?string $navigationLabel = 'Create School Fees';

    protected static string $view = 'filament.pages.school-fees';

    protected static ?int $navigationSort = 2;

    public $level_subjects;
    public $grades = [];
    public $levels;
    public $fees;
    public $section_student_id;
    public $user;
    public $student_grades = [];
    public $school_fees = [];
    public $school_year_open;
    public $level_total;
    public $indexlevel;

    public function mount()
    {
        $this->levels = DB::table('levels')->get()->toArray();
        $this->fees = DB::table('fees')
            ->select('id as feeId', 'name as feeName')
            ->get()->toArray();
        $this->school_year_open = DB::table('school_years')->latest('created_at')->select('id', 'name')->get()->toArray();

        // $this->school_year = DB::table('school_years')->get();
        // dd($this->school_year);

        // $level_fees = $this->school_fees;
        // foreach ($level_fees as $level => $id_fee) {
        //     foreach ($id_fee as $feeId => $feeAmount) {
        //         $this->level_total = $this->level_total + $feeAmount;
        //     }
        // }
    }

    public function updated($indexLevel)
    {
        $this->levels = DB::table('levels')->get();
        $this->fees = DB::table('fees')
            ->select('id as feeId', 'name as feeName')
            ->get()->toArray();
        $this->school_year_open = DB::table('school_years')->latest('created_at')->select('id', 'name')->get()->toArray();
        // dd($this->school_fees);
        // $level_fees = $this->school_fees;
        // $this->level_total = $this->school_fees
        $total = 0;
        foreach ($this->fees as $fee) {
            // if (is_numeric($this->school_fees[$indexLevel][$fee->feeId])) {
            //     $total += $this->school_fees[$indexLevel][$fee->feeId] ?? 0;
            // }
            if (isset($this->school_fees[$indexLevel][$fee->feeId]) && is_numeric($this->school_fees[$indexLevel][$fee->feeId])) {
                $total += $this->school_fees[$indexLevel][$fee->feeId];
            }
        }
        return $total;
    }

    public function submit()
    {
        // dd($this->school_fees);
        $level_fees = $this->school_fees;
        foreach ($level_fees as $level => $id_fee) {
            foreach ($id_fee as $feeId => $feeAmount) {
                // dd($level + 1);
                $levelFee = new LevelFee();
                $levelFee->school_id = 2;
                $levelFee->school_year_id = 3;
                $levelFee->level_id = $level + 1;
                $levelFee->fee_id = $feeId;
                $levelFee->fee_amount = $feeAmount;
                $levelFee->save();
            }
        }
        return redirect()->to('admin');
    }
}
