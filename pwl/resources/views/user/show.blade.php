<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <x-secondary-button 
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'delete-user')"
                    ><span class="mr-2">+</span>{{ __('Delete Account') }}
                </x-secondary-button>
                <x-modal name="delete-user" focusable>
                    <form method="POST" action="{{ route('user.destroy', ['id' => $user->id]) }}" class="p-6">
                        @csrf
                        @method('delete')
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Delete Account') }}
                        </h2>
                
                        <div class="mt-6">
                            <h2 class="text-lg font-medium text-gray-900">
                                Are you sure you want to delete <u><strong>{{ $user->name }}</strong></u> account?
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                            </p>
                        </div>
                
                                      
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                
                            <x-primary-button class="ml-3">
                                {{ __('Delete') }}
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
                            <td class="text-left border-t py-2 px-3">{{ $user->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Username</td>
                            <td class="text-left border-t py-2 px-3">{{ $user->username }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Email</td>
                            <td class="text-left border-t py-2 px-3">{{ $user->email }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="text-left py-2 px-3 font-semibold">Authority</td>
                            @if(Auth::user()->isAdmin)
                                <td class="text-left border-t py-2 px-3">Admin</td>
                            @else
                                <td class="text-left border-t py-2 px-3">User</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</x-app-layout>
