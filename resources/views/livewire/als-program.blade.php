<div class="max-w-screen-xl mx-auto p-10 m-6">
    <h1 class="text-3xl font-bold font-serif text-neutral-800 mt-10 uppercase ">
        Alternative Learning System
    </h1>
    <div>
        <div class="mt-12 bg-slate-200 p-10 rounded shadow">
            <form wire:submit.prevent='savePost'>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="schoolLevel" class="block mb-2 text-sm font-medium text-gray-900 ">School Level
                        </label>
                        <select wire:model='school_lvl'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Basic Literacy">Basic Literacy</option>
                            <option value="Elementary School">Elementary School</option>
                            <option value="Junior High School">Junior High School</option>
                            <option value="Senior High School">Senior High School</option>
                    
                        </select>
                    </div>
                    <div>
                        <label for="ScYearStart" class="block mb-2 text-sm font-medium text-gray-900 ">School Year
                            Start</label>
                        <input type="date" id="SchoolYearFrom" placeholder="From" wire:model='scYearStart'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div>
                        <label for="ScYearEnd" class="block mb-2 text-sm font-medium text-gray-900 ">School Year
                            End</label>
                        <input type="date" id="SchoolYearFrom" placeholder="To" wire:model='scYearEnd'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
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
                </div>
                <div class="flex md:justify-end justify-center border border-gray-300 shadow-md bg-slate-100">
                    <!-- This div will hold the button and align it to the right -->
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-5 mx-4 uppercase text-xs">Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>