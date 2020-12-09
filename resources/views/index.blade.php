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
            </div><br/>
        @endif
            <a class="btn btn-success" href="addStores">Add</a>
            <form action="{{route('stores.search')}}" method="post">
                @csrf
                <input class="form-control" type="search" name="search">
                <button type="submit" class="btn-primary">Search</button>
            </form>
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
            @foreach($stores as $store)
                <tr>
                    <td>{{$store->code}}</td>
                    <td>{{$store->name}}</td>
                    <td>{{$store->phone}}</td>
                    <td>{{$store->email}}</td>
                    <td>{{$store->address}}</td>
                    <td>{{$store->manager}}</td>
                    <td>{{$store->status}}</td>
                    <td><a href="{{ route('stores.edit', $store->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('stores.destroy',$store->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
