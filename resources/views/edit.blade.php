@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Game Data
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('stores.update', $store->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="country_name">Store Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $store->name }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Phone :</label>
                    <input type="number" class="form-control" name="phone" value="{{ $store->phone }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Email :</label>
                    <input type="text" class="form-control" name="email" value="{{ $store->email }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Address :</label>
                    <input type="text" class="form-control" name="address" value="{{ $store->address }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Manager :</label>
                    <input type="text" class="form-control" name="manager" value="{{ $store->manager }}"/>
                </div>

                <div class="form-group">
                    <label for="cases">Status :</label>
                    <input type="text" class="form-control" name="status" value="{{ $store->status }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
