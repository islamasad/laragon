<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-bladewind.table-show
                divider="thin"
                hover_effect="false">
                    <x-slot name="header">
                        <th class="w-1/6">Name</th>
                        <th  class="w-5/6">{{ $item->name }}</th>
                    </x-slot>
                    <tr>                        
                        <td> Price </td>
                        <td> {{ $item->price }} </td>
                    </tr>
                    <tr>                        
                        <td> Quantity </td>
                        <td> {{ $item->quantity }} </td>
                    </tr>
                    <tr>                        
                        <td> Author </td>
                        <td> {{ $authorName }} </td>
                    </tr>
                     
                </x-bladewind.table-show>
            </div>
        </div>
    </div>

</x-app-layout>
