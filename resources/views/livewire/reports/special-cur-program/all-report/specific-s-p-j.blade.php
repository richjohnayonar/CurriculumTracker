<div class="max-w-screen-xl mx-auto p-10 m-6 my-16">
    {{-- breadcrumb --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#" wire:click="navigateTo('/')"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Overall
                        SPJ Reports</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2
        class="mb-4 mt-10 text-3xl font-extrabold leading-none tracking-tight text-gray-800 md:text-4xl dark:text-white">
        {{$uniqueGradeLvl}}
    </h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-10 bg-gray-200">
        <div
            class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 justify-between pb-4 p-4  text-gray-600">
            <p class="font-extrabold uppercase">School Details</p>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-slate-600 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="p-4">
                    <th scope="col" class="px-6 py-3">
                        School ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        School Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        School year start
                    </th>
                    <th scope="col" class="px-6 py-3">
                        School year end
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Enrolled Male
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Enrolled Female
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Overall Enrolled
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Grade level
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($SPJByGradeLvls as $SPJByGradeLvl)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4">
                        {{ $SPJByGradeLvl->school->school_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $SPJByGradeLvl->school->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $SPJByGradeLvl->school_year_start }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $SPJByGradeLvl->school_year_end }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $SPJByGradeLvl->no_enrolled_male_stud }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $SPJByGradeLvl->no_enrolled_female_stud }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $SPJByGradeLvl->overall_enrolled }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $SPJByGradeLvl->grade_lvl }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $SPJByGradeLvls->links() }}
    </div>
</div>