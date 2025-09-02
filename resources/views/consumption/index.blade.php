@extends('layouts.master')

@section('page_title', 'Water Consumption')

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
  
    <!-- Users DataTable -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table id="usersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Period Type</th>
                        <th>Period Start</th>
                        <th>Period End</th>
                        <th>Total Consumption</th>
        
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($reports as $report)
                        <tr>
                            <td><strong>{{ $report->user->full_name }}</strong></td>
                            <td>{{ $report->period_type }}</td>
                            <td>{{ $report->period_start }}</td>
                            <td>{{ $report->period_end }}</td>
                            <td>{{ $report->total_consumption }}</td>
       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>            
</div>
@endsection

