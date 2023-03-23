<x-filament::page>
    <div class="w-full">
    <form wire:submit.prevent="submit" class="w-full">
        @csrf

        <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
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
                    <div>
                        <label for="quarter" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Quarter</label>
                        <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="quarter" required>
                            <option value="">Please choose Quarter</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </select>
                    </div>
                </div>
            </div>
                @if(!empty($section_students))

                    @foreach ($section_students as $index => $section_student )

                        <div class="overflow-y-auto mb-6 bg-white border border-amber-200 rounded-lg p-4 ">
                            <div class="flex justify-between">
                                <p class="text-lg font-medium ">{{ ucwords($section_student->studentName) }}</p>
                                <p class="text-sm font-medium" >Record ID: {{ $section_student->id }}</p>
                            </div>
                            <hr class="mb-4">
                            <div class="flex justify-between">
                                {{-- <div>
                                    <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="grade_level" wire:change="filterByGradeLevel">
                                        <option wire:model="student_grades.{{$index}}.section_student_id" value="{{ $section_student->id }}">{{ $section_student->id }}</option>
                                    </select>
                                </div> --}}
                                <div class="flex mt-4">
                                    @foreach ($level_subjects as $index2 => $level_subject )
                                    <div class="mr-2">
                                        {{-- <label for="student_grades.{{$index}}.grades.{{$index2}}.{{$level_subject->name}}" class="block mt-3 mb-1 text-sm font-normal dark:text-white">{{$level_subject->short_name}}</label>
                                        <input wire:model="student_grades.{{$index}}.grades.{{$index2}}.{{$level_subject->name}}" class="w-20 bg-white  border border-gray-200 rounded-lg " type="number" max="100"> --}}
                                        <label for="student_grades.{{$index}}.grades.{{$level_subject->name}}" class="block mt-3 mb-1 text-sm font-normal dark:text-white">{{$level_subject->short_name}}</label>
                                        <input wire:model="student_grades.{{$index}}.grades.{{$level_subject->name}}" class="w-20 bg-white  border border-gray-200 rounded-lg " type="number" max="100">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="block mt-4">
                                    <label for="student_grades.{{$index}}.section_student_id" class="block mt-3 mb-1 text-sm font-normal dark:text-white">Record ID</label>
                                    {{-- <input wire:model="student_grades.{{$index}}.section_student_id" class="mb-4 w-20 bg-white  border border-gray-200 rounded-lg " type="text" required> --}}
                                    <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="student_grades.{{$index}}.section_student_id" required>
                                        <option value="">Confirm record ID</option>
                                        <option value="{{ $section_student->id }}">{{ $section_student->id }}</option>
                                    </select>
                                </div>

                            </div>
                    </div>
                    @endforeach
                    <button type="submit"   class="border rounded-lg px-4 py-2 bg-red-700">Submit</button>
                    <div>
                        <p class="text-sm mt-2 italic">This transaction will be recorded using {{ Auth::user()->name }}'s details.</p>
                    </div>
                @endif


            </div>



    </form>

    {{-- <script>
        const element = document.getElementById("section_student_id").innerHTML;
        console.log(element);
        </script> --}}
    </div>
</x-filament::page>
