@extends('layouts.app')
@section('content')

{{-- @dd($show_details); --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center text-danger mt-5">User Register Details</h2>
            <a href="{{ route('register-show') }}" class="bg-dark p-1 text-light" style="text-decoration: none;border-radius:2px;">
                add User</a>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($show_details))
                @foreach ($show_details as $key=>$item)
                  <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td><img src="{{ asset('uploads/students/'.$item->image) }}" alt="image not store" height="100px"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->degree }}</td>
                    <td>
                        <a href="{{ url('edit-user/'.$item->id) }}">Edit</a>/ 
                        <a href="{{ url('delete-user/'.$item->id) }}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection