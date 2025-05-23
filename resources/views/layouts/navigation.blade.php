<nav x-data="{ open: false }" class="sticky top-0 bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700 z-20 pb-2">
    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Current Date at the top left with added design and lighter navy blue color -->
            <div class="flex items-center text-gray-500 dark:text-gray-400 font-medium">
                <span id="current-date" class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md text-sm sm:text-base text-blue-400">
                    <!-- Date will be inserted here by JavaScript -->
                </span>
            </div>

            <div class="flex">
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Account') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile-information')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // JavaScript to set the current date
    document.addEventListener('DOMContentLoaded', function() {
        const dateElement = document.getElementById('current-date');
        const currentDate = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        dateElement.textContent = currentDate.toLocaleDateString(undefined, options);
    });
</script>
