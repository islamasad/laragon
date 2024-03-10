<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-rose-500 leading-tight">
            {{ __('Theme') }}
        </h2>
    </x-slot>
    
    <div class="py-2 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="col-sm-4 mb-3">
                <div class="card border-0 bg-white rounded-lg">
                    <div class="card-body pe-3 md:p-4">
                        <div class="overflow-x-auto overflow-y" style="max-height: 75vh;">
                            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                              <thead>
                                <tr>
                                  <th class="w-2/12 px-4 py-2 font-medium text-gray-900 text-left">No</th>
                                  <th class="w-8/12 px-4 py-2 font-medium text-gray-900 text-left">Name</th>
                                  <th class="w-2/12 px-4 py-2"></th>
                                </tr>
                              </thead>
                          
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($themes as $theme)
                                    <tr class="hover:bg-gray-100">
                                        <td class="w-2/12 px-4 py-2 font-medium text-gray-900">{{ $loop->index + 1 }}</td>
                                        <td class="w-7/12 px-4 py-2 text-gray-700">{{ $theme->name }}</td>
                                        <td class="w-2/12 px-1 py-2 md:flex">
                                            <x-button class="bg-white-100 text-rose-700 hover:border-rose-500 focus:bg-rose-100 active:bg-rose-200 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <a href="{{ route('theme.show', ['theme' => $theme]) }}">{{ __('View') }}
                                                </a>
                                            </x-button>
                                            
                                            <x-danger-button class="md:ms-3"
                                                x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-{{ $loop->index + 1 }}')"
                                            >{{ __('Delete') }}</x-danger-button>
                                            <x-modal name="confirm-delete-{{ $loop->index + 1 }}" focusable>
                                                <form method="post" action="{{ route('theme.destroy', ['theme' => $theme]) }}" class="p-6">
                                                    @csrf
                                                    @method('delete')
                                        
                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Are you sure you want to delete?') }}
                                                    </h2>
                                                                                                                            
                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>
                                        
                                                        <x-danger-button class="ms-3"
                                                        hx-delete="{{ route('theme.destroy', ['theme' => $theme]) }}"
                                                        hx-target="closest tr"
                                                        hx-swap="outerHTML swap:1s">
                                                            {{ __('Delete') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @if(count($themes) === 0)
                                        <tr>
                                            <td class="w-full px-4 py-2 text-gray-700 text-center" colspan="3">Tidak ada data yang ditemukan.</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 md:mt-6">
                <x-card
                    width="w-3/6 md:w-1/6"
                    url="{{ route('theme.create') }}"
                    title="Create Theme"
                    content=""
                />
            </div>
        </div>
    </div>
</x-app-layout>
