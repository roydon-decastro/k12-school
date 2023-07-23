<x-filament::page>
    <div class="w-full">
        <form wire:submit.prevent="submit" class="w-full">
            @csrf
            <div class="p-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 columns-1 ">
                <div class="mb-4">
                    <p class=" text-2xl font-bold">For School Year: {{ $school_year_open[0]->name }}</p>
                </div>
                @foreach ($levels as $indexLevel => $level)
                <div class="mt-4 p-4 mb-6 bg-white  rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 ">
                    <p class=" font-medium text-lg">{{ $level->name }}</p>
                    <hr>
                    <div class="flex mt-4">
                        @foreach ($fees as $indexFee => $fee )
                        <div class="mr-2">
                            <label for="" class="block mt-3 mb-1 text-xs font-normal text-slate-200 dark:text-white">{{$fee->feeName}}</label>
                            <input wire:model="school_fees.{{$indexLevel}}.{{$fee->feeId}}" class=" w-32 bg-white  border border-gray-200 rounded-lg " type="number">

                        </div>
                        @endforeach
                    </div>
                    <p wire:model="level_total" class="mt-4 font-medium text-lg">Total: {{ $this->updated($indexLevel) }}</p>
                </div>
                @endforeach
                <button type="submit"  class="border rounded-lg px-4 py-2 bg-red-700">Submit</button>
                    <div>
                        <p class="text-sm mt-2 italic">This transaction will be recorded using {{ Auth::user()->name }}'s details.</p>
                    </div>
            </div>
        </form>
    </div>

</x-filament::page>
