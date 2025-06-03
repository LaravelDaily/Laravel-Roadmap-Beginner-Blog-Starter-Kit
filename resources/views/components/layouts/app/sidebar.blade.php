            <aside :class="{ 'w-full md:w-64': sidebarOpen, 'w-0 md:w-16 hidden md:block': !sidebarOpen }"
                class="bg-sidebar text-sidebar-foreground border-r border-gray-200 dark:border-gray-700 sidebar-transition overflow-hidden">
                <!-- Sidebar Content -->
                <div class="h-full flex flex-col">
                    <!-- Sidebar Menu -->
                    <nav class="flex-1 overflow-y-auto custom-scrollbar py-4">
                        <ul class="space-y-1 px-2">
                            <!-- Dashboard -->
                            <x-layouts.sidebar-link href="{{ route('admin.dashboard') }}" icon='fas-house'
                                :active="request()->routeIs('admin.dashboard*')">Dashboard</x-layouts.sidebar-link>

                            <x-layouts.sidebar-link href="{{ route('admin.posts.index') }}" icon='fas-newspaper'
                                :active="request()->routeIs('posts.index*')">Posts</x-layouts.sidebar-link>

                            <x-layouts.sidebar-link href="{{ route('admin.categories.index') }}" icon='fas-folder'
                                :active="request()->routeIs('categories.index*')">Categories</x-layouts.sidebar-link>

                            <x-layouts.sidebar-link href="{{ route('admin.tags.index') }}" icon='fas-tag'
                                :active="request()->routeIs('tags.index*')">Tags</x-layouts.sidebar-link>
                        </ul>
                    </nav>
                </div>
            </aside>
