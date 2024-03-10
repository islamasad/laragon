<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-bladewind.table
                divider="thin">
                    <x-slot name="header">
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($users as $key => $user)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->username }} </td>
                        <td> 
                            <x-secondary-button class="mr-1">
                            <a href="" class="font-medium text-blue-600 hover:underline">Detail</a>
                            </x-secondary-button>
                        </td>
                    </tr>
                    @endforeach 
                </x-bladewind.table>
            </div>
        </div>
    </div>

</x-app-layout>
