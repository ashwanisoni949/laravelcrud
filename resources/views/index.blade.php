@extends('layouts.app')
@section('content')
    <div class="container">
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
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3 mt-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Enter The Name" value="{{ old('username') }}" />
                            </div>
                            @if ($errors->has('username'))
                                <p class="text-danger">{{ $errors->first('username') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter The Email" value="{{ old('email') }}" />
                            </div>
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" name="image" id="image"
                                    placeholder="Enter The Name" value="{{ old('image') }}" />
                            </div>

                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="dob">DOB</label>
                                <input type="date" class="form-control" name="dob" id="dob"
                                    placeholder="Enter The Name" value="{{ old('dob') }}" />
                            </div>
                            @if ($errors->has('dob'))
                                <p class="text-danger">{{ $errors->first('dob') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Highest Degree</label>
                                <select name="degree" id="degree" class="form-control" value="{{ old('email') }}">
                                    <option value="">--SELECT Degree--</option>
                                    <optgroup label="UG">
                                        <option value="bba" {{ old('degree') == 'bba' ? 'selected' : '' }}>BBA</option>
                                        <option value="bms" {{ old('degree') == 'bms' ? 'selected' : '' }}>BMS</option>
                                        <option value="bfa" {{ old('degree') == 'bfa' ? 'selected' : '' }}>BFA</option>
                                        <option value="bbs" {{ old('degree') == 'bbs' ? 'selected' : '' }}>BBS</option>
                                        <option value="bsc" {{ old('degree') == 'bsc' ? 'selected' : '' }}>B.Sc</option>
                                        <option value="ba" {{ old('degree') == 'ba' ? 'selected' : '' }}>BA</option>
                                    </optgroup>
                                    <optgroup label="PG">
                                        <option value="ma" {{ old('degree') == 'ma' ? 'selected' : '' }}>M.A</option>
                                        <option value="mcs" {{ old('degree') == 'mcs' ? 'selected' : '' }}>M.C.S
                                        </option>
                                        <option value="mcom" {{ old('degree') == 'mcom' ? 'selected' : '' }}>M.Com
                                        </option>
                                        <option value="me" {{ old('degree') == 'me' ? 'selected' : '' }}>M.E</option>
                                    </optgroup>
                                </select>
                            </div>
                            @if ($errors->has('degree'))
                                <p class="text-danger">{{ $errors->first('degree') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="name">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter The Password"  value="{{ old('password') }}"/>
                            </div>
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm"
                                    placeholder="Enter The Comfirm Password"  value="{{ old('password_confirm') }}"/>
                            </div>

                            @if ($errors->has('password_confirm'))
                                <p class="text-danger">{{ $errors->first('password_confirm') }}</p>
                            @endif

                            <div class="mb-3 mt-3">
                                <label for="gender">Gender</label>
                                <input type="radio" name="gender" id="gender" class="gender" value="Male" value="{{ old('gender') }}" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                <input type="radio" name="gender" id="gender" class="gender" value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                            </div>
                            <button type="submit" class="btn btn-danger">Submit</button>
                            <a href="{{ route('show_details') }}" class="text-light p-2 bg-dark ms-3" style="text-decoration: none;border-radius:3px;">See User List</a>     
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
