<div>
    <div>
        <nav class="fixed top-0 z-30 w-full bg-indigo-500 border-b border-gray-200 text-white shadow-sm">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                            </svg>
                        </button>
                        <Link href="{{ route('home') }}" class="flex ms-2 md:me-24">
                            <x-application-mark class="block h-9 w-auto" />
                            <span class="self-center pl-2 text-xl font-semibold sm:text-2xl whitespace-nowrap">Ordenares</span>
                        </Link>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <x-navigation />

    <div class="p-2 mt-14 sm:ml-64 ">

        @if(isset($header))
            <header class="fixed top-18 z-30 toolbar">
                <div class="w-full mx-auto mt-10 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg px-4 py-5">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </div>
            </header>
        @endif


        <main class="mt-32">
            {{ $slot }}
        </main>
    </div>
</div>