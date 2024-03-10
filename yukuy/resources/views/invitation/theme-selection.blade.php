<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Theme Selection') }}
        </h2>
    </x-slot>
    
    <div class="py-2 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:mt-6 sm:flex sm:items-center sm:justify-between">
                          
                <div class="hidden sm:flex sm:gap-4">
                  <div class="hidden relative">
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                      <summary
                        class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600"
                      >
                        <span class="text-sm font-medium"> Availability </span>
          
                        <span class="transition group-open:-rotate-180">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-4 w-4"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                            />
                          </svg>
                        </span>
                      </summary>
          
                      <div
                        class="z-50 group-open:absolute group-open:top-auto group-open:mt-2"
                      >
                        <div class="w-96 rounded border border-gray-200 bg-white">
                          <header class="flex items-center justify-between p-4">
                            <span class="text-sm text-gray-700"> 0 Selected </span>
          
                            <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
                              Reset
                            </button>
                          </header>
          
                          <ul class="space-y-1 border-t border-gray-200 p-4">
                            <li>
                              <label for="FilterInStock" class="inline-flex items-center gap-2">
                                <input
                                  type="checkbox"
                                  id="FilterInStock"
                                  class="h-5 w-5 rounded border-gray-300"
                                />
          
                                <span class="text-sm font-medium text-gray-700"> In Stock (5+) </span>
                              </label>
                            </li>
          
                            <li>
                              <label for="FilterPreOrder" class="inline-flex items-center gap-2">
                                <input
                                  type="checkbox"
                                  id="FilterPreOrder"
                                  class="h-5 w-5 rounded border-gray-300"
                                />
          
                                <span class="text-sm font-medium text-gray-700"> Pre Order (3+) </span>
                              </label>
                            </li>
          
                            <li>
                              <label for="FilterOutOfStock" class="inline-flex items-center gap-2">
                                <input
                                  type="checkbox"
                                  id="FilterOutOfStock"
                                  class="h-5 w-5 rounded border-gray-300"
                                />
          
                                <span class="text-sm font-medium text-gray-700"> Out of Stock (10+) </span>
                              </label>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </details>
                  </div>
          
                  <div class="hidden relative">
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                      <summary
                        class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600"
                      >
                        <span class="text-sm font-medium"> Price </span>
          
                        <span class="transition group-open:-rotate-180">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-4 w-4"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                            />
                          </svg>
                        </span>
                      </summary>
          
                      <div
                        class="z-50 group-open:absolute group-open:top-auto group-open:mt-2"
                      >
                        <div class="w-96 rounded border border-gray-200 bg-white">
                          <header class="flex items-center justify-between p-4">
                            <span class="text-sm text-gray-700"> The highest price is $600 </span>
          
                            <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
                              Reset
                            </button>
                          </header>
          
                          <div class="border-t border-gray-200 p-4">
                            <div class="flex justify-between gap-4">
                              <label for="FilterPriceFrom" class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">$</span>
          
                                <input
                                  type="number"
                                  id="FilterPriceFrom"
                                  placeholder="From"
                                  class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
                                />
                              </label>
          
                              <label for="FilterPriceTo" class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">$</span>
          
                                <input
                                  type="number"
                                  id="FilterPriceTo"
                                  placeholder="To"
                                  class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
                                />
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </details>
                  </div>
                </div>
          
                <div class="sm:block">
                  <label for="SortBy" class="sr-only">SortBy</label>
          
                  <select id="SortBy" class="h-10 rounded border-gray-300 text-sm">
                    <option>Sort By</option>
                    <option value="Title, DESC">Title, DESC</option>
                    <option value="Title, ASC">Title, ASC</option>
                    <option value="Price, DESC">Price, DESC</option>
                    <option value="Price, ASC">Price, ASC</option>
                  </select>
                </div>
            </div>
          
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 flex flex-wrap gap-4 mt-3">
                
                @foreach($themes as $theme)
                <div id="product" class="group relative block overflow-hidden flex-grow">
                    @if($loop->first)
                    <span class="absolute start-2 top-2 z-10 whitespace-nowrap bg-yellow-400 px-3 py-1.5 text-xs font-medium"> New </span>
                    @endif
                    <button class="absolute end-2 top-2 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75">
                        <span class="sr-only">Wishlist</span>
                    
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-4 w-4"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                        </svg>
                    </button>
                        <a href="{{ route('theme.show', ['theme' => $theme]) }}">
                            <img
                            src="https://images.unsplash.com/photo-1599481238640-4c1288750d7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2664&q=80"
                            alt=""
                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72"
                            />
                        </a>
                    <div class="relative border border-gray-100 bg-white p-2">
                        <a href="{{ route('theme.show', ['theme' => $theme]) }}">    
                            <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $theme->name }}</h3>
                        
                            <p class="mt-1.5 text-sm text-gray-700">Rp 10.000</p>
                        </a>
                        <form class="mt-4">
                            <button
                            class="block w-full rounded border-pink-600 bg-pink-400 p-4 text-sm font-medium transition hover:scale-110"
                            >
                            Use Theme
                            </button>
                        </form>
                    </div>
                </div>
              
                @endforeach    
            </div>
    
        </div>
    </div>    
</x-app-layout>
