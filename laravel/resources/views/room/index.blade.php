@extends('layouts.app')

@section('title', 'Room')

@section('content')

<div class="card mx-auto mt-4 col-11 col-lg-8">
        
    <button type="button" class="btn btn-light custom-btn m-3 mb-1" style="border: none;" data-bs-toggle="modal" data-bs-target="#createRoomModal">
        Create
    </button>

    <div class="modal" id="createRoomModal" tabindex="-1" aria-labelledby="createRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createRoomModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('room.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3 row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3 row">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">Rp</span>
                                    <input type="text" class="form-control" id="price" name="price" aria-describedby="basic-addon3">
                                </div>
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
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->status == 1 ? 'Occupied' : 'Empty' }}</td>
                        <td class="d-flex justify-content-start">
                            <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#editRoomModal{{ $loop->index + 1 }}"
                            style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">
                                Edit
                            </button>
                            <div class="modal" id="editRoomModal{{ $loop->index + 1 }}" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editRoomModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form method="POST" action="{{ route('room.update', $room->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="input-group mb-3 row">
                                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="{{ $room->name }}" id="name" name="name">
                                                    </div>
                                                </div>
                                                
                                                <div class="input-group mb-3 row">
                                                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon3">Rp</span>
                                                            <input type="text" class="form-control" value="{{ $room->price }}" id="price" name="price" aria-describedby="basic-addon3">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                        
                                                <div class="input-group mb-3 row">
                                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="status" aria-label="Default select example">
                                                            <option value="0" {{ $room->status == 0 ? 'selected' : '' }}>Empty</option>
                                                            <option value="1" {{ $room->status == 1 ? 'selected' : '' }}>Occupied</option>
                                                        </select>
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
                            
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteRoomModal{{ $loop->index + 1 }}"
                                style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">
                                Delete
                            </button>
                            <div class="modal" id="deleteRoomModal{{ $loop->index + 1 }}" tabindex="-1" aria-labelledby="deleteRoomModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteRoomModalLabel">Delete Room</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                            
                                        <form method="POST" action="{{ route('room.destroy', $room->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the room "{{ $room->name }}"?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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