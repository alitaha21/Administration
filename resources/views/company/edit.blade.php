@extends('layouts.admin')

@section('content')
    <div class="card">

        <div class="container">
            
            <div class="card-body">
                <h4 class="card-title">{{ __('app-text.updateACompany') }}</h4>
            </div>
            
            <div class="jumbotron">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>{{ __('app-text.editCompanyInfo') }}</h3>
                        <form action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="{{ __('app-text.addCompanyName') }}"
                                value="{{ $company->name }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="{{ __('app-text.addCompanyEmail') }}"
                                value="{{ $company->email }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="logo">
                                <img width="75" src="{{ asset('storage/'.$company->logo) }}" type="image" name="logo">
                            </div>
                            <div class="form-group">
                                <input type="url" class="form-control" name="website" placeholder="{{ __('app-text.addCompanyWebsite') }}"
                                value="{{ $company->website }}">
                            </div>
                            <button class="btn btn-primary" type="submit">{{ __('app-text.updateCompany') }}</button>
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