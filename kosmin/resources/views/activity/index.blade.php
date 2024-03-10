@extends('layouts.app')

@section('title', 'Activity')

@section('content')

<div class="card mx-auto mt-4 col-11 col-lg-8">
    <br>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead class="table-group-divider">
                    <tr>
                        <th class="timestamp" scope="col">Timestamp</th>
                        <th class="description" scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                        <td class="timestamp">{{ $activity->created_at }}</td>
                        <td class="description">{{ $activity->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Tombol navigasi halaman berikutnya dan sebelumnya -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item {{ $activities->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $activities->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              
              <li class="page-item {{ $activities->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $activities->nextPageUrl() }}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
    </div>
</div>

<style>
    .table th.timestamp,
    .table td.timestamp {
        max-width: 150px; /* Atur lebar maksimum untuk kolom "timestamp" */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .table th.description,
    .table td.description {
        max-width: 300px; /* Atur lebar maksimum untuk kolom "description" */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

@endsection
