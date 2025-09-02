@extends('layouts.master')

@section('page_title', 'User Management / Edit')

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
                    <form action="{{ route('devices.update', $device->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label for="device_name" class="form-label">Device Name</label>
                            <input
                                type="text"
                                name="device_name"
                                id="device_name"
                                class="form-control @error('device_name') is-invalid @enderror"
                                placeholder="John Doe"
                                value="{{ old('device_name', $device->device_name) }}"
                            >
                            @error('device_name')
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
                                placeholder=""
                                value="{{ old('serial_number', $device->serial_number) }}"
                            >
                            @error('username')
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
                                value="{{ old('location_description', $device->location_description) }}"
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
                                placeholder="johndoe@example.com"
                                value="{{ old('install_date', $device->install_date) }}"
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
