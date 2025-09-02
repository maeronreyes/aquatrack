@extends('layouts.master')

@section('page_title', 'Device Management')

@section('content')

@push('scripts')
    <!-- ✅ DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#usersTable').DataTable({
                "pageLength": 1,
                "lengthMenu": [5, 10, 25, 50],
                "ordering": true,
                "searching": true 
            });
        });
    </script>
@endpush
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">@yield('page_title')</h4>
    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                   <a class="btn btn-primary"href="{{ route('devices.create') }}">CREATE</a>
    <!-- Users DataTable -->
    <div class="card">
     
        <div class="table-responsive text-nowrap">
            <table id="usersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Device Name</th>
                        <th>Serial Number</th>
                        <th>Location</th>
                        <th>Installed Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($devices as $device)
                        <tr>
                            <td><strong>{{ $device->device_name }}</strong></td>
                            <td>{{ $device->serial_number }}</td>
                            <td>{{ $device->location_description }}</td>
                            <td>{{ $device->install_date }}</td>
                            <td>{{ $device->status }}</td>
                            <td>
                                <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('devices.destroy', $device->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>            
</div>
@endsection

