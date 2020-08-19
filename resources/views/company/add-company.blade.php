@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create a Company</h4>
        </div>

        <div class="container">
            <div class="jumbotron">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>Enter Company Information:</h3>
                        <form action="{{ route('company.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Company name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="logo">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="url" name="website" placeholder="Website" value="{{ old('website') }}">
                            </div>
                            <button class="btn btn-primary" type="submit">Add Company</button>
                        </form>
                    </li>
                    <li class="list-group-item">
                        @if ($errors->any())
                            <ul id="errors">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection