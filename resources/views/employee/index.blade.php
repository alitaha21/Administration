@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="container">

            <div class="card-body">
                <h4 class="card-title">{{ __('app-text.indexInfo') }}</h4>
            </div>

            <ul class="list-group">
                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('app-text.indexName') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td><a href="{{ route('employee.show', $employee->id) }}">{{ $employee->first_name }} {{ $employee->last_name }}</a></td>
                                <td><a href="{{ route('employee.update', $employee->id) }}" class="btn btn-primary">{{ __('app-text.indexEdit') }}</a></td>
                                <td><form action="{{ route('employee.delete', $employee->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('app-text.indexDelete') }}</button>
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