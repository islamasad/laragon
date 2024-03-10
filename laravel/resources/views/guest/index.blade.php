@extends('layouts.app')

@section('title', 'Guest')

@section('content')

<div class="card mx-auto mt-4 col-11 col-lg-8">
        
    <button type="button" class="btn btn-light custom-btn m-3 mb-1" style="border: none;" data-bs-toggle="modal" data-bs-target="#createGuestModal">
        Create
    </button>

    <div class="modal" id="createGuestModal" tabindex="-1" aria-labelledby="createGuestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createGuestModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('guest.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3 row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3 row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone">
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
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($guests as $guest)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $guest->name }}</td>
                        <td>{{ $guest->phone }}</td>
                        <td class="d-flex justify-content-start">
                            <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#editGuestModal{{ $loop->index + 1 }}"
                            style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">
                                Edit
                            </button>
                            <div class="modal" id="editGuestModal{{ $loop->index + 1 }}" tabindex="-1" aria-labelledby="editGuestModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editGuestModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form method="POST" action="{{ route('guest.update', $guest->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="input-group mb-3 row">
                                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $guest->name }}">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 row">
                                                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $guest->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                
                                                <button type="submit" class="btn btn-primary">
                                                    Confirm
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteGuestModal{{ $loop->index + 1 }}"
                                style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">
                                Delete
                            </button>
                            <div class="modal" id="deleteGuestModal{{ $loop->index + 1 }}" tabindex="-1" aria-labelledby="deleteGuestModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteGuestModalLabel">Delete Guest</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                            
                                        <form method="POST" action="{{ route('guest.destroy', $guest->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this guest?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
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
                        
                        <td><button type="button" class="btn"
                            style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;"
                            >Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        
                        <td><button type="button" class="btn"
                            style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;"
                            >Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection