<div>
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <form action="#" method="GET" class="md:hidden mb-2">
                <label for="sidebar-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                            </path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="sidebar-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search" />
                </div>
            </form>
            <ul class="space-y-2">
                <x-admin.menu-item
                    href="/admin/dashboard"
                    label="Dashboard"
                    icon='<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>'
                />
                <x-admin.menu-item
                    href="/admin/about"
                    label="About"
                    icon='<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>'
                />
                <x-admin.menu-item
                    href="/admin/student"
                    label="Student"
                    icon='<path d="M7 10a3 3 0 100-6 3 3 0 000 6z"></path>
                    <path fill-rule="evenodd" d="M2 16a5 5 0 0110 0v1H2v-1zM13 7a3 3 0 11-1.5 2.6A4.98 4.98 0 0013 7zm-1 9h6v-1a5 5 0 00-5-5 4.98 4.98 0 00-2.6.73A7.02 7.02 0 0112 16z" clip-rule="evenodd"></path>'
                />
                <x-admin.menu-item
                    href="/admin/classroom"
                    label="Classroom"
                    icon='<path d="M3 5.5A1.5 1.5 0 014.5 4h11A1.5 1.5 0 0117 5.5v8a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 13.5v-8z"></path>
                    <path d="M7 19h6M10 15v4"></path>'
                />
                <x-admin.menu-item
                    href="/admin/teacher"
                    label="Teacher"
                    icon='<path d="M10 2a4 4 0 100 8 4 4 0 000-8z"></path>
                    <path d="M3 18a7 7 0 0114 0v1H3v-1z"></path>'
                />
                <x-admin.menu-item
                    href="/admin/subject"
                    label="Subject"
                    icon='<path d="M4 3h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z"></path>
                    <path d="M7 7h6M7 10h6M7 13h4"></path>'
                />
        </div>
    </aside>
</div>
