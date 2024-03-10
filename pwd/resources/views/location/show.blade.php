<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 text-3xl font-semibold">
                    <tbody>
                        
                        <tr class="bg-white border-r">
                            <td class="px-6 py-4 w-1 border-r border-gray-200 whitespace-nowrap">
                                <div class="text-xs text-gray-700 uppercase">{{ __('Name') }}</div>
                            </td>
                            <td class="px-6 py-4 border-r border-gray-200 whitespace-nowrap">
                                <div class="font-medium text-gray-900">{{ $location->name }}</div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="px-6 py-4 border-r border-gray-200 whitespace-nowrap">
                                <div class="text-xs text-gray-700 uppercase">{{ __('Author') }}</div>
                            </td>
                            <td class="px-6 py-4 border-r border-gray-200 whitespace-nowrap">
                                {{ $authorName }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
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
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-4 flex justify-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;    
                        @endphp
                        @foreach ($location->items as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $no }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->pivot->quantity }}
                            </th>
                            <td class="px-6 py-4 flex justify-center">
                                <x-secondary-button class="mr-1">
                                    <a href="{{ route('location.show', ['id' => $location->id]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                                </x-secondary-button>
                                
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
