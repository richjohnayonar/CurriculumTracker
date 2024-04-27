<div class="max-w-screen-xl mx-auto p-10 m-6 my-16"> 
   <nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" wire:click="navigateTo('/shs-program-report')"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Senior Highschool Program Report
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">View |
                    {{$TVLTrack->specialization}}</span>
            </div>
        </li>
    </ol>
</nav>
    <h2 class="mb-4 mt-10 text-3xl font-extrabold leading-none tracking-tight text-gray-800 md:text-4xl dark:text-white">
            {{ $school->name }}
    </h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8">
        <div
            class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 justify-between pb-4 p-4 bg-gray-200 text-gray-600">
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
                        Specialization
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Grade level
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4">
                        {{ $school->school_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $school->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->school_year_start }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->school_year_end }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->specialization }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->grade_lvl}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8">
        <div
           class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 justify-between pb-4 p-4 bg-gray-200 text-gray-600 uppercase font-extrabold">
            <p>Total Enrollees and other Details</p>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-slate-600 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="p-4">
                    <th scope="col" class="px-6 py-3">
                        Total male Enrolled
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total female Enrolled
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Overall Enrolled
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Graduates
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total pursuing College
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total student seeking Job
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total student doing Business
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Undecided student Total
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4">
                        {{ $TVLTrack->total_male_enrolled }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->total_female_enrolled }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->overall_enrolled }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->total_graduates }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->total_student_pursuing_college }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->total_student_pursuing_college }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->total_student_seeking_job }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $TVLTrack->undecided_student_total }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8">
        @if(empty($TVLTrack->total_NC_passer))
        <div
           class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 justify-between pb-4 p-4 bg-gray-200 text-gray-600 uppercase font-extrabold">
            <p>NO NC Passers</p>
        </div>
        <div class="flex items-center justify-center flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900 p-6 ">
            <p>No Data Found</p>
        </div>
        @else
        <div
           class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 justify-between pb-4 p-4 bg-gray-200 text-gray-600 uppercase font-extrabold">
            <p>NC Passers Lists</p>
        </div>
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900 p-6">
            @if (Auth::user()->role == 'admin')
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Bulk Action
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="py-1">
                            <a href="#" wire:click.prevent='confirmDelete'
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-red-600 hover:uppercase hover:font-bold">Delete
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative ">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users" wire:model="search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @if(Auth::user()->role == 'admin')
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    wire:model='selectAll' wire:click="toggleSelectAll($event.target.checked)">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                    @endif
                   
                    <th scope="col" class="px-6 py-3">
                        Full Name
                    </th>
                    @if(Auth::user()->role == 'admin')
                       <th scope="col" class="px-6 py-3">
                            Action
                        </th> 
                    @endif
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($NCPassers as $NCPasser)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @if(Auth::user()->role == 'admin')
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-{{$NCPasser->id}}" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    wire:model="selectedNCPassers" value="{{ $NCPasser->id }}">
                                <label for="checkbox-table-search-{{$NCPasser->id}}" class="sr-only">checkbox</label>
                            </div>
                        </td>
                    @endif
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $NCPasser->full_name }}
                    </td>
                    @if(Auth::user()->role == 'admin')
                        <td class="px-6 py-4">
                            <!-- Modal toggle -->
                            <a href="#" type="button" data-modal-target="editUserModal" wire:click.prevent='EditFullName({{$NCPasser->id}})'
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <!-- Edit user modal -->
            <div id="editUserModal" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 z-50 overflow-hidden hidden flex items-center justify-center bg-gray-200 bg-opacity-75">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <form class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                        wire:submit.prevent='updateNCPasserName'>
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Editing {{$full_name}}
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="editUserModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="grid">
                                <div>
                                    <label for="first-name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                                    <input type="text" name="fullName" id="fullName" wire:model.defer='full_name'
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required="">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600 justify-end">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Confirm
                                update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        <div class="p-4">
            {{ $NCPassers->links() }}
        </div>
    </div>
</div>