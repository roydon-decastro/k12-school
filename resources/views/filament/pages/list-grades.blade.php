<x-filament::page>
    <div
        class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="mb-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

                <div class="">
                    <label for="grade_level"
                        class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Grade
                        Level</label>
                    <select class="w-full bg-white  border border-gray-200 rounded-lg " wire:model="grade_level"
                        wire:change="filterByGradeLevel">
                        <option value="-1">Please choose grade</option>
                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="9">Grade 9</option>
                    </select>
                </div>
                <div class="">
                    <label for="selectedSection"
                        class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Section</label>
                    <select class="w-full bg-white  border border-gray-200 rounded-lg " wire:model="selectedSection"
                        wire:change="filterBySection">
                        <option value="-1">Please choose Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @if (!empty($grade_students))
            <div>

                @foreach ($grade_students as $index => $grade_student)
                    <div class="overflow-y-auto mb-6 bg-white border border-amber-200 rounded-lg p-4 ">
                        <div class="flex justify-between">
                            <p class="text-lg font-medium ">{{ ucwords($grade_student->studentName) }}</p>
                        </div>
                        <hr class="mb-4 mt-2">
                        <div class="mt-4">
                            <table class="border-collapse border border-slate-400 p-4">
                                <thead>
                                    <tr>
                                        <th class="border border-slate-300 p-4 ">Learning Areas</th>
                                        <th class="border border-slate-300 p-4 ">1st Quarter </th>
                                        <th class="border border-slate-300 p-4 ">2nd Quarter </th>
                                        <th class="border border-slate-300 p-4 ">3rd Quarter </th>
                                        <th class="border border-slate-300 p-4 ">4th Quarter </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $q1_grade_subjects = json_decode($grade_student->q1, true);
                                        $outputArray = [];

                                        if ($grade_student->q2 != null) {
                                            $q2_grade_subjects = json_decode($grade_student->q2, true);

                                            foreach ($q1_grade_subjects as $key => $value) {
                                                if (isset($q2_grade_subjects[$key])) {
                                                    $outputArray[$key] = [$value, $q2_grade_subjects[$key]];
                                                }
                                            }
                                            // dd($outputArray);
                                            // foreach ($q1_grade_subjects as $key => $value) {
                                            //     if (isset($q2_grade_subjects[$key])) {
                                            //         $q1_grade_subjects[$key] = array_merge_recursive($value, $q2_grade_subjects[$key]);
                                            //     }
                                            // }
                                        }
                                        if ($grade_student->q3 != null) {
                                            $q3_grade_subjects = json_decode($grade_student->q3, true);
                                            foreach ($outputArray as $key => &$value) {
                                                if (isset($q3_grade_subjects[$key])) {
                                                    $value[] = $q3_grade_subjects[$key];
                                                }
                                            }
                                            // dd($outputArray);
                                            // foreach ($q1_grade_subjects as $key => $value) {
                                            //     if (isset($q3_grade_subjects[$key])) {
                                            //         $q1_grade_subjects[$key] = array_merge_recursive($value, $q3_grade_subjects[$key]);
                                            //     }
                                            // }
                                        }
                                        if ($grade_student->q4 != null) {
                                            $q4_grade_subjects = json_decode($grade_student->q4, true);
                                            foreach ($outputArray as $key => &$value) {
                                                if (isset($q4_grade_subjects[$key])) {
                                                    $value[] = $q4_grade_subjects[$key];
                                                }
                                            }
                                            // dd($outputArray);
                                            // foreach ($q1_grade_subjects as $key => $value) {
                                            //     if (isset($q4_grade_subjects[$key])) {
                                            //         $q1_grade_subjects[$key] = array_merge_recursive($value, $q4_grade_subjects[$key]);
                                            //     }
                                            // }
                                        }
                                        // $all_grades = array_merge_recursive($q1_grade_subjects, $q2_grade_subjects);

                                        // dd($q1_grade_subjects);
                                    @endphp
                                    {{-- @foreach (json_decode($grade_student->q1, true) as $q1_grade_subjects) --}}
                                    @if (!empty($outputArray))
                                        {{-- @dd('we have multiple quarters') --}}
                                        {{-- @dd($outputArray) --}}
                                        @foreach ($outputArray as $subject => $all_grades)
                                            <tr>
                                                <td class="border border-slate-300 p-4">{{ $subject }}</td>
                                                @foreach ($all_grades as $index => $grade_per_quarter)
                                                    <td class="border border-slate-300 p-4 text-center">
                                                        {{ $grade_per_quarter }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @else
                                        {{-- @dd('we only have 1st quarter') --}}
                                        {{-- @dd(gettype($q1_grade_subjects)) --}}
                                        @foreach ($q1_grade_subjects as $subject => $grade)
                                            <tr>
                                                <td class="border border-slate-300 p-4">{{ $subject }}</td>
                                                <td class="border border-slate-300 p-4 text-center">{{ $grade }}
                                                </td>
                                                <td class="border border-slate-300 p-4 text-center"></td>
                                                <td class="border border-slate-300 p-4 text-center"></td>
                                                <td class="border border-slate-300 p-4 text-center"></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{-- <form action=""> --}}
                            {{-- @csrf --}}
                            {{-- <input name="grade_student_id" class="w-20 bg-white  border border-gray-200 rounded-lg " type="text" value="{{ $grade_student->id }}" disabled>
                        <button wire:click="goToUpdateGrades({{ $grade_student->id }})" type="button" class="px-6 py-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Edit</button> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-filament::page>
