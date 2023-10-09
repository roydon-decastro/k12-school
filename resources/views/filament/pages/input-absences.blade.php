<x-filament::page>
    <form wire:submit.prevent="submit" class="w-full">
        @csrf
        <div
            class=" px-6 py-4 block bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <div class="mr-6">
                    <label for="selectedGradeLevel"
                        class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Grade
                        Level</label>
                    <select class="w-full bg-white  border border-gray-200 rounded-lg " wire:model="selectedGradeLevel"
                        wire:change="filterByGradeLevel">
                        <option value="-1">Please choose grade</option>
                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="9">Grade 9</option>
                    </select>
                </div>

                @if ($level_subjects !== null)
                    <div class="mr-6">
                        <label for="selectedSection"
                            class="block mr-4 mt-3 mb-1 text-lg font-bold dark:text-white border-slate-300">Section</label>
                        <select class="w-full bg-white  border border-gray-200 rounded-lg " wire:model="selectedSection"
                            wire:change="filterBySection">
                            <option value="">Please choose Section</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>

            <div class="mt-4">
                @if (!empty($section_students))
                    <div class="mb-4">
                        @foreach ($section_students as $index => $section_student)
                            <div class="border border-slate-300 p-4 mt-2">
                                <p wire:model='attendance.{{ $index }}.id' class=" text-lg font-medium">
                                    {{ ucwords($section_student->studentName) }}</p>
                                <hr>
                                <div class="flex mt-2 overflow-y-auto p-4">
                                    <div class="mr-2">
                                        <label for="attendance.{{ $index }}.absent_count"
                                            class="block text-sm font-normal  text-gray-900 dark:text-white">Number of
                                            Absences</label>
                                        <input wire:model='attendance.{{ $index }}.absent_count' type="number"
                                            step="1"
                                            class="text-sm font-normal bg-white border border-gray-200 rounded-lg"
                                            required>
                                    </div>
                                    @if ($attendance[$index]['absent_count'] > 0)
                                        @foreach (range(1, $attendance[$index]['absent_count']) as $index2)
                                            <div class="mr-2">
                                                <label
                                                    for="attendance.{{ $index }}.absent_dates_array.{{ $index2 }}"
                                                    class="block  text-sm font-normal  text-gray-900 dark:text-white">Absent
                                                    Date</label>
                                                <input
                                                    class=" text-sm font-normal bg-white border border-gray-200 rounded-lg"
                                                    wire:model="attendance.{{ $index }}.absent_dates_array.{{ $index2 }}"
                                                    type="date" required min="2022-06-01" max="2023-04-30">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="mt-2 border rounded-lg px-4 py-2">Submit</button>
                    <div>
                        <p class="text-sm mt-2">This transaction will be recorded using {{ Auth::user()->name }}'s
                            details.</p>
                    </div>
                @endif
            </div>
        </div>
    </form>
</x-filament::page>
