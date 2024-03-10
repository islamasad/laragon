<x-view-layout>
  <div class="grid grid-cols-1 justify-items-stretch">
    <div id="one" class="text-gray-700 text-center bg-black mx-auto min-h-screen w-full relative ">
      <span class="absolute z-10 transform translate-x-1/2 top-1/2">1</span>
      <div class="flex items-center justify-center h-full relative" hx-get="/video" hx-trigger="load">
        <img class="htmx-indicator w-12 h-4" src="{{ asset('storage/three-dots.svg') }}">
        @fragment('video') 
          <video class="object-fill md:object-contain min-w-screen z-1" autoplay loop>
            <source src="{{ asset('storage/video/Pastel Green Pro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        @endfragment
      </div>
    </div>
    <div id="two" class="text-gray-700 text-center bg-white mx-auto min-h-screen w-full relative flex items-center justify-center">
      <span class="absolute z-10 transform translate-x-1/2 top-1/2">2</span>
      <img class="object-cover md:object-contain w-full min-w-screen z-1" src="{{ asset('storage/theme/theme-1/Slide3.jpg') }}">
    </div>
    <div id="three" class="text-gray-700 text-center bg-white mx-auto min-h-screen w-full relative flex items-center justify-center">
      <span class="absolute z-10 transform translate-x-1/2 top-1/2">3</span>
      <img class="object-cover md:object-contain min-w-screen z-1" src="{{ asset('storage/theme/theme-1/Slide4.jpg') }}">
    </div>
  </div>
</x-view-layout>          



