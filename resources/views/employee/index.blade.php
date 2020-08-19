@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Here we display employees.</h4>
        </div>

        <div class="container">
            <ul class="list-group">
                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <td>Name</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td><a href="{{ route('employee.show', $employee->id) }}">{{ $employee->first_name }} {{ $employee->last_name }}</a></td>
                                <td><a href="{{ route('employee.update', $employee->id) }}" class="btn btn-primary">Edit</a></td>
                                <td><form action="{{ route('employee.delete', $employee->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
            {{ $employees->links() }}
        </div>       
    </div>
@endsection