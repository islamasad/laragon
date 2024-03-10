@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row m-4">
    
    <div class="col-sm-4 mb-3">
        <div class="card border-0" style="cursor: pointer;">
            <div class="card-body" onclick="location.href='{{ route('payment.index') }}';">
                <h5 class="card-title">Payment</h5>
                <p class="card-text">{{ $paymentMessage }}</p>
                
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card border-0" style="cursor: pointer;">
            <div class="card-body" onclick="location.href='{{ route('guest.index') }}';">
                <h5 class="card-title">Guest</h5>
                <p class="card-text">{{ $guestMessage }}</p>
                
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card border-0" style="cursor: pointer;">
            <div class="card-body" onclick="location.href='{{ route('room.index') }}';">
                <h5 class="card-title">Room</h5>
                <p class="card-text">{{ $roomMessage }}</p>
               
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card border-0" style="cursor: pointer;">
            <div class="card-body" onclick="location.href='{{ route('activity.index') }}';">
                <h5 class="card-title">Recent</h5>
                <ul>
                    @foreach($activities as $activity)
                        <li>{{ $activity->description }}</li>
                    @endforeach
                </ul>
                
            </div>
        </div>
    </div>
</div>

@endsection
