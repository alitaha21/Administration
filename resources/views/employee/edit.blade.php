@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update an Employee</h4>
        </div>

        <div class="container">
            <div class="jumbotron">
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>Enter Employee Information:</h3>
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" placeholder="First name"
                            value="{{ $employee->first_name }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" placeholder="Last name"
                            value="{{ $employee->last_name }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email"
                            value="{{ $employee->email }}">
                        </div>
                        <div class="form-group">
                            <input type="phone" class="form-control" name="phone" placeholder="Phone number"
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
                        <button class="btn btn-primary" type="submit">Update employee</button>
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