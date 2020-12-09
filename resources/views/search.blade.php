@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <a class="btn btn-success" href="addStores">Add</a>
        <div><h1>Store List</h1></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Code</td>
                <td>Store Name</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Address</td>
                <td>Manager</td>
                <td>Status</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$store[0]->code}}</td>
                    <td>{{$store[0]->name}}</td>
                    <td>{{$store[0]->phone}}</td>
                    <td>{{$store[0]->email}}</td>
                    <td>{{$store[0]->address}}</td>
                    <td>{{$store[0]->manager}}</td>
                    <td>{{$store[0]->status}}</td>
                    <td><a href="{{ route('stores.edit', $store[0]->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('stores.destroy',$store[0]->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
@endsection
