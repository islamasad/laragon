<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-rose-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:items-stretch md:grid-cols-3 md:gap-8 mt-4 md:mt-6">
              <a href="{{ route('invitation.create') }}">  
                <div class="bg-white rounded-xl border border-gray-200 hover:border-rose-400 shadow-sm focus:bg-rose-200 active:bg-rose-200">
                  <div class="p-6 sm:px-8">
                    
                    <h2 class="text-lg font-medium text-rose-400  focus:text-white active:text-white">
                      Buat Undangan
                      
                    </h2>
            
                    <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
                </div>
              </a>
              <div class="bg-white divide-y divide-gray-200 rounded-2xl border border-gray-200 shadow-sm">
                <div class="p-6 sm:px-8">
                  <h2 class="text-lg font-medium text-gray-900">
                    Pro
                    <span class="sr-only">Plan</span>
                  </h2>
          
                  <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                              
                </div>
              </div>
            
              <div class="bg-white divide-y divide-gray-200 rounded-2xl border border-gray-200 shadow-sm">
                <div class="p-6 sm:px-8">
                  <h2 class="text-lg font-medium text-gray-900">
                    Enterprise
                    <span class="sr-only">Plan</span>
                  </h2>
          
                  <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          
                  <p class="mt-2 sm:mt-4">
                    <strong class="text-3xl font-bold text-gray-900 sm:text-4xl"> 100$ </strong>
          
                    <span class="text-sm font-medium text-gray-700">/month</span>
                  </p>
          
                  <a
                    class="mt-4 block rounded border border-rose-600 bg-rose-400 px-12 py-3 text-center text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 sm:mt-6"
                    href="#"
                  >
                    Get Started
                  </a>
                </div>
          
                
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
