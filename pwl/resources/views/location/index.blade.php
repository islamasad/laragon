<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <x-secondary-button 
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-location')"
                    ><span class="mr-2">+</span>{{ __('Add') }}
                </x-secondary-button>
                <x-modal name="add-location" focusable>
                    <form method="POST" action="{{ route('location.store') }}" class="p-6">
                        @csrf
                
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Add New Location') }}
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
                            <x-textarea-input name="description" rows="4" class="mt-1 block w-full" placeholder="Enter your description here" />

                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
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
                            <th class="text-center py-2 px-3 font-semibold">Name</th>
                            <th class="text-center py-2 px-3 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $key => $location)
                        <tr class="hover:bg-gray-100">
                            <td class="text-center border-t py-2 px-3">{{ $key + 1 }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $location->name }}</td>
                            <td class="text-center border-t py-2 px-3">
                                <x-secondary-button class="mr-1">
                                    <a href="{{ route('location.show', ['id' => $location->id]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
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
