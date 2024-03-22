<x-layout>
    <div class="p-4">
        <div class="p-4 bg-white shadow rounded-md">
            <div class="flex justify-between items-center">
                <div class="w-full flex justify-between items-center">
                    <div class="pl-3">
                        <span class="text-xl font-bold text-gray-800">Entrada de Produtos</span>
                    </div>
                    <div class="flex justify-end items-center">
                        <Link href="{{ route('productInput.index') }}" class="text-gray-600 bg-white hover:bg-gray-200 hover:text-gray-600 border border-gray-300 font-medium rounded-lg text-sm px-2 py-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 mt-5 bg-white shadow rounded-md">
            <x-splade-form method="post" :action="route('productInput.store')"  class="mt-6 space-y-6" preserve-scroll>
                <x-splade-select select
                                 id="product_id"
                                 name="product_id"
                                 :label="__('Produto')"
                                 :options="$products"
                                 option-label="content"
                                 v-model="form.product_id"
                                 option-value="id"
                                 choices
                                 select-first-remote-option  />
                <x-splade-input id="quantity" name="quantity" type="text" :label="__('Quantidade')" v-model="form.quantity" required />
                <x-splade-input id="value" name="value" type="text" :label="__('Valor')" v-model="form.value" required />
                <div class="flex items-center gap-4">
                    <x-splade-submit :label="__('Salvar')" />
                </div>
            </x-splade-form>
        </div>
    </div>
</x-layout>