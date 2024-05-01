<div class="max-w-screen-xl mx-auto p-10 m-6 mt-10">
    <div class="bg-white p-10">
        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Welcome
            {{$user->name}}
        </h2>
    </div>
   
    {{-- <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">:></p> --}}

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6 mt-8" x-data="{ activeTab: $persist('shs')}">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
           <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab">
                <li class="me-2" role="presentation" >
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" @click="activeTab = 'shs'">SHS Program</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dashboard-tab" @click="activeTab = 'specialProgram'">Special Curricular Program</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="settings-tab" @click="activeTab = 'arabic'">ALIVE</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="contacts-tab" @click="activeTab = 'als'">ALS</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" x-show="activeTab === 'shs'">
                    @livewire('reports.shs-program.all-report.all-shs')
            </div>
            <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" x-show="activeTab === 'specialProgram'">
                    @livewire('reports.special-cur-program.all-report.all-special-cur')
            </div>
            <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" x-show="activeTab === 'arabic'">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking
                    another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control
                    the content visibility and styling.</p>
            </div>
            <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts"
                x-show="activeTab === 'als'">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking
                    another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control
                    the content visibility and styling.</p>
            </div>
        </div>
            
        </div>
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">Schools</div>
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                            class="ri-more-fill"></i></button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[460px]">
                    <thead>
                        <tr>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                School ID</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                School Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schools as $school)
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="text-gray-600 text-sm font-medium ml-2 truncate">{{$school->school_id}}</span>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-blue-500"> {{$school->name}}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-4">
                    {{ $schools->links() }}
            </div>
        </div>
    </div>
</div>