@extends('layouts.app')

@section('title', 'Payment')

@section('content')

<div class="card mx-auto mt-4 col-11 col-lg-8">
    <button type="button" class="btn btn-light custom-btn m-3 mb-1" style="border: none;" data-bs-toggle="modal" data-bs-target="#createPaymentModal">
        Create
    </button>

    <div class="modal" id="createPaymentModal" tabindex="-1" aria-labelledby="createPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createPaymentModalLabel">Create Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('payment.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3 row">
                            <label for="firstGuest_id" class="col-sm-3 col-form-label">First Guest</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="firstGuest_id" name="firstGuest_id">
                                    <option value="">Select First Guest</option>
                                    @foreach($guests as $guest)
                                        <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
            
                        <div class="input-group mb-3 row">
                            <label for="secondGuest_id" class="col-sm-3 col-form-label">Second Guest</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="secondGuest_id" name="secondGuest_id">
                                    <option value="">Select Second Guest</option>
                                    @foreach($guests as $guest)
                                        <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="input-group mb-3 row">
                            <label for="room_id" class="col-sm-3 col-form-label">Room</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="room_id" name="room_id">
                                    <option value="">Select Room</option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3 row">
                            <label for="paid_date" class="col-sm-3 col-form-label">Payment Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="paid_date" name="paid_date">
                            </div>
                        </div>

                        <div class="input-group mb-3 row">
                            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">Rp</span>
                                    <input type="text" class="form-control" id="amount" name="amount">
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead class="table-group-divider">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Room</th>
                        <th scope="col">Guest</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $payment->room->name }}</td>
                        <td>
                            @if ($payment->firstGuest)
                                {{ $payment->firstGuest->name }}
                            @endif

                            @if ($payment->secondGuest)
                                & {{ $payment->secondGuest->name }}
                            @endif
                        </td>
                        <td>{{ $payment->amount }}</td>
                        <td class="d-flex justify-content-start">
                            <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#deletePaymentModal{{ $loop->index + 1 }}"
                                style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">
                                Delete
                            </button>
                            <div class="modal" id="deletePaymentModal{{ $loop->index + 1 }}" tabindex="-1" aria-labelledby="deletePaymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deletePaymentModalLabel">Delete Payment</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('payment.destroy', $payment->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this payment?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>500</td>
                        <td><button type="button" class="btn"
                                style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>750</td>
                        <td><button type="button" class="btn"
                                style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">Delete</button>
                        </td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>
</div>

@endsection