<div>
   <nav id="navbar" class="fixed top-0 z-40 flex w-full flex-row justify-between bg-gray-700 px-4 sm:-between">
        <!-- Logo -->
        <div class="flex items-center">
            <p class="text-2xl font-bold text-blue-200 italic font-sans uppercase ">Curriculum Tracker</p>
        </div>

        <!-- Navbar toggler button -->
        <button id="btnSidebarToggler" type="button" class="py-4 text-2xl text-white hover:text-gray-200">
            <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="hidden h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </nav>
    <!-- Navbar end -->

    <!-- Sidebar start-->
    <div id="containerSidebar" class="z-40">
        <div class="navbar-menu relative z-40">
            <nav id="sidebar"
                class="fixed left-0 bottom-0 flex w-3/4 -translate-x-full flex-col overflow-y-auto bg-gray-700 pt-6 pb-8 sm:max-w-xs lg:w-80">
                <!-- one category / navigation group -->
                <div class="px-4 pb-6">
                    <h3 class="mb-2 text-xs font-medium uppercase text-gray-500">
                        Main
                    </h3>
                    <ul class="mb-8 text-sm font-medium">
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#"
                                wire:click="navigateTo('/')">
                                <span class="select-none">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#"
                                wire:click="navigateTo('/shs-program')">
                                <span class="select-none">Senior High School Program</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="/#"
                                wire:click="navigateTo('/special-curricular-program')">
                                <span class="select-none">Special Curricular Program (SCP)</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="/#"
                                wire:click="navigateTo('/arabic-language')">
                                <span class="select-none">Arabic Language and Islamic Values Education (ALIVE)</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="/#"
                                wire:click="navigateTo('/als-program')">
                                <span class="select-none">Alternative Learning System (ALS) Program</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- example copies start -->
                <div class="px-4 pb-6">
                    <h3 class="mb-2 text-xs font-medium uppercase text-gray-500">
                        Reports
                    </h3>
                    <ul class="mb-8 text-sm font-medium">
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                                href="#tc"
                                wire:click="navigateTo('/shs-program-report')">
                                <span class="select-none">SHS Program Reports</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#tc"
                                wire:click="navigateTo('/special-C-program')">
                                <span class="select-none">Special Program Reports</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#tc"
                                wire:click="navigateTo('/arab-Islam-language-edu')">
                                <span class="select-none">Arab & Islam Language Education Reports</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#tc"
                                wire:click="navigateTo('/als-program-report')">
                                <span class="select-none">Alternative Learning System Reports</span>
                            </a>
                        </li>
                    </ul>
                </div>

                @if(Auth::user()->role == 'admin')
                    <!-- Admin  Nav start -->
                    <div class="px-4 pb-6">
                        <h3 class="mb-2 text-xs font-medium uppercase text-gray-500">
                            Admin
                        </h3>
                        <ul class="mb-8 text-sm font-medium">
                            <li>
                                <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#"
                                    wire:click="navigateTo('/admin/create-school')">
                                    <span class="select-none">Create School</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#"
                                    wire:click="navigateTo('/admin/user-info')">
                                    <span class="select-none">User Info</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif

                <div class="px-4 pb-6">
                    <h3 class="mb-2 text-xs font-medium uppercase text-gray-500">
                        Others
                    </h3>
                    <ul class="mb-8 text-sm font-medium">
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                                href="#ex1">
                                <span class="select-none">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" wire:click.prevent='logout'
                                href="#ex2">
                                <span class="select-none">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- example copies end -->
            </nav>
        </div>
        <div class="mx-auto lg:ml-80"></div>
    </div>
    <!-- Sidebar end -->

    <main>
        <!-- your content goes here -->
    </main>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
        const navbar = document.getElementById("navbar");
        const sidebar = document.getElementById("sidebar");
        const btnSidebarToggler = document.getElementById("btnSidebarToggler");
        const navClosed = document.getElementById("navClosed");
        const navOpen = document.getElementById("navOpen");
        const navigationLinks = document.querySelectorAll("#sidebar a");

        // Add click event listener to each navigation link
        navigationLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                updateIndicator(link);
                sidebar.classList.remove("show");
                navClosed.classList.remove("hidden");
                navOpen.classList.add("hidden");
                // Here you can add further logic to handle routing if necessary
            });
        });

        // Sidebar toggler click event
        btnSidebarToggler.addEventListener("click", (e) => {
            e.preventDefault();
            sidebar.classList.toggle("show");
            navClosed.classList.toggle("hidden");
            navOpen.classList.toggle("hidden");
        });

        sidebar.style.top = parseInt(navbar.clientHeight) - 1 + "px";
    });
    </script>
</div>