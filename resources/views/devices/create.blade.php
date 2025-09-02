@extends('layouts.master')

@section('page_title', 'User Management / Create')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">@yield('page_title')</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    {{-- ✅ Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- ✅ Form --}}
                    <form action="{{ route('devices.store') }}" method="POST">
                        @csrf
                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Device Name</label>
                            <input
                                type="text"
                                name="device_name"
                                id="device_name"
                                class="form-control @error('device_name') is-invalid @enderror"
                                placeholder="Device Name"
                                value=""
                            >
                            @error('device_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID:</label>
                            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                              <option value="">Select User</option>
                              @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                              @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Serial Number</label>
                            <input
                                type="text"
                                name="serial_number"
                                id="serial_number"
                                class="form-control @error('serial_number') is-invalid @enderror"
                                placeholder="Serial Number"
                                value=""
                            >
                            @error('serial_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}  
                        <div class="mb-3">
                            <label for="password" class="form-label">Location Description</label>
                            <input
                                type="text"
                                name="location_description"
                                id="location_description"
                                class="form-control @error('location_description') is-invalid @enderror"
                            >
                            @error('location_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Installed Date</label>
                            <input
                                type="date"
                                name="install_date"
                                id="install_date"
                                class="form-control @error('install_date') is-invalid @enderror"
                                placeholder=""
                                value=""
                            >
                            @error('install_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
