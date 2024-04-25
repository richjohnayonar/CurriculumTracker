<div class="max-w-screen-xl mx-auto p-10 m-6">
    <div class="mt-6 bg-slate-200 p-10 rounded shadow">
        <form wire:submit.prevent='savePost'>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="SchoolId" class="block mb-2 text-sm font-medium text-gray-900 ">School ID</label>
                    <input type="text" id="SchoolID" wire:model='school_id'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
                <div>
                    <label for="SchoolName" class="block mb-2 text-sm font-medium text-gray-900 ">Name of School</label>
                    <input type="text" id="SchoolName" wire:model='name'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
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