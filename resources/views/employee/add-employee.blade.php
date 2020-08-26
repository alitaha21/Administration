@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('app-text.addAnEmployee') }}</h4>
        </div>

        <div class="container">
            <div class="jumbotron">
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>{{ __('app-text.addAnEmployeePageTitle') }}</h3>
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" placeholder="{{ __('app-text.firstName') }}"
                            value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" placeholder="{{ __('app-text.lastName') }}"
                            value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="{{ __('app-text.email') }}"
                            value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="phone" class="form-control" name="phone" placeholder="{{ __('app-text.phoneNumber') }}"
                            value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <select name="company" id="company">
                                @foreach($companies as $company)
                                <option value="{{ $company->name }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">{{ __('app-text.addAnEmployee') }}</button>
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