<x-app-layout>
    <div x-data="{ page: 'home' }">
        <div class="bg-white p-4">
            <button x-on:click="page = 'home'" class="bg-white text-blue-500 px-4 py-2 rounded-lg mr-2 border-none">Home</button>
            <button x-on:click="page = 'rooms'" class="bg-white text-blue-500 px-4 py-2 rounded-lg mr-2 border-none">Rooms</button>
            <button x-on:click="page = 'setting'" class="bg-white text-blue-500 px-4 py-2 rounded-lg border-none">Setting</button>
        </div>
      
        <div x-show="page === 'home'" class="bg-white p-4">
            <!-- Konten Halaman Home -->
            <livewire:dashboard />
        </div>

        <div x-show="page === 'rooms'" class="bg-white p-4">
            <!-- Konten Halaman Home -->
            <livewire:rooms />
        </div>
      
        <div x-show="page === 'setting'" class="bg-white p-4">
            <!-- Konten Halaman Setting -->
            <livewire:settings />
        </div>
    </div>
    
    
      
</x-app-layout>
