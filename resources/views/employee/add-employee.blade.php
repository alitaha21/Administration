@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add an Employee</h4>
        </div>

        <div class="container">
            <div class="jumbotron">
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>Enter Employee Information:</h3>
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" placeholder="First name"
                            value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" placeholder="Last name"
                            value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email"
                            value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="phone" class="form-control" name="phone" placeholder="Phone number"
                            value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <select name="company" id="company">
                                @foreach($companies as $company)
                                <option value="{{ $company->name }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Add Employee</button>
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