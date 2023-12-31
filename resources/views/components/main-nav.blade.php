@auth
<nav class="bg-white dark:bg-fitectur-gray-dark fixed w-full z-20 top-0 left-0 shadow-lg">
    @else
    <nav class="w-full">
@endauth
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://fitectur.com/" class="flex items-center">
            <x-fitectur-isotipo />

        </a>
        <div class="flex md:order-2 items-center">
            @auth

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @endauth

            <x-dark-mode-toggle />
            @auth
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            @endauth
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-fitectur-gray-dark md:dark:bg-fitectur-gray-dark dark:border-gray-700">
                @auth
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2 pl-3 pr-4 text-fitectur-blue-normal rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-fitectur-blue-alt md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Home</a>
                    </li>



                    <li>
                        <a href="{{ route('expos.index') }}"
                            class="block py-2 pl-3 pr-4 text-fitectur-blue-normal rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-fitectur-blue-alt md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Eventos</a>
                    </li>
                    <li>
                        <a href="{{ route('dump', 'link-from-nav-to-institutions') }}"
                            class="block py-2 pl-3 pr-4 text-fitectur-blue-normal rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-fitectur-blue-alt md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Instituciones</a>
                    </li>
                    <li>
                        <a @isset($current_expo)
                    href="{{ route('expos.stands.index', $current_expo) }}"
                    @else
                    href="{{ route('stands.index') }}"
                    @endisset
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Stands</a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            About</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
