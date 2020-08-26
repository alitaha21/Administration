@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('app-text.addCompanyHeader') }}</h4>
        </div>

        <div class="container">
            <div class="jumbotron">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>{{ __('app-text.addCompanyInfo') }}</h3>
                        <form action="{{ route('company.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="{{ __('app-text.addCompanyName') }}" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="{{ __('app-text.addCompanyEmail') }}" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="logo">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="url" name="website" placeholder="{{ __('app-text.addCompanyWebsite') }}" value="{{ old('website') }}">
                            </div>
                            <button class="btn btn-primary" type="submit">{{ __('app-text.addCompanyAddCompany') }}</button>
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