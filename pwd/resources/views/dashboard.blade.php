<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="grid grid-cols-2 gap-5 border-0">

                    <x-bladewind.card class="border-0 cursor-pointer hover:shadow-gray-300 grid grid-flow-col grid-row-1">
                        <div>
                            <x-bladewind.statistic
                                    currency="Rp"
                                    number="99,500,100"
                                    label="Total Item Value" />
                            <br>
                            <x-bladewind.statistic
                                    currency="Rp"
                                    number="34,500,100"
                                    label="Item Value This Year" />
                            
                        </div>
                        
                    </x-bladewind.card>
                
                    <x-bladewind.card class="border-0 cursor-pointer hover:shadow-gray-300">
                        <x-bladewind.timeline
                            date="18-JUL"
                            label="You signed up"
                            completed="true"
                            stacked="true" />

                        <x-bladewind.timeline
                            date="19-JUL"
                            label="Customer rep assigned"
                            completed="true"
                            stacked="true" />

                        <x-bladewind.timeline
                            date="20-JUL"
                            label="Customer rep called"
                            completed="true"
                            stacked="true" />
                    </x-bladewind.card>
                
                    
                
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
