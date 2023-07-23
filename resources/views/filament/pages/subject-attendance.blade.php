<x-filament::page>
    <div class="w-full">
    <form wire:submit.prevent="submit" class="w-full">
        @csrf

        <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
            <div class="mb-6">
                <div class="flex">

                    <div class="mr-6">
                        <label for="selectedGradeLevel" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Grade Level</label>
                        <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="selectedGradeLevel" wire:change="filterByGradeLevel">
                            <option value="-1">Please choose grade</option>
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                        </select>
                    </div>

                    @if ($level_subjects !== null)
                        <div class="mr-6">
                            <label for="selectedSection" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Section</label>
                            <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="selectedSection" wire:change="filterBySection" >
                                <option value="">Please choose Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-6">
                            <label for="selectedSubject" class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Subject</label>
                            <select class="w-36 bg-white  border border-gray-200 rounded-lg " wire:model="selectedSubject" required>
                                <option value="">Please choose Subject</option>
                                @foreach ($level_subjects as $level_subject)
                                    <option value="{{ $level_subject->id }}">{{ $level_subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-4">

                        @if(!empty($section_students))
                            <div class="mb-4">
                                <table class="border-collapse border border-slate-400 p-4">
                                    <thead>
                                        <tr>
                                            <th class="border border-slate-300 p-4 ">Name </th>
                                            <th class="border border-slate-300 p-4 ">Present </th>
                                        </tr>
                                    </thead>
                                    <tbody class="mb-4">
                                        @foreach ($section_students as $index => $section_student )
                                            <tr>
                                                <td wire:model='attendance.{{ $index }}.id' class="border border-slate-300 p-4">{{ ucwords($section_student->studentName) }}</td>
                                                <td  class="border border-slate-300 p-4 "><input wire:model='attendance.{{ $index }}.present' class=" " type="checkbox" checked></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit"   class="mt-2 border rounded-lg px-4 py-2">Submit</button>
                            <div>
                                <p class="text-sm mt-2">Un-check box if absent | Tanggalin ang check kung absent.</p>
                                <p class="text-sm mt-2">This transaction will be recorded using {{ Auth::user()->name }}'s details.</p>
                            </div>
                        @endif
            </div>
    </form>
    </div>
</x-filament::page>
