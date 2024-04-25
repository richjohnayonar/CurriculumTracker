<div >
    <form wire:submit.prevent='savePost'>
        <div class="mt-6 bg-slate-200 p-10 rounded shadow">
            <div class="col-span-2">
                <label for="ScYearStart" class="block mb-2 text-sm font-medium text-gray-900 ">School</label>
                <select id="schoolSelect" wire:model="selectedSchool" style="width:100%;">
                    <option value="">Select a School</option>
                    @foreach($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="md:flex md:flex-row md:gap-6">
                <div class="mt-6 bg-slate-200 p-10 rounded shadow md:w-6/12">
                    <div class="grid gap-6 mb-6">
                        <div>
                            <label for="ScYearStart" class="block mb-2 text-sm font-medium text-gray-900 ">School Year Start</label>
                            <input type="date" id="SchoolYearFrom" placeholder="From" wire:model='scYearStart'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="ScYearEnd" class="block mb-2 text-sm font-medium text-gray-900 ">School Year End</label>
                            <input type="date" id="SchoolYearFrom" placeholder="To" wire:model='scYearEnd'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="Strand" class="block mb-2 text-sm font-medium text-gray-900 ">Strand
                            </label>
                            <select wire:model='strand'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="General Academic Strand (GAS)">
                                    General Academic Strand (GAS)
                                </option>
                                <option value="Accountancy, Business, and Management (ABM)">
                                    Accountancy, Business, and Management (ABM)
                                </option>
                                <option value="Humanities and Social Sciences (HUMSS)">
                                    Humanities and Social Sciences (HUMSS)
                                </option>
                                <option value="Science, Technology, Engineering, & Mathematics (STEM)">
                                    Science, Technology, Engineering, & Mathematics (STEM)
                                </option>
                            </select>
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
                    </div>
                </div>
                <div class="mt-6 bg-slate-200 p-10 rounded shadow md:w-6/12">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="No.OfEnrolledMale" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of Enrolled Male Student
                            </label>
                            <input type="number" id="Male" placeholder="Male" wire:model.lazy='enrolledMale'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="No.OfEnrolledFemale" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of Enrolled Female Student
                            </label>
                            <input type="number" id="Female" placeholder="Female" wire:model.lazy='enrolledFemale'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="Enrollments" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Overall Enrollments
                            </label>
                            <input type="number" id="Enrollment" wire:model='overallEnrolled'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required disabled />
                        </div>
                        <div>
                            <label for="Graduates" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of Graduates
                            </label>
                            <input type="number" id="Graduates" wire:model='num_Grad'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="College" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of students pursuing College
                            </label>
                            <input type="number" id="College" wire:model='num_College_take'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="Job" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of students to getting a Job
                            </label>
                            <input type="number" id="Job" wire:model='num_job_take'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="Business" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of students to do Business
                            </label>
                            <input type="number" id="Business" wire:model='num_business_take'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="Undecided" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of Undecided students</label>
                            <input type="number" id="Undecided" wire:model='num_undecided'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div>
                            <label for="DOSTPassers" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of DOST Scholarship Passers <span class="text-xs text-red-800 mr-2">note:</span><span
                                    class="text-xs italic text-red-800">if adding numbers to DOST
                                    Passers please do use the arrow key to avoid any issue</span>
                            </label>
                            <input type="number" id="DOSTPassers" wire:model.lazy='dostPassers'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        {{-- <div>
                            <label for="NCPassers" class="block mb-2 text-sm font-medium text-gray-900 ">
                                No. of NC Passers
                            </label>
                            <input type="number" id="NCPassers"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div> --}}
                
                    </div>
                </div>
        </div>
        @if($dostPassers > 0)
            <div class="mt-6 bg-slate-200 p-10 rounded shadow">
                <label for="DOSTPasserNames" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Names of DOST Scholarship Passers <span class="ml-2 text-xs text-blue-400">
                        E.g., Rich John G. Ayonar
                    </span>
                </label>
                @for($i = 0; $i < $dostPassers; $i++)
                    <div class="flex items-center mb-4">
                        <span class='mr-2'>{{$i+1}}. </span>
                        <input type="text" wire:model="passerNames.{{ $i }}"
                            class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                            required />
                    </div>
                @endfor
            </div>
        @endif
        <div class="flex md:justify-end justify-center border border-gray-300 shadow-md bg-slate-100 mt-6">
            <!-- This div will hold the button and align it to the right -->
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-5 mx-4 uppercase text-xs font-bold w-2/12">Submit
            </button>
        </div>
    </form>
</div>