<!-- resources/views/themes/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Theme') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-sm-4 mb-3 m-4 md:mt-6 bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('theme.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">Theme Name:</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="route" class="block text-sm font-medium text-gray-600">Route:</label>
                            <input name="route" id="route" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div>
                            <button type="submit" class="inline-block bg-indigo-500 text-white px-4 py-2 rounded-md">Create Theme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
