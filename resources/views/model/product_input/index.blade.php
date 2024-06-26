<x-layout>
    <div class="p-4">
        <div class="p-4 bg-white shadow rounded-md">
            <div class="flex justify-between items-center">
                <div class="w-full flex justify-start items-center">
                    <div class="pl-3">
                        <span class="text-xl font-bold text-gray-800">Entrada de Produtos</span>
                        <small class="text-gray-400">
                        {{ $models->firstItem() < 10 ? '0'.$models->firstItem() : $models->firstItem() }}-{{ $models->lastItem() < 10 ? '0'.$models->lastItem() : $models->lastItem() }} de {{ $models->total() }}
                        </small>
                    </div>
                        <div>
                            <x-splade-form method="get" :action="route('productInput.index')" :default="request()->all()" class="flex justify-start me-2 px-2">
                                <x-splade-input v-model="form.name" class="me-2 w-36" id="name" name="name" placeholder="Pesquisar :.." autofocus type="text" />

                                <button type="button" @click.prevent="form.submit" class="text-gray-600 bg-white hover:bg-gray-200 hover:text-gray-600 border border-gray-300 font-medium rounded-lg text-sm px-2 py-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </button>
                                <button type="button" @click.prevent="form.reset" class="text-gray-600 bg-white hover:bg-gray-200 hover:text-gray-600 border border-gray-300 font-medium rounded-lg text-sm px-2 py-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </x-splade-form>
                        </div>
                    </div>
                <div class="flex justify-end items-center">
                    @if($models->hasPages())
                        <Link href="{{ $models->previousPageUrl() }}" class="text-gray-600 bg-white hover:bg-gray-200 hover:text-gray-600 border border-gray-300 font-medium rounded-lg text-sm px-2 py-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </Link>
                        <Link href="{{ $models->nextPageUrl() }}" class="text-gray-600 bg-white hover:bg-gray-200 hover:text-gray-600 border border-gray-300 font-medium rounded-lg text-sm px-2 py-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </Link>
                    @endif
                    <Link modal href="{{ route('productInput.create') }}" class="text-gray-600 bg-white hover:bg-gray-200 hover:text-gray-600 border border-gray-300 font-medium rounded-lg text-sm px-2 py-2 me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </Link>
                </div>
            </div>
        </div>


        <div class="p-4 mt-5 bg-white shadow rounded-md">
            <div class="max-w-xxl">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qtde
                            </th>
                            <th scope="col" class="px-6 py-3">
                                V. Unit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                V. Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex justify-end">
                                    <span class="">...</span>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $model)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $model->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $model->product->name }} - {{ $model->product->brand->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $model->quantity }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($model->value, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($model->quantity * $model->value, 2, ',', '.') }}
                                </td>
                                <td>
                                    <div class="flex justify-end">
                                        <Link modal href="{{ route('productInput.edit', $model->id) }}" class="text-blue-700 bg-blue-100 hover:bg-blue-200 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg p-2 me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </Link>
                                        <Link
                                                href="{{ route('productInput.destroy', $model->id) }}"
                                                confirm="Você tem certeza disso?"
                                                confirm-text="Deseja apagar esse registro da plataforma?"
                                                confirm-button="Sim"
                                                cancel-button="Não"
                                                method="DELETE"
                                                class="text-red-700 bg-red-100 hover:bg-red-200 focus:ring-4 focus:ring-red-300 font-medium rounded-lg p-2 me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </Link>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>