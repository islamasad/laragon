<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-secondary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-item')"
            ><span class="mr-2">+</span>{{ __('Add Item') }}</x-secondary-button>
        </div>        

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
                    <x-input-label for="description" value="{{ __('Description') }}" class="sr-only" />
                    <x-text-input
                        id="description"
                        name="description"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="{{ __('Description') }}"
                        required
                    />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
        
                <div class="mt-6">
                    <x-input-label for="purchase_date" value="{{ __('Purchase Date') }}" class="sr-only" />
                    <x-text-input
                        id="purchase_date"
                        name="purchase_date"
                        class="mt-1 block w-full"
                        placeholder="{{ __('Purchase Date') }}"
                        required
                    />
                    <x-input-error :messages="$errors->get('purchase_date')" class="mt-2" />
                </div>
        
                <div class="mt-6">
                    <x-input-label for="purchase_price" value="{{ __('Purchase Price') }}" class="sr-only" />
                    <x-text-input
                        id="purchase_price"
                        name="purchase_price"
                        type="number"
                        class="mt-1 block w-full"
                        step="0.01"
                        placeholder="{{ __('Purchase Price') }}"
                        required
                    />
                    <x-input-error :messages="$errors->get('purchase_price')" class="mt-2" />
                </div>
        
                <div class="mt-6">
                    <x-input-label for="amount" value="{{ __('Amount') }}" class="sr-only" />
                    <x-text-input
                        id="amount"
                        name="amount"
                        type="number"
                        class="mt-1 block w-full"
                        placeholder="{{ __('Amount') }}"
                        required
                    />
                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
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
        

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 text-3xl font-semibold">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4">
                                No
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Amount
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $key + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->amount }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Allocation</a>
                            </td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>

</x-app-layout>
