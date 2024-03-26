<x-layout>
    <div class="p-4">
        <div class="p-4 bg-white shadow rounded-md">
            <div class="flex justify-between items-center">
                <div class="w-full flex justify-between items-center">
                    <div class="pl-3">
                        <span class="text-xl font-bold text-gray-800">Clientes</span>
                    </div>
                    <div class="flex justify-end items-center">
                        <Link href="{{ route('customer.index') }}" class="text-gray-600 bg-white hover:bg-gray-200 hover:text-gray-600 border border-gray-300 font-medium rounded-lg text-sm px-2 py-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 mt-5 bg-white shadow rounded-md">
            <x-splade-form method="put" :action="route('customer.update', $model->id)"  :default="$model" class="mt-6 space-y-6" preserve-scroll>
                <x-splade-input id="name" name="name" type="text" :label="__('Nome')" v-model="form.name" required autofocus />
                <x-splade-input id="document" name="document" type="text" :label="__('CNPJ')" v-model="form.document" required />
                <x-splade-input id="phone" name="phone" type="text" :label="__('Telefone')" v-model="form.phone" required />
                <x-splade-input id="email" name="email" type="text" :label="__('E-mail')" v-model="form.email" required />

                <div class="flex items-center gap-4">
                    <x-splade-submit :label="__('Atualizar')" />
                </div>
            </x-splade-form>
        </div>
    </div>
</x-layout>