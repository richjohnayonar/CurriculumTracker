<div class="max-w-screen-xl mx-auto p-10 m-6 my-16" x-data="{ shs_r_selectedTab: $persist('academic')}">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <div class="sm:hidden">
            <select id="tabs" x-model="shs_r_selectedTab"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="academic">Academic Track</option>
                <option value="tvl">TVL TRACK</option>
            </select>
        </div>
        <ul
            class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow-md sm:flex dark:divide-gray-700 dark:text-gray-400 w-4/12">
            <li class="w-full focus-within:z-10">
                <a href="#" x-on:click.prevent="shs_r_selectedTab = 'academic'" 
                    class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 :outline-none"
                    :class="{'active rounded-es-2xl bg-slate-500 text-slate-100 hover:bg-slate-500 hover:text-slate-100 cursor-default': shs_r_selectedTab === 'academic'}"
                    aria-current="page"
                    >Academic Track</a>
            </li>
            <li class="w-full focus-within:z-10">
                <a href="#" x-on:click.prevent="shs_r_selectedTab = 'tvl'" 
                    class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none"
                    :class="{'active rounded-es-2xl bg-slate-500 text-slate-100 hover:bg-slate-500 hover:text-slate-100 cursor-default': shs_r_selectedTab === 'tvl'}"
                    >TVL
                    TRACK</a>
            </li>
        </ul>
    </div>
    <div x-show="shs_r_selectedTab === 'academic'">
        <!-- Academic Track content goes here -->
        @livewire('reports.shs-program.academic-track-report')
    </div>
    <div x-show="shs_r_selectedTab === 'tvl'">
        <!-- TVL Track content goes here -->
        @livewire('reports.shs-program.t-v-l-track-report')
    </div>
</div>
