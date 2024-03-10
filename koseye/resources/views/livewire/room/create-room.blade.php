<div>
    <p>Ini adalah halaman Create Room.</p>
    <x-secondary-button 
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'add-room')"
        ><span class="mr-2">+</span>{{ __('Add Room') }}
    </x-secondary-button>
    <x-modal name="add-room" focusable>
        <form wire:submit="store" class="p-6">
                
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add New Room') }}
            </h2>
    
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" class="sr-only" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Name') }}"
                    wire:model="name"
                    required
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <div class="mt-6">
                <select wire:model="status" id="status" class="form-select mt-1 block w-full" name="status" required>
                    <option value="Occupied">Kosong</option>
                    <option value="Available">Terisi</option>
                </select>
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
