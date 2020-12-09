@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <h1>Add Stores Data</h1>
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
            <form method="post" action="{{ route('stores.store') }}">
                <div class="form-group">
                    <label for="cases">Store Code :</label>
                    <input type="number" class="form-control" name="code"/>
                </div>

                <div class="form-group">
                    @csrf
                    <label for="country_name">Store Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="cases">Store Phone :</label>
                    <input type="number" class="form-control" name="phone"/>
                </div>
                <div class="form-group">
                    <label for="cases">Email :</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="cases">Address :</label>
                    <input type="text" class="form-control" name="address"/>
                </div>
                <div class="form-group">
                    <label for="cases">Manager :</label>
                    <input type="text" class="form-control" name="manager"/>
                </div>
                <div class="form-group">
                    <label for="cases">Status :</label>
                    <input type="text" class="form-control" name="status"/>
                </div>




                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
