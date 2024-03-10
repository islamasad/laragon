<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-secondary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-loc')"
            ><span class="mr-2">+</span>{{ __('Add Location') }}</x-secondary-button>
        </div>        

        <x-modal name="add-loc" focusable>
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
        
        <div class="pb-4 bg-gray-100">
            <form action="/location/index">
                <div class="relative mt-1">
                    <input type="text" id="search" name="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                    <x-primary-button class="ml-3">
                        {{ __('Search') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-bladewind.table
                divider="thin">
                    <x-slot name="header">
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($locations as $key => $location)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $location->name }} </td>
                        <td> 
                            <x-secondary-button class="mr-1">
                                <a href="{{ route('location.show', ['id' => $location->id]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                            </x-secondary-button>
                        </td>
                    </tr>
                    @endforeach 
                </x-bladewind.table>
            </div>
        </div>
    </div>

</x-app-layout>
