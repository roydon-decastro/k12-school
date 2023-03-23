<x-filament::page>
<div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="UpdateStudentGrades" class="w-full">
        <div class="mb-6">
            <div class="flex">

                <div class="mr-6">
                    <label for="grade_level" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Grade Level</label>
                    <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="grade_level" wire:change="filterByGradeLevel">
                        <option value="-1">Please choose grade</option>
                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="9">Grade 9</option>
                    </select>
                </div>
                <div class="mr-6">
                    <label for="selectedSection" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Section</label>
                    <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="selectedSection" wire:change="filterBySection">
                        <option value="-1">Please choose Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mr-6">
                    <label for="selectedStudent" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Student</label>
                    <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="selectedStudent" wire:change="filterByStudent">
                        <option value="-1">Please choose Student</option>
                        @foreach ($section_students as $section_student)
                            <option value="{{ $section_student->id }}">{{ $section_student->studentName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @if(!empty($grade_students))
            <div>

                @foreach ( $grade_students as $index => $grade_student )

                    <div wire:model="grade_students" class="overflow-y-auto mb-6 bg-white border border-amber-200 rounded-lg p-4 ">
                        <div class="flex justify-between">
                            <p class="text-xl font-medium ">{{ ucwords($grade_student->studentName) }}</p>
                            </div>
                                <hr class="mb-4 mt-2">
                                <div class="mt-4">
                                    @php
                                        if ($grade_student->q1 != null) {
                                            $q1_grade_subjects = json_decode($grade_student->q1,true);
                                        }
                                        if ($grade_student->q2 != null) {
                                            $q2_grade_subjects = json_decode($grade_student->q2,true);
                                        }
                                        if ($grade_student->q3 != null) {
                                            $q3_grade_subjects = json_decode($grade_student->q3,true);
                                        }
                                        if ($grade_student->q4 != null) {
                                            $q4_grade_subjects = json_decode($grade_student->q4,true);
                                        }
                                    @endphp
                                    <div class="flex">
                                        @if ($grade_student->q1 != null)
                                            {{-- @dd($q1_grade_subjects) --}}
                                            <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6">
                                                <p class="text-xl font-medium">1st Quarter</p>
                                                @foreach ($q1_grade_subjects as $subject => $grade )
                                                    <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6 mt-4">
                                                        <p class=" font-bold text-base">{{ $subject }}</p>
                                                        <div class="flex mr-6">
                                                            <div>
                                                                <label for="current" class="block mt-3 mb-1 text-sm font-normal dark:text-white">Current</label>
                                                                <input name="current" class="w-20 bg-white  border border-gray-200 rounded-lg mr-2 " type="number" max="100" value="{{$grade}}" disabled>
                                                            </div>
                                                            <div>
                                                                <label for="q1_edit.{{$subject}}" class="block mt-3 mb-1 text-sm font-normal dark:text-white">New</label>
                                                                <input wire:model='q1_edit.{{$subject}}' name="q1_edit.{{$subject}}" class="w-20 bg-white  border border-gray-200 rounded-lg" type="number" max="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if ($grade_student->q2 != null)
                                            <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6">
                                                <p class="text-xl font-medium">2nd Quarter</p>
                                                @foreach ($q2_grade_subjects as $subject => $grade )
                                                    <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6 mt-4">
                                                        <p class=" font-bold text-base">{{ $subject }}</p>
                                                        <div class="flex mr-6">
                                                            <div>
                                                                <label for="current" class="block mt-3 mb-1 text-sm font-normal dark:text-white">Current</label>
                                                                <input name="current" class="w-20 bg-white  border border-gray-200 rounded-lg mr-2 " type="number" max="100" value="{{$grade}}" disabled>
                                                            </div>
                                                            <div>
                                                                <label for="q2_edit.{{$subject}}" class="block mt-3 mb-1 text-sm font-normal dark:text-white">New</label>
                                                                <input wire:model='q2_edit.{{$subject}}' name="q2_edit.{{$subject}}" class="w-20 bg-white  border border-gray-200 rounded-lg" type="number" max="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if ($grade_student->q3 != null)
                                            <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6">
                                                <p class="text-xl font-medium">3rd Quarter</p>
                                                @foreach ($q3_grade_subjects as $subject => $grade )
                                                    <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6 mt-4">
                                                        <p class=" font-bold text-base">{{ $subject }}</p>
                                                        <div class="flex mr-6">
                                                            <div>
                                                                <label for="current" class="block mt-3 mb-1 text-sm font-normal dark:text-white">Current</label>
                                                                <input name="current" class="w-20 bg-white  border border-gray-200 rounded-lg mr-2 " type="number" max="100" value="{{$grade}}" disabled>
                                                            </div>
                                                            <div>
                                                                <label for="q3_edit.{{$subject}}" class="block mt-3 mb-1 text-sm font-normal dark:text-white">New</label>
                                                                <input wire:model='q3_edit.{{$subject}}' name="q3_edit.{{$subject}}" class="w-20 bg-white  border border-gray-200 rounded-lg" type="number" max="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if ($grade_student->q4 != null)
                                            <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6">
                                                <p class="text-xl font-medium">4th Quarter</p>
                                                @foreach ($q4_grade_subjects as $subject => $grade )
                                                    <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 mr-6 mt-4">
                                                        <p class=" font-bold text-base">{{ $subject }}</p>
                                                        <div class="flex mr-6">
                                                            <div>
                                                                <label for="current" class="block mt-3 mb-1 text-sm font-normal dark:text-white">Current</label>
                                                                <input name="current" class="w-20 bg-white  border border-gray-200 rounded-lg mr-2 " type="number" max="100" value="{{$grade}}" disabled>
                                                            </div>
                                                            <div>
                                                                <label for="q4_edit.{{$subject}}" class="block mt-3 mb-1 text-sm font-normal dark:text-white">New</label>
                                                                <input wire:model='q4_edit.{{$subject}}' name="q4_edit.{{$subject}}" class="w-20 bg-white  border border-gray-200 rounded-lg" type="number" max="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif



                                    </div>
                                </div>
                                <div class="block mt-4">
                                    <label for="grade_student_id" class="block mt-3 mb-1 text-sm font-normal dark:text-white">Record ID</label>
                                    <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="grade_student_id" required>
                                        <option value="">Confirm record ID</option>
                                        <option value="{{ $grade_student->id }}">{{ $grade_student->id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                    {{-- <input name="grade_student_id" class="w-20 bg-white  border border-gray-200 rounded-lg " type="text" value="{{ $grade_student->id }}" disabled> --}}
                                    <button type="submit" class="px-6 py-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update Grades</button>
                            </div>
                            <div>
                                <p class="text-sm mt-2 italic">This transaction will be recorded using {{ Auth::user()->name }}'s details.</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </form>
</div>
</x-filament::page>

