<div class="max-w-screen-xl mx-auto p-10 m-6 my-16">
     {{-- breadcrumb --}}
    <nav class="flex mb-10" aria-label="Breadcrumb">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit |
                        {{$TVLTrack->specialization}}</span>
                </div>
            </li>
        </ol>
    </nav>
    <div>
        <form wire:submit.prevent='update'>
            <div class="mt-6 bg-slate-200 p-10 rounded shadow">
                <div class="col-span-2">
                    <label for="ScYearStart" class="block mb-2 text-sm font-medium text-gray-900 ">School</label>
                    <select id="schoolSelecttvl" wire:model="selectedSchool" style="width:100%;">
                        @foreach($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-6 bg-slate-200 p-10 rounded shadow">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="ScYearStart" class="block mb-2 text-sm font-medium text-gray-900 ">School Year
                            Start</label>
                        <input type="date" id="SchoolYearFrom" placeholder="From" wire:model='school_year_start'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="ScYearEnd" class="block mb-2 text-sm font-medium text-gray-900 ">School Year End</label>
                        <input type="date" id="SchoolYearFrom" placeholder="To" wire:model='school_year_end'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="GradeLevel" class="block mb-2 text-sm font-medium text-gray-900 ">Grade Level
                        </label>
                        <select wire:model='grade_lvl'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                   <div>
                        <label for="specialization" class="block mb-2 text-sm font-medium text-gray-900 ">Specialization
                        </label>
                        <select wire:model='specialization'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if ($grade_lvl == 'Grade 11')
                            <option value="Cookery">
                                Cookery
                            </option>
                            <option value="Hairdressing">
                                Hairdressing
                            </option>
                            <option value="Computer Systems Servicing (CSS)">
                                Computer Systems Servicing (CSS)
                            </option>
                            <option value="Shielded Arch Metal Welding (SMAW)">
                                Shielded Arch Metal Welding (SMAW)
                            </option>
                            <option value="Electrical Installation & Maintenance (EIM)">
                                Electrical Installation & Maintenance (EIM)
                            </option>
                            <option value="Dressmaking">
                                Dressmaking
                            </option>
                            <option value="Animal Production">
                                Animal Production
                            </option>
                            @endif
                            @if($grade_lvl == 'Grade 12')
                            <option value="Food & Beverage Services (FBS)//Bread &Pastry Production (BPP)">
                                Food & Beverage Services (FBS)/Bread &Pastry Production (BPP)
                            </option>
                            <option value="Wellness Massage/Beautyt Care (Nail Art)">
                                Wellness Massage/Beautyt Care (Nail Art)
                            </option>
                            <option value="Computer Systems Servicing (CSS)">
                                Computer Systems Servicing (CSS)
                            </option>
                            <option value="Shielded Arch Metal Welding (SMAW)">
                                Shielded Arch Metal Welding (SMAW)
                            </option>
                            <option value="Electrical Installation & Maintenance (EIM)">
                                Electrical Installation & Maintenance (EIM)
                            </option>
                            <option value="Tailoring">
                                Tailoring
                            </option>
                            <option value="Artificial Insemination/Slaughtering">
                                Artificial Insemination/Slaughtering
                            </option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="No.OfEnrolledMale" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of Enrolled Male Student
                        </label>
                        <input type="number" id="Male" placeholder="Male" wire:model.lazy='total_male_enrolled'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="No.OfEnrolledFemale" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of Enrolled Female Student
                        </label>
                        <input type="number" id="Female" placeholder="Female" wire:model.lazy='total_female_enrolled'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="Enrollments" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Overall Enrollments
                        </label>
                        <input type="number" id="Enrollment" wire:model='overall_enrolled'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required disabled />
                    </div>
                    <div>
                        <label for="Graduates" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of Graduates
                        </label>
                        <input type="number" id="Graduates" wire:model='total_graduates'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="College" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of students pursuing College
                        </label>
                        <input type="number" id="College" wire:model='total_student_pursuing_college'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="Job" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of students to getting a Job
                        </label>
                        <input type="number" id="Job" wire:model='total_student_seeking_job'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="Business" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of students to do Business
                        </label>
                        <input type="number" id="Business" wire:model='total_student_doing_business'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="Undecided" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of Undecided students</label>
                        <input type="number" id="Undecided" wire:model='undecided_student_total'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="NCPasser" class="block mb-2 text-sm font-medium text-gray-900 ">
                            No. of NC Passers <span class="text-xs text-red-800 mr-2">note:</span><span
                                class="text-xs italic text-red-800">if adding numbers to NC
                                Passers please do use the arrow key to avoid any issue</span>
                        </label>
                        <input type="number" id="NCPasser" wire:model.lazy='total_NC_passer'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                </div>
            </div>
            @if($total_NC_passer > 0)
            <div class="mt-6 bg-slate-200 p-10 rounded shadow">
                <label for="total_NC_passer" class="block mb-2 text-sm font-medium text-gray-900">
                    NC Passers
                </label>
                @for($i = 0; $i < $total_NC_passer; $i++) <div class="flex items-center mb-4">
                    <span class='mr-2'>{{$i+1}}. </span>
                    <input type="text" wire:model="passerNames.{{ $i }}.full_name"
                        class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                        required />
            </div>
            @endfor
    </div>
    @endif
    <div class="flex md:justify-end justify-center border border-gray-300 shadow-md bg-slate-100 mt-6">
        <!-- This div will hold the button and align it to the right -->
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-5 mx-4 uppercase text-xs">Confirm
            Update
        </button>
    </div>
    </form>
</div>
</div>