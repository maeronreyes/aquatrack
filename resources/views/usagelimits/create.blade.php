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
                    <form action="{{ route('usagelimits.store') }}" method="POST">
                        @csrf
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


                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Period Type</label>
                        <select name="period_type" id="period_type" class="form-select @error('period_type') is-invalid @enderror">
                              <option value="">Select Period Type</option>
                              <option value="daily">Daily</option>
                              <option value="weekly">Weekly</option>
                              <option value="monthly">Monthly</option>
                            </select>
                            @error('period_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="mb-3">
                        <label for="max_consumption" class="form-label">Max Consumption</label>
                        <input
                            type="number"
                            name="max_consumption"
                            id="max_consumption"
                            class="form-control @error('max_consumption') is-invalid @enderror"
                            placeholder="Max Consumption"
                            value=""
                        >
                        @error('max_consumption')
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
