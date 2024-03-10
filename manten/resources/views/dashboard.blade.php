@extends('layouts.app')

@section('content')

  <div id="fh5co-header" class="fh5co-cover relative" style="background-image: url('{{ asset('images/img_bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container mx-auto">
      <div class="flex flex-col items-center justify-center h-screen">
        <div class="text-center">
          <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight">Joefrey &amp; Sheila</h1>
          <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold">We Are Getting Married</h2>
          <!-- Add your countdown component here -->
          <div class="simply-countdown simply-countdown-one"></div>
          <p><a href="#" class="btn btn-default btn-sm">Save the date</a></p>
        </div>
      </div>
    </div>
  </div>
  
@endsection
    

