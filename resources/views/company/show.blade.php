@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Display a Company</h4>
        </div>

        <div class="container">
            <ul class="list-group">
                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td><img src="{{ asset('storage/'.$company->logo) }}" alt="Image not available" width="75"></td>
                            <td>{{ $company->website }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="card-title">Company's employees</h4>

                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($employees as $employee)
                    @if($employee->company_id === $company->id)
                    <tbody>
                        <tr>
                            <td>{{ $employee->user_id }}</td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
                <div class="container">
                    <a href="{{ route('company.update', $company->id) }}" class="btn btn-primary">Edit</a>
                    <a href="/company/all" class="btn btn-secondary">Back</a>
                </div>
            </ul>
        </div>       
    </div>
@endsection