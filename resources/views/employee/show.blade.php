@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Display an Employee</h4>
        </div>

        <div class="container">
            <ul class="list-group">
                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            @foreach($companies as $company)
                                @if($company->id === $employee->company_id)
                                <td>{{ $company->name }}</td>
                                @endif
                            @endforeach
                            <td><a href="{{ route('employee.update', $employee->id) }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="/all" class="btn btn-secondary">Back</a></td>
                        </tr>
                    </tbody>
                </table>
            </ul>
        </div>       
    </div>
@endsection