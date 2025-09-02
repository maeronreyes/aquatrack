@extends('layouts.master')

@section('page_title', 'User Management / Create')

@section('content')

            <div class="container-xxl flex-grow-1 container-p-y">
           <h4 class="fw-bold py-3 mb-4">@yield('page_title')</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    {{-- <h5 class="card-header">Default</h5> --}}
                    <div class="card-body">
                            @if(session('success'))
                            <div class="text-success">   {{ session('success') }}</div>

                            @endif
                            <form action="{{route('users.store')}}" method="POST">
    @csrf
                      <div>
                        <label for="defaultFormControlInput" class="form-label">Fullname</label>
                        <input
                          type="text"
                          name="full_name"
                          class="form-control"
                          id="defaultFormControlInput"
                          placeholder="John Doe"
                          aria-describedby="defaultFormControlHelp"
                        />
                        @error('full_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div>
                        <label for="defaultFormControlInput" class="form-label">Username</label>
                        <input
                          type="text"
                          name="username"
                          class="form-control"
                          id="defaultFormControlInput"
                          placeholder="John Doe"
                          aria-describedby="defaultFormControlHelp"
                        />
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                       <div>
                        <label for="defaultFormControlInput" class="form-label">Password</label>
                        <input
                          type="text"
                          name="password"
                          class="form-control"
                          id="defaultFormControlInput"
                          placeholder="John Doe"
                          aria-describedby="defaultFormControlHelp"
                        />
                            @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror
                      </div>
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Email</label>
                        <input
                          type="text"
                          name="email"
                          class="form-control"
                          id="defaultFormControlInput"
                          placeholder="John Doe"
                          aria-describedby="defaultFormControlHelp"
                        />
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                      </div>
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