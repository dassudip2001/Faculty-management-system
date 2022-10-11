<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Vidyasagar University') }}</title>
        <!--  Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800" x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline"style=" text-decoration: none;"><i class="fa-solid fa-user"></i> {{ Auth::user()->name }}</a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">

                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline  " style=" text-decoration: none;" href="#">Vidyasagar University</a>
{{--                @role('admin')--}}
{{--                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href=" {{route('admin.roles.index')}} ">Roles</a>--}}
{{--                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href=" {{ route( 'admin.permissions.index' ) }} ">Permission</a>--}}
{{--                @endrole--}}

{{--                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ url('/department') }}">Department</a>--}}
{{--                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Facilty</a>--}}

                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle mt-4 mx-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Master Module
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        @role('admin')
                        <li><a class="dropdown-item" href="{{ route( 'admin.permissions.index' ) }} ">Permission </a></li>
                        <li><a class="dropdown-item" href=" {{route('admin.roles.index')}}">Roles </a></li>
                        @endrole
                        <li><a class="dropdown-item" href=" {{ url('/department') }}">Department </a></li>
                        <li><a class="dropdown-item" href=" {{ url('/createuser') }}">Create User </a></li>
                        <li><a class="dropdown-item" href=" {{ url('/funding') }}"> Funding Agency </a></li>
                        <li><a class="dropdown-item" href=" {{ url('/budget') }}">Budget </a></li>
                        <li><a class="dropdown-item" href=" {{ url('/projectdetail') }}">Create Project </a></li>
                    </ul>
                </div>

                <div class="dropdown mt-4 mx-4">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Edit Details
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li><a class="dropdown-item" href=" {{ url('/faculty') }}">Faculty </a></li>
                        <li><a class="dropdown-item" href="{{ url('/project') }}">Projects</a></li>
                    </ul>
                </div>
                <div class="dropdown mt-4 mx-4">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Budget Amount
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li><a class="dropdown-item" href=" {{url('/projectbudgetamount')}} ">Budget Amount Calculation </a></li>
                        <li><a class="dropdown-item" href=" {{url('/invoiceuoload')}} ">Upload invoice</a></li>
                    </ul>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <a class="block px-4 py-2 mt-5 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                       style=" text-decoration: none;" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </form>
            </nav>
        </div>
        <div class="w-full">
            <!-- Page Heading -->
            <header class="bg-white dark:bg-gray-700 shadow">
                <div class="ml-4 py-6 px-4 sm:px-6 lg:px-8">

                    {{ $header }}

                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    </body>

</html>
















{{--
 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                 <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                >Logout</a>
                </form> --}}
