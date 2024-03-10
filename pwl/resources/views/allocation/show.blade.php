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
                    x-on:click.prevent="$dispatch('open-modal', 'update-allocation')"
                    ><span class="mr-2">+</span>{{ __('Move') }}
                </x-secondary-button>
                <x-modal name="update-allocation" focusable>
                    <form method="POST" action="{{ route('allocation.update', ['id' => $allocation->id]) }}" class="p-6" x-data="{ qty: '' }">
                        @csrf
                        @method('PUT')
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Move Item to other Location') }}
                        </h2>
                        <div class="mt-6">
                            <x-input-label for="item" value="{{ __('Item') }}" class="sr-only" />
                            <x-text-input
                                id="item"
                                name="item"
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="{{ $allocation->item->name }}"
                                readonly
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <input type="hidden" name="item_id" value="{{ $allocation->item_id }}">
                        <div class="mt-6">
                            <x-input-label for="quantity" value="{{ __('Quantity') }}" class="sr-only" />
                            <x-text-input
                                id="quantity"
                                name="quantity"
                                type="text"
                                class="mt-1 block w-full"
                                placeholder=""
                                value=""
                                required
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
            <div class="bg-white shadow-md rounded my-4">
                <table class="w-full">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left py-2 px-3 font-semibold">Item</td>
                            <th class="text-left border-t py-2 px-3">{{ $allocation->item->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Quantity</td>
                            <td class="text-left border-t py-2 px-3">{{ $allocation->quantity }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Location</td>
                            <td class="text-left border-t py-2 px-3">{{ $allocation->location->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Author</td>
                            <td class="text-left border-t py-2 px-3">{{ $allocation->author->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Created</td>
                            <td class="text-left border-t py-2 px-3">{{ \Carbon\Carbon::parse($allocation->created_at)->format('H:i, j F Y') }}</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
            
            
        </div>
    </div>
</x-app-layout>
