@extends('layouts.admin')

@section('content')
    <div class="card">

        <div class="container">
            <div class="card-body">
                <h4 class="card-title">{{ __('app-text.updateEmployee') }}</h4>
            </div>

            <div class="jumbotron">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>{{ __('app-text.addAnEmployeePageTitle') }}</h3>
                        <form action="{{ route('employee.update', ['lang' => app()->getLocale(), 'employee' => $employee->id]) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="firstname" placeholder="{{ __('app-text.firstName') }}"
                                value="{{ $employee->first_name }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname" placeholder="{{ __('app-text.lastName') }}"
                                value="{{ $employee->last_name }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="{{ __('app-text.lastName') }}"
                                value="{{ $employee->email }}">
                            </div>
                            <div class="form-group">
                                <input type="phone" class="form-control" name="phone" placeholder="{{ __('app-text.phoneNumber') }}"
                                value="{{ $employee->phone }}">
                            </div>
                            <div class="form-group">
                                <select name="company" id="company">
                                    @foreach($companies as $company)
                                        @if($company->id === $employee->company_id)
                                        <option value="{{ $company->name }}" selected>{{ $company->name }}</option>
                                        @else
                                        <option value="{{ $company->name }}">{{ $company->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">{{ __('app-text.updateEmployee') }}</button>
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