<div class="max-w-screen-xl mx-auto p-10 m-6 my-16" x-data="{ special_p_selectedTab: $persist('SSES')}">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <div class="sm:hidden">
            <select id="tabs" x-model="special_p_selectedTab"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="SSES">SSES Program</option>
                <option value="STE">STE</option>
                <option value="SPED">SPED</option>
                <option value="SPJ">SPJ</option>
                <option value="SPA">SPA</option>
            </select>
        </div>
        <ul
            class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow-md sm:flex dark:divide-gray-700 dark:text-gray-400 w-3/5">
            <li class="w-full focus-within:z-10">
                <a href="#" x-on:click.prevent="special_p_selectedTab = 'SSES'"
                    class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 :outline-none"
                    :class="{'active rounded-es-2xl bg-slate-500 text-slate-100 hover:bg-slate-500 hover:text-slate-100 cursor-default': special_p_selectedTab === 'SSES'}"
                    aria-current="page">SSES Program</a>
            </li>
            <li class="w-full focus-within:z-10">
                <a href="#" x-on:click.prevent="special_p_selectedTab = 'STE'"
                    class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 :outline-none"
                    :class="{'active rounded-es-2xl bg-slate-500 text-slate-100 hover:bg-slate-500 hover:text-slate-100 cursor-default': special_p_selectedTab === 'STE'}"
                    aria-current="page">STE Program</a>
            </li>
            <li class="w-full focus-within:z-10">
                <a href="#" x-on:click.prevent="special_p_selectedTab = 'SPED'"
                    class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none"
                    :class="{'active rounded-es-2xl bg-slate-500 text-slate-100 hover:bg-slate-500 hover:text-slate-100 cursor-default': special_p_selectedTab === 'SPED'}">SPED
                    Program</a>
            </li>
            <li class="w-full focus-within:z-10">
                <a href="#" x-on:click.prevent="special_p_selectedTab = 'SPJ'"
                    class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none"
                    :class="{'active rounded-es-2xl bg-slate-500 text-slate-100 hover:bg-slate-500 hover:text-slate-100 cursor-default': special_p_selectedTab === 'SPJ'}">SPJ Program</a>
            </li>
            <li class="w-full focus-within:z-10">
                <a href="#" x-on:click.prevent="special_p_selectedTab = 'SPA'"
                    class="inline-block w-full p-4 border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:outline-none"
                    :class="{'active rounded-es-2xl bg-slate-500 text-slate-100 hover:bg-slate-500 hover:text-slate-100 cursor-default': special_p_selectedTab === 'SPA'}">SPA
                    Program</a>
            </li>
        </ul>
    </div>
    <div x-show="special_p_selectedTab === 'SSES'">
        @livewire('reports.special-cur-program.s-s-e-s.s-s-e-s-report')
    </div>
    <div x-show="special_p_selectedTab === 'STE'">
        @livewire('reports.special-cur-program.s-t-e.s-t-e-program-report')
    </div>
    <div x-show="special_p_selectedTab === 'SPED'">
        @livewire('reports.special-cur-program.s-p-e-d.s-p-e-d-program-report')
    </div>
    <div x-show="special_p_selectedTab === 'SPJ'">
        @livewire('reports.special-cur-program.s-p-j.s-p-j-program-report')
    </div>
    <div x-show="special_p_selectedTab === 'SPA'">
        @livewire('reports.special-cur-program.s-p-a.s-p-a-report')
    </div>
</div>