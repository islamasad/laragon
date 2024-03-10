@extends('layouts.app')

@section('title', 'User')

@section('content')

<div class="card mx-auto mt-4 col-11 col-lg-8">
        
    <button type="button" class="btn btn-light custom-btn m-3 mb-1" style="border: none;" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Create
    </button>

    <div class="modal" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createUserModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3 row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="input-group mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="input-group mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="input-group mb-3 row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="input-group mb-3 row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password">
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
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="d-flex justify-content-start">
                            <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $loop->index + 1 }}"
                            style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">
                                Edit
                            </button>
                            <div class="modal" id="editUserModal{{ $loop->index + 1 }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editUserModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="input-group mb-3 row">
                                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 row">
                                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 row">
                                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 row">
                                                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
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
                            
                            <button type="button" class="btn"
                            style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><button type="button" class="btn"
                            style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .25rem;"
                            >Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
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