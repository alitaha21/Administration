@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update a Company</h4>
        </div>

        <div class="container">
            <div class="jumbotron">
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>Enter Company Information:</h3>
                    <form action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Company name"
                            value="{{ $company->name }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email"
                            value="{{ $company->email }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="logo">
                            <img width="75" src="{{ asset('storage/'.$company->logo) }}" type="image" name="logo">
                        </div>
                        <div class="form-group">
                            <input type="url" class="form-control" name="website" placeholder="Website"
                            value="{{ $company->website }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Update Company</button>
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