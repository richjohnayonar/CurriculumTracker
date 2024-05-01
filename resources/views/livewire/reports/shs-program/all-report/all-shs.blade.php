<div x-data="{ overallSHS: $persist('acad_track')}">
    <div>
        <select id="tabs" x-model="overallSHS"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="acad_track">Academic Track</option>
            <option value="tvl_track">TVL TRACK</option>
        </select>
    </div>


    <div x-show="overallSHS === 'acad_track'">
        <!-- Academic Track content goes here -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="p-4">
                        <th scope="col" class="px-6 py-3">
                            Strand
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniqueStrandAcademics as $uniqueStrandAcademic)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">
                            {{$uniqueStrandAcademic}}
                        </td>
                        <td class="px-8 py-4">
                            <a href="#" wire:click="navigateTo('dashboard/acad','{{$uniqueStrandAcademic}}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <title class="text-xs text-blue-100">View all Record for this strand?</title>
                                </svg></a>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    <div x-show="overallSHS === 'tvl_track'">
        <!-- TVL Track content goes here -->
       <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="p-4">
                        <th scope="col" class="px-6 py-3">
                            Strand
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniqueTVLSpecializations as $uniqueTVLSpecialization)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">
                            {{$uniqueTVLSpecialization}}
                        </td>
                        <td class="px-8 py-4">
                            <a href="#" wire:click="navigateTo('dashboard/tvl','{{$uniqueTVLSpecialization}}')" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <title class="text-xs text-blue-100">View all Record for this strand?</title>
                                </svg></a>
                        </td>
                    </tr>
        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>