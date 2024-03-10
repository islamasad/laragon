<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Allocation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-secondary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-item')"
            ><span class="mr-2">+</span>{{ __('Add') }}</x-secondary-button>
        </div>        

        <x-modal name="add-item" focusable>
            <form method="POST" action="{{ route('allocation.store') }}" class="p-6">
                @csrf
        
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Add New Allocation') }}
                </h2>
        
                <div class="mb-4">
                    <label for="item_id" class="block text-sm font-medium text-gray-700">Item</label>
                    <select id="item_id" x-on:input="itemQuantity = $event.target.selectedOptions[0].getAttribute('data-quantity')" class="form-select mt-1 block w-full" name="item_id" required>
                        <option value="">Select Item</option>
                        @foreach($items as $item)
                        <option value="{{ $item->id }}" x-data="{ qty: '{{ $item->quantity }}' }" >{{ $item->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <x-input-label for="quantity" value="{{ __('Quantity') }}" class="sr-only" />
                    <x-text-input
                        id="quantity"
                        name="quantity"
                        type="number"
                        class="mt-1 block w-full"
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
        

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-bladewind.table
                divider="thin">
                    <x-slot name="header">
                        <th>No</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Location</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($allocations as $key => $allocation)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $allocation->item->name }} </td>
                        <td> {{ $allocation->quantity }} </td>
                        <td> {{ $allocation->location->name }} </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach 
                </x-bladewind.table>
            </div>

            
        </div>
    </div>

</x-app-layout>
