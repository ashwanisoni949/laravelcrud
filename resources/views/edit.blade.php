@extends('layouts.app')
@section('content')
    {{-- @dd($find_user); --}}
    <div class="container">
        {{ $find_user->DOB }}
        <div class="row mt-3">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Register</h2>
                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        @if (Session::has('success'))
                            <p class="text-danger">{{ Session::get('success') }}</p>
                        @endif
                        <form action="{{ url('user-update/' . $find_user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3 mt-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Enter The Name" value="{{ $find_user->name }}" />
                            </div>
                            @if ($errors->has('username'))
                                <p class="text-danger">{{ $errors->first('username') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter The Email" value="{{ $find_user->email }}" />
                            </div>
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" name="image" id="image"
                                    placeholder="Enter The Name" />
                                <img src="{{ asset('uploads/students/' . $find_user->image) }}" height="100px"
                                    alt="Image">
                            </div>

                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="dob">DOB</label>
                                <input type="date" class="form-control" name="dob" id="dob"
                                    value="2012-01-12" />
                            </div>
                            @if ($errors->has('dob'))
                                <p class="text-danger">{{ $errors->first('dob') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Highest Degree</label>
                                <select name="degree" id="degree" class="form-control"
                                    value="{{ $find_user->degree }}">

                                    <option value="">--SELECT Degree--</option>
                                    <optgroup label="UG">
                                        <option value="bba" {{ $find_user->degree == 'bba' ? 'selected' : '' }}>BBA</option>
                                        <option value="bms" {{ $find_user->degree == 'bms' ? 'selected' : '' }}>BMS</option>
                                        <option value="bfa" {{$find_user->degree == 'bfa' ? 'selected' : '' }}>BFA</option>
                                        <option value="bbs" {{ $find_user->degree == 'bbs' ? 'selected' : '' }}>BBS</option>
                                        <option value="bsc" {{ $find_user->degree == 'bsc' ? 'selected' : '' }}>B.Sc</option>
                                        <option value="ba" {{ $find_user->degree == 'ba' ? 'selected' : '' }}>BA</option>
                                    </optgroup>
                                    <optgroup label="PG">
                                        <option value="ma" {{ $find_user->degree == 'ma' ? 'selected' : '' }}>M.A</option>
                                        <option value="mcs" {{ $find_user->degree == 'mcs' ? 'selected' : '' }}>M.C.S
                                        </option>
                                        <option value="mcom" {{ $find_user->degree == 'mcom' ? 'selected' : '' }}>M.Com
                                        </option>
                                        <option value="me" {{$find_user->degree == 'me' ? 'selected' : '' }}>M.E</option>
                                    </optgroup>
                                </select>
                            </div>
                            @if ($errors->has('degree'))
                                <p class="text-danger">{{ $errors->first('degree') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter The Password" value="{{ $find_user->password }}" />
                            </div>
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="gender">Gender</label>
                                <input type="radio" name="gender" {{ $find_user->gender == 'Male' ? 'checked' : '' }}
                                    id="gender" class="gender" value="Male">Male
                                <input type="radio" name="gender" {{ $find_user->gender == 'Female' ? 'checked' : '' }}
                                    id="gender" class="gender" value="Female">Female
                            </div>
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
