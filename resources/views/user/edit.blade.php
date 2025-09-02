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
                    <form action="{{ route('users.update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Fullname</label>
                            <input
                                type="text"
                                name="full_name"
                                id="full_name"
                                class="form-control @error('full_name') is-invalid @enderror"
                                placeholder="John Doe"
                                value="{{ old('full_name', $users->full_name) }}"
                            >
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="johndoe123"
                                value="{{ old('username', $users->username) }}"
                            >
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                value="{{ old('password', $users->password) }}"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="********"
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="johndoe@example.com"
                                value="{{ old('email', $users->email) }}"
                            >
                            @error('email')
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
