<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->isAdmin)
          
            <div class="">
                <x-secondary-button 
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-user')"
                    ><span class="mr-2">+</span>{{ __('Add User') }}
                </x-secondary-button>
                <x-modal name="add-user" focusable>
                    <form method="POST" action="{{ route('user.store') }}" class="p-6">
                        @csrf
                
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Add New User') }}
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
                            <x-input-label for="username" value="{{ __('Username') }}" class="sr-only" />
                            <x-text-input
                                id="username"
                                name="username"
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="{{ __('Username') }}"
                                required
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="email" value="{{ __('Email') }}" class="sr-only" />
                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                class="mt-1 block w-full"
                                placeholder="{{ __('Email') }}"
                                required
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <select id="isAdmin" class="form-select mt-1 block w-full" name="isAdmin" required>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-1 block w-full"
                                placeholder="{{ __('Password') }}"
                                required
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            placeholder="{{ __('Confirm Password') }}"
                                            name="password_confirmation" required autocomplete="new-password" />
                
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
            @endif
        

            <div class="bg-white shadow-md rounded my-4">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-center py-2 px-3 font-semibold">No</th>
                            <th class="text-center py-2 px-3 font-semibold">Name</th>
                            <th class="text-center py-2 px-3 font-semibold">Username</th>
                            <th class="text-center py-2 px-3 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr class="hover:bg-gray-100">
                            <td class="text-center border-t py-2 px-3">{{ $key + 1 }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $user->name }}</td>
                            <td class="text-center border-t py-2 px-3">{{ $user->username }}</td>
                            <td class="text-center border-t py-2 px-3">
                                <x-secondary-button class="mr-1">
                                    <a href="{{ route('user.show', ['id' => $user->id]) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
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
