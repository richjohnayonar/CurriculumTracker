<div>
    <form wire:submit.prevent='savePost'>
        <div class="mt-6 bg-slate-200 p-10 rounded shadow">
            <div class="col-span-2">
                <label for="SSESSelect" class="block mb-2 text-sm font-medium text-gray-900 ">School</label>
                <select id="schoolSelectSSES" wire:model="selectedSchool" style="width:100%;">
                    <option value="">Select a School</option>
                    @foreach($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-6 bg-slate-200 p-10 rounded shadow">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
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
                    <label for="type_of_learners" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Type of Learners
                    </label>
                    <select wire:model='type_of_learners'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Fast Learners">
                            Fast Learners
                        </option>
                        <option value="Elementary Non-Graded">
                            Elementary Non-Graded
                        </option>
                        <option value="Elementary Graded">
                            Elementary Graded
                        </option>
                        <option value="Junior High School">
                            Junior High School
                        </option>
                        <option value="Senior High School">
                            Senior High School
                        </option>
                    </select>
                </div>
                @if ($type_of_learners === 'Fast Learners')
                <div>
                    <label for="GradeLevel" class="block mb-2 text-sm font-medium text-gray-900 ">Grade Level
                    </label>
                    <select wire:model='grade_lvl'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option>
                    </select>
                </div>
                @endif
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
                @if ($grade_lvl === 'Grade 6')
                <div>
                    <label for="Pisay" class="block mb-2 text-sm font-medium text-gray-900 ">
                        No. of PISAY Passers
                    </label>
                    <input type="number" id="Pisay" wire:model='pisay_passers'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
                <div>
                    <label for="STE" class="block mb-2 text-sm font-medium text-gray-900 ">
                        No. of STE Passers
                    </label>
                    <input type="number" id="STE" wire:model='ste_passers'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
                @endif
            </div>
        </div>
        <div class="flex md:justify-end justify-center border border-gray-300 shadow-md bg-slate-100 mt-6">
            <!-- This div will hold the button and align it to the right -->
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-5 mx-4 uppercase text-xs">Submit
            </button>
        </div>
    </form>
</div>