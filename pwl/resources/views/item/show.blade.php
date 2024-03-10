<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $item->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <x-secondary-button 
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'delete-item')"
                    ><span class="mr-2">+</span>{{ __('Delete Item') }}
                </x-secondary-button>
                <x-modal name="delete-item" focusable>
                    <form method="POST" action="{{ route('item.destroy', ['id' => $item->id]) }}" class="p-6">
                        @csrf
                        @method('delete')
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Delete Item') }}
                        </h2>
                
                        <div class="mt-6">
                            <x-input-label for="name" value="{{ __('Name') }}" class="sr-only" />
                            <x-text-input
                                id="name"
                                name="name"
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="{{ $item->name }}"
                                readonly
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <div class="mt-6">
                            <x-input-label for="quantity" value="{{ __('Quantity') }}" class="sr-only" />
                            <x-text-input
                                id="quantity"
                                name="quantity"
                                type="number"
                                class="mt-1 block w-full"
                                step="0.01"
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
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-modal>
            </div>
            <div class="bg-white shadow-md rounded my-4">
                <table class="w-full">
                    <tbody>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Name</td>
                            <td class="text-left border-t py-2 px-3">{{ $item->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Price</td>
                            <td class="text-left border-t py-2 px-3">{{ $item->price }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Quantity</td>
                            <td class="text-left border-t py-2 px-3">{{ $item->quantity }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Allocated</td>
                            <td class="text-left border-t py-2 px-3">{{ $item->allocated }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Author</td>
                            <td class="text-left border-t py-2 px-3">{{ $authorName }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Created</td>
                            <td class="text-left border-t py-2 px-3">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i, j F Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <br>
            <div class="bg-white shadow-md rounded my-4">
                <table class="w-full">
                    <tbody>
                        @if ($item->locations->isNotEmpty())
                        <tr class="border-b">
                            <th class="text-center py-2 px-3 font-semibold">No</th>
                            <th class="text-center py-2 px-3 font-semibold">Location</th>
                            <th class="text-center py-2 px-3 font-semibold">Quantity</th>
                            <th class="text-center py-2 px-3 font-semibold">Action</th>
                        </tr>
                        @endif
                        @php
                            $no = 1;    
                        @endphp
                        
                        @foreach ($item->locations as $location)
                        @if ($location->pivot->quantity > 0)
                        <tr class="hover:bg-gray-100">
                            <td class="text-center border-t py-2 px-3">{{ $no }}</td>
                            <td class="text-center border-t py-2 px-3">
                                <a href="{{ route('location.show', ['id' => $location->id]) }}" class="font-medium text-blue-600 hover:underline">
                                    {{ $location->name }}</a></td>
                            <td class="text-center border-t py-2 px-3">{{ $location->pivot->quantity }}</td>
                            <td class="text-center border-t py-2 px-3">Open</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @endif
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</x-app-layout>
