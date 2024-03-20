<x-splade-data remember="cookie-popup" local-storage default="{dashboard_advanced_link: true, admin_menu: false, order_menu: false, equipment_menu: false }">
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-20 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-200 border-r border-gray-300 sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-200">
            <ul class="space-y-2 font-medium">
                <li>
                    <Link href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/bar-chart.png" alt="bar-chart" />
                        <span class="ms-3">Dashboard</span>
                    </Link>
                </li>
                <li>
                    <button @click.prevent="data.admin_menu = !data.admin_menu" type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100" aria-controls="dropdown-example">
                        <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/opened-folder.png" alt="opened-folder" />
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Administrativo</span>
                        <svg class="w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu-admin" v-show="data.admin_menu" class="py-2 space-y-2 bg-white shadow-sm rounded-lg p-2 my-3">
                        <li>
                            <Link href="{{ route('unit.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100">
                                <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/city.png" alt="city" />
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Unidades</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100">
                                <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/room.png" alt="room" />
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Setores</span>
                            </Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <button @click.prevent="data.equipment_menu = !data.equipment_menu" type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100" aria-controls="dropdown-example">
                        <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/opened-folder.png" alt="opened-folder" />
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Patrimônios</span>
                        <svg class="w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu-admin" v-show="data.equipment_menu" class="py-2 space-y-2 bg-white shadow-sm rounded-lg p-2 my-3">
                        <li>
                            <Link href="" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100">
                                <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/3d-fluency-copy-machine.png" alt="3d-fluency-copy-machine" />
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Patrimônios</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100">
                                <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/print.png" alt="print" />
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Equipamentos</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100">
                                <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/company.png" alt="company" />
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Marcas</span>
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100">
                                <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/package.png" alt="package" />
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Categorias</span>
                            </Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <Link href="{{ route('profile.edit') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <img width="24" height="24" src="https://img.icons8.com/3d-fluency/24/user-shield.png" alt="user-shield" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Minha Conta</span>
                    </Link>
                </li>
            </ul>

            <div v-show="data.dashboard_advanced_link" id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50" role="alert">
                <div class="flex items-center mb-3">
                    <span class="bg-orange-100 text-orange-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded">Beta</span>
                    <button @click.preview="data.dashboard_advanced_link = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 inline-flex justify-center items-center w-6 h-6 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 h-6 w-6" data-dismiss-target="#dropdown-cta" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <p class="mb-3 text-sm text-blue-800">
                    Visualize todos os resultados dos seus técnicos durante o mês
                </p>
                <a class="text-sm text-blue-800 underline font-medium hover:text-blue-900" href="{{ route('dashboard') }}">Clique aqui e veja mais</a>
            </div>
        </div>
    </aside>
</x-splade-data>