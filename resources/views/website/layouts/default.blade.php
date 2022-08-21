<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    @include('website.includes.head')
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- START LEFT SIDEBAR NAV-->
        @include('website.includes.sidebar')
        <!-- END LEFT SIDEBAR NAV-->

        <div class="flex flex-col flex-1 w-full">
            <!-- START HEADER -->
            @include('website.includes.header')
            <!-- END HEADER -->

            <main class="h-full overflow-y-auto" style="
    /* background-color: #b04bef21; */
    background-color: #29a4d312;
">

                @include('website.includes.alert')

                <!--start container-->
                @yield('content')
                <!--end container-->
            </main>

        </div>
    </div>


    @include('website.includes.scripts')
</body>

</html>
