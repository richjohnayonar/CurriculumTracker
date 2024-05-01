<div x-data="{ overAllSpecCur: $persist('sses')}">
    <div>
        <select id="tabs" x-model="overAllSpecCur"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="sses">SSES</option>
            <option value="ste">STE</option>
            <option value="sped">SPED</option>
            <option value="spj">SPJ</option>
            <option value="spa">SPA</option>
        </select>
    </div>


    <div x-show="overAllSpecCur === 'sses'">
        <!-- Academic Track content goes here -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="p-4">
                        <th scope="col" class="px-6 py-3">
                            Grade Level
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniqueSSESGradeLvls as $uniqueSSESGradeLvl)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">
                            {{$uniqueSSESGradeLvl}}
                        </td>
                        <td class="px-8 py-4">
                            <a href="#" wire:click="navigateTo('dashboard/special-curricular/sses','{{$uniqueSSESGradeLvl}}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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



    <div x-show="overAllSpecCur === 'ste'">
        <!-- TVL Track content goes here -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="p-4">
                        <th scope="col" class="px-6 py-3">
                            Grade Level
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniqueSTEGradeLvls as $uniqueSTEGradeLvl)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">
                            {{$uniqueSTEGradeLvl}}
                        </td>
                        <td class="px-8 py-4">
                            <a href="#" wire:click="navigateTo('dashboard/special-curricular/ste','{{$uniqueSTEGradeLvl}}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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



    <div x-show="overAllSpecCur === 'sped'">
        <!-- TVL Track content goes here -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="p-4">
                        <th scope="col" class="px-6 py-3">
                            Type of Learners
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniqueSPEDTypeLearners as $uniqueSPEDTypeLearner)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">
                            {{$uniqueSPEDTypeLearner}}
                        </td>
                        <td class="px-8 py-4">
                            <a href="#" wire:click="navigateTo('dashboard/special-curricular/sped','{{$uniqueSPEDTypeLearner}}')">
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

    

    <div x-show="overAllSpecCur === 'spj'">
        <!-- TVL Track content goes here -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="p-4">
                        <th scope="col" class="px-6 py-3">
                            Grade Level
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniqueSPJGradeLvls as $uniqueSPJGradeLvl)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">
                            {{$uniqueSPJGradeLvl}}
                        </td>
                        <td class="px-8 py-4">
                            <a href="#"
                                wire:click="navigateTo('dashboard/special-curricular/spj','{{$uniqueSPJGradeLvl}}')">
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



    <div x-show="overAllSpecCur === 'spa'">
        <!-- TVL Track content goes here -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="p-4">
                        <th scope="col" class="px-6 py-3">
                            Grade Level
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniqueSPAGradeLvls as $uniqueSPAGradeLvl)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">
                            {{$uniqueSPAGradeLvl}}
                        </td>
                        <td class="px-8 py-4">
                            <a href="#"
                                wire:click="navigateTo('dashboard/special-curricular/spa','{{$uniqueSPAGradeLvl}}')">
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