<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <x-secondary-button 
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-allocation')"
                    ><span class="mr-2">+</span>{{ __('Add') }}
                </x-secondary-button>
                <x-modal name="add-allocation" focusable>
                    <form method="POST" action="{{ route('allocation.store') }}" class="p-6" x-data="{ qty: '' }">
                        @csrf
                
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Add New Activity') }}
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
                            <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
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
            <div class="bg-white shadow-md rounded my-4 mt-3">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-center py-2 px-3 font-semibold">No</th>
                            <th class="text-center py-2 px-3 font-semibold">Item</th>
                            <th class="text-center py-2 px-3 font-semibold">Quantity</th>
                            <th class="text-center py-2 px-3 font-semibold">Location</th>
                            <th class="text-center py-2 px-3 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allocations as $key => $allocation)
                        <tr class="hover:bg-gray-100">
                            <td class="text-center border-t py-2 px-3">{{ $key + 1 }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $allocation->item->name }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $allocation->quantity }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $allocation->location->name }}</td>
                            <td class="text-center border-t py-2 px-3">
                                <x-secondary-button class="mr-1">
                                    <a href="{{ route('allocation.show', ['id' => $allocation->id]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
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
