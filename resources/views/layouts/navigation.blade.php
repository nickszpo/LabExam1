<nav x-data="{ open: false }" class="bg-gray-900 text-white border-b border-gray-800 shadow-sm">
    <div class="px-6 py-4 flex justify-between items-center w-full">

        <!-- Left: Logo + Navigation -->
        <div class="flex items-center space-x-10">

            <!-- 💻 Icon + Text Logo -->
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:text-blue-400 transition">
                <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.75 17h4.5m-10.5 0H3.375a.375.375 0 0 1-.375-.375V6.75A2.25 2.25 0 0 1 5.25 4.5h13.5a2.25 2.25 0 0 1 2.25 2.25v9.875a.375.375 0 0 1-.375.375H20.25m-15 0h15M9.75 17a1.5 1.5 0 0 0 1.5 1.5h1.5a1.5 1.5 0 0 0 1.5-1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="text-xl font-bold tracking-wide">ITDesk</span>
            </a>

            <!-- Navigation Links -->
            <a href="{{ route('dashboard') }}"
               class="text-lg font-medium hover:text-blue-400 transition {{ request()->routeIs('dashboard') ? 'text-blue-400' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('bookings.index') }}"
               class="text-lg font-medium hover:text-blue-400 transition {{ request()->routeIs('bookings.index') ? 'text-blue-400' : '' }}">
                Booking
            </a>
        </div>

        <!-- Right Side: Notifications + Profile -->
        <div class="flex items-center space-x-6">

            <!-- 🔔 Notifications -->
            <div class="relative">
                <button id="notifToggle" class="relative text-gray-300 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if(auth()->user()->unreadNotifications->count())
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full animate-ping"></span>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
                </button>

                <!-- Dropdown -->
                <div id="notifDropdown"
                     class="hidden absolute right-0 mt-3 w-80 bg-gray-800 border border-gray-700 rounded-lg shadow-lg z-50 text-sm">
                    <div class="p-4 font-bold text-blue-300 border-b border-gray-700">Notifications</div>
                    <ul class="max-h-64 overflow-y-auto divide-y divide-gray-700">
                        @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                            <li class="px-4 py-2 hover:bg-gray-700 text-gray-300">
                                {{ $notification->data['message'] ?? 'New Notification' }}
                            </li>
                        @empty
                            <li class="px-4 py-2 text-gray-500">No new notifications</li>
                        @endforelse
                    </ul>
                    @if(auth()->user()->unreadNotifications->count())
                        <form method="POST" action="{{ route('notifications.markAllRead') }}" class="p-3 text-center">
                            @csrf
                            <button type="submit" class="text-blue-400 hover:underline">
                                Mark all as read
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- 👤 Profile -->
            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-white hover:text-blue-400 transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>

    <!-- JS: Toggle Notification Dropdown -->
    <script>
        document.getElementById('notifToggle')?.addEventListener('click', () => {
            document.getElementById('notifDropdown')?.classList.toggle('hidden');
        });
    </script>
</nav>
