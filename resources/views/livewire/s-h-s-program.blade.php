<div class="max-w-screen-xl mx-auto p-10 m-6">
    <h1 class="text-3xl font-bold font-serif mt-10 uppercase text-neutral-800">
        Senior High School Program
    </h1>
    <div x-data="{ shs_SelectedTab: $persist('Academic Track')}">
        <div>
            <select wire:model='choiceTrack' x-model="shs_SelectedTab"
                class="bg-gray-50 border-0 border-b-2 border-b-gray-200 shadow text-gray-900 text-sm rounded-lg focus:ring-0 focus:outline-0 outline-none focus:border-slate-300 block md:w-3/12 p-2.5 mt-10">
                <option value="Academic Track" >
                    Academic Track
                </option>
                <option value="Technical Vocation Livelihood (TVL) Track">
                    Technical Vocation Livelihood Track
                </option>
            </select>
        </div>

        {{-- @if ($choiceTrack == 'Academic Track') --}}
        <div x-show="shs_SelectedTab === 'Academic Track'">
            @livewire('academic-track')
        </div>
        {{-- @endif --}}
        {{-- @if ($choiceTrack == 'Technical Vocation Livelihood (TVL) Track') --}}
        <div x-show="shs_SelectedTab === 'Technical Vocation Livelihood (TVL) Track'">
            @livewire('t-v-l-track')
        </div>
        {{-- @endif --}}
    </div>
</div>