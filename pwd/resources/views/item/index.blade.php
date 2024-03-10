<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

    <div class="py-12 pt-2 mt-2">
        <div class="max-w-7xl mx-auto">
            
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
            
        </div>

        <div class="flex flex-row gap-4 max-w-7xl mx-2 sm:px-6 lg:px-8 mt-2">
            <div class="max-w-2xl sm:px-6 lg:px-8">
                <x-secondary-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-item')"
                ><span class="mr-2">+</span>{{ __('Add Item') }}</x-secondary-button>
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
            <div class="flex max-w-2xl sm:px-6 lg:px-8">
                <x-secondary-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'allocate-item')"
                ><span class="mr-2">+</span>{{ __('Allocate Item') }}</x-secondary-button>
                <x-modal name="allocate-item" focusable>
                    <form method="POST" action="{{ route('allocation.store') }}" class="p-6" x-data="{ qty: '' }">
                        @csrf
                    
                        <h2 class="text-xl font-medium text-gray-900 text-center">
                            {{ __('Add New Allocation') }}
                        </h2>
                    
                        <div class="mb-4">
                            <label for="item_id" class="block text-lg font-medium text-gray-700">Item</label>
                            <select id="item_id" class="form-select mt-1 block w-full" name="item_id" required x-on:change="qty = $event.target.selectedOptions[0].getAttribute('data-quantity')">
                                <option value="">Select Item</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}" data-quantity="{{ $item->quantity }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span x-text="'Quantity: ' + qty"></span>
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity</label>
                            <x-input-label for="quantity" value="{{ __('Quantity') }}" class="sr-only" />
                            <x-text-input
                                id="quantity"
                                name="quantity"
                                type="number"
                                class="mt-1 block w-full"
                                x-text="qty"
                                placeholder="{{ __('Quantity') }}"
                                required
                            />
                        </div>
                    
                        <div class="mb-4">
                            <label for="location_id" class="block text-lg font-medium text-gray-700">Location</label>
                            <select id="location_id" class="form-select mt-1 block w-full" name="location_id" required>
                                <option value="">Select Location</option>
                                @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                                       
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                
                            <x-primary-button class="ml-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-modal>
            </div>
            
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-bladewind.table
                divider="thin">
                    <x-slot name="header">
                        <th>No</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($items as $key => $item)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $item->name }} </td>
                        <td> {{ $item->quantity }} </td>
                        <td> 
                            <x-secondary-button class="mr-1">
                                <a href="{{ route('item.show', ['id' => $item->id]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                            </x-secondary-button>
                        </td>
                    </tr>
                    @endforeach 
                </x-bladewind.table>
            </div>

            
        </div>
    </div>
    
</x-app-layout>
