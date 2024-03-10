<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $location->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded my-4">
                <table class="w-full">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left py-2 px-3 font-semibold">Name</td>
                            <th class="text-left border-t py-2 px-3">{{ $location->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Description</td>
                            <td class="text-left border-t py-2 px-3">{{ $location->description }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Author</td>
                            <td class="text-left border-t py-2 px-3">{{ $authorName }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Created</td>
                            <td class="text-left border-t py-2 px-3">{{ \Carbon\Carbon::parse($location->created_at)->format('H:i, j F Y') }}</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="bg-white shadow-md rounded my-4">
                <table class="w-full">
                    <tbody>
                        @if ($location->items->isNotEmpty())
                        <tr class="border-b">
                            <th class="text-center py-2 px-3 font-semibold w-1/6">No</th>
                            <th class="text-center py-2 px-3 font-semibold w-2/6">Item</th>
                            <th class="text-center py-2 px-3 font-semibold w-2/6">Quantity</th>
                            
                        </tr>
                        @endif
                        @php
                            $no = 1;    
                        @endphp
                        @foreach ($location->items as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="text-center border-t py-2 px-3">{{ $no }}</td>
                            <td class="text-center border-t py-2 px-3">
                                <a href="{{ route('item.show', ['id' => $item->id]) }}" class="font-medium text-blue-600 hover:underline">
                                    {{ $item->name }}</a></td>
                            <td class="text-center border-t py-2 px-3">{{ $item->pivot->quantity }}</td>
                            
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
