<div class="max-w-screen-xl mx-auto p-10 m-6 my-16">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border mt-8 bg-slate-500">
        <div
            class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4 p-4">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div
                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search" wire:model='search'
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="p-4">
                    <th scope="col" class="px-6 py-3">
                        School Level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        School Year Start
                    </th>
                    <th scope="col" class="px-6 py-3">
                        School Year End
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Male Enrolled
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Female Enrolled
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Overall Enrolled
                    </th>
                    @if (Auth::user()->role == 'admin')
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($alss as $als)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{$als->school_lvl}}
                    </td>
                    <td class="px-6 py-4">
                        {{$als->school_year_start}}
                    </td>
                    <td class="px-6 py-4">
                        {{$als->school_year_end}}
                    </td>
                    <td class="px-6 py-4">
                        {{$als->no_enrolled_male_stud}}
                    </td>
                    <td class="px-6 py-4">
                        {{$als->no_enrolled_female_stud}}
                    </td>
                    <td class="px-6 py-4">
                        {{$als->overall_enrolled}}
                    </td>
                    @if(Auth::user()->role == 'admin')
                        <td class="py-4">
                            <div class="flex flex-wrap">
                                <a href="#" wire:click.prevent='EditArabIslamLang({{$als->id}})'
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4 hover:text-blue-500 text-gray-600"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke='currentColor' stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <a href="#" wire:click="deleteAlsRecord({{$als->id}})"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline hover:text-red-500 text-gray-600"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="relative overflow-hiden shadow-md sm:rounded-lg">
        <!-- Edit user modal -->
        <div id="UserModal" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 overflow-x-hidden overflow-y-auto {{ $isEditModalOpen ? 'block' : 'hidden' }} flex items-center justify-center bg-gray-200 bg-opacity-75">
            <div class="relative w-11/12 md:w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form class="relative bg-white rounded-lg shadow dark:bg-gray-700 my-20" wire:submit.prevent='confirmUpdate'>
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click='closeModal'>
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
                        <div class="grid gap-6 mb-6 sm:grid-cols-2">
                            <div>
                                <label for="grade_lvl"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade
                                    Level</label>
                                <select wire:model.defer='school_lvl'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Basic Literacy">Basic Literacy</option>
                                    <option value="Elementary School ">Elementary School </option>
                                    <option value="Junior High School">Junior High School</option>
                                    <option value="Senior High School">Senior High School</option>
                                </select>
                            </div>
                            <div>
                                <label for="scYearStart"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School Year
                                    Start</label>
                                <input type="date" id="year_start" wire:model.defer='scYearStart'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Bonnie" required="">
                            </div>
                            <div>
                                <label for="scYearEnd"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School Year
                                    End</label>
                                <input type="date" id="year_end" wire:model.defer='scYearEnd'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Bonnie" required="">
                            </div>
                            <div>
                                <label for="male_enrolled"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Male
                                    Enrolled</label>
                                <input type="number" id="male_enrolled" wire:model.lazy='enrolledMale'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required="">
                            </div>
                            <div>
                                <label for="femaleEnrolled"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Female
                                    Enrolled</label>
                                <input type="number" id="female_enrolled" wire:model.lazy='enrolledFemale'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required="">
                            </div>
                            <div>
                                <label for="overAllEnrolled"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Overall
                                    Enrolled </label>
                                <input type="number" id="overAllEnrolled" wire:model.lazy='overallEnrolled'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Bonnie" required="" disabled>
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
    <!-- Pagination links -->
    <div class="p-4">
            {{ $alss->links() }}
    </div>
</div>