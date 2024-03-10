<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold mb-4">Timeline</h2>
            
                <div class="space-y-4">
                    <!-- Event 1 -->
                    @foreach($timelineData as $data)
                    @if ($data instanceof \App\Models\Item)
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                <span class="text-xl font-bold">1</span>
                            </div>
                        </div>
                        <div>
                            <span class="text-lg">Item: {{ $data->author->name }} added {{ $data->name }}</span>
                            <span class="text-sm">{{ $data->created_at->format('H:i, j F Y') }}</span>
                        </div>
                    </div>
            
                    <!-- Event 2 -->
                    @elseif ($data instanceof \App\Models\Location)
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                <span class="text-xl font-bold">2</span>
                            </div>
                        </div>
                        <div>
                            <span class="text-lg">Location: {{ $data->author->name }} added {{ $data->name }}</span>
                            <span class="text-sm">{{ $data->created_at->format('H:i, j F Y') }}</span>
                        </div>
                    </div>
            
                    <!-- Event 3 -->
                    @elseif ($data instanceof \App\Models\Allocation)
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                <span class="text-xl font-bold">3</span>
                            </div>
                        </div>
                        <div>
                            <span class="text-lg">Allocation: {{ $data->author->name }} allocated {{ $data->item->name }} to {{ $data->location->name }}</span>
                            <span class="text-sm">{{ $data->created_at->format('H:i, j F Y') }}</span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                    
                </div>
            </div>
            
        </div>
    </div>
    
</x-app-layout>
