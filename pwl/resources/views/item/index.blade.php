<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between w-7xl">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <form action="/item/index">
                        <div class="flex mt-1">
                            <input type="text" id="search" name="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
                            <x-primary-button class="ml-3">
                                {{ __('Search') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="">
                <x-secondary-button 
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-item')"
                    ><span class="mr-2">+</span>{{ __('Add Item') }}
                </x-secondary-button>
                <x-modal name="add-item" focusable>
                    <form method="POST" action="{{ route('item.store') }}" class="p-6">
                        @csrf
                
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Add New Item') }}
                        </h2>
                
                        <div class="mt-6">
                            <x-input-label for="name" value="{{ __('Name') }}" class="sr-only" />
                            <x-text-input
                                id="name"
                                name="name"
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="{{ __('Name') }}"
                                required
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <div class="mt-6">
                            <x-input-label for="price" value="{{ __('Price') }}" class="sr-only" />
                            <x-text-input
                                id="price"
                                name="price"
                                type="number"
                                class="mt-1 block w-full"
                                step="0.01"
                                placeholder="{{ __('Price') }}"
                                required
                            />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                
                        <div class="mt-6">
                            <x-input-label for="quantity" value="{{ __('Quantity') }}" class="sr-only" />
                            <x-text-input
                                id="quantity"
                                name="quantity"
                                type="number"
                                class="mt-1 block w-full"
                                placeholder="{{ __('Quantity') }}"
                                required
                            />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                
                            <x-primary-button class="ml-3">
                                {{ __('Add Item') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-modal>
            </div>

            <div class="bg-white shadow-md rounded my-4 mt-3">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-center py-2 px-3 font-semibold">No</th>
                            <th class="text-center py-2 px-3 font-semibold">Name</th>
                            <th class="text-center py-2 px-3 font-semibold">Quantity</th>
                            <th class="text-center py-2 px-3 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                        <tr class="hover:bg-gray-100">
                            <td class="text-center border-t py-2 px-3">{{ $key + 1 }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $item->name }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $item->quantity }}</td>
                            <td class="text-center border-t py-2 px-3">
                                <x-secondary-button class="mr-1">
                                    <a href="{{ route('item.show', ['id' => $item->id]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                                </x-secondary-button>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</x-app-layout>
