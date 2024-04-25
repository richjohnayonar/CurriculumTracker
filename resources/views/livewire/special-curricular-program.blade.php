<div class="max-w-screen-xl mx-auto p-10 m-6">
    <h1 class="text-3xl font-bold font-serif mt-10 text-neutral-800 uppercase ">Special Curricular Program</h1>
    <div>
        <div>
            <select wire:model='choiceTrack'
                class="bg-gray-50 border-0 border-b-2 border-b-gray-200 shadow text-gray-900 text-sm rounded-lg focus:ring-0 focus:outline-0 outline-none focus:border-slate-300 block w-4/12 p-2.5 mt-10 ">
                <option value="Special Science Elementary School (SSES) Program">
                    Special Science Elementary School (SSES) Program
                </option>
                <option value="Science, Technology, and Engineering (STE) Program">
                    Science, Technology, and Engineering (STE) Program
                </option>
                <option value="Special Education (SPED) Program">
                    Special Education (SPED) Program
                </option>
                <option value="Special Program in Journalism (SPJ)">
                    Special Program in Journalism (SPJ)
                </option>
                <option value="Special Program in the Arts (SPA)">
                    Special Program in the Arts (SPA)
                </option>
            </select>
        </div>

        @if ($choiceTrack === 'Special Science Elementary School (SSES) Program')
            @livewire('s-s-e-s-program')
        @endif
        @if ($choiceTrack == 'Science, Technology, and Engineering (STE) Program')
        <div>
            @livewire('s-t-e-program')
        </div>
        @endif
        @if ($choiceTrack == 'Special Education (SPED) Program')
        <div>
            @livewire('s-p-e-d-program')
        </div>
        @endif
        @if ($choiceTrack == 'Special Program in Journalism (SPJ)')
        <div>
            @livewire('s-p-j-program')
        </div>
        @endif
        @if ($choiceTrack == 'Special Program in the Arts (SPA)')
        <div>
            @livewire('s-p-a')
        </div>
        @endif
    </div>
</div>