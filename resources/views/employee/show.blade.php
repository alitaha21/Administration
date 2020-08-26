@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('app-text.showDisplay') }}</h4>
        </div>

        <div class="container">
            <ul class="list-group">
                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('app-text.showName') }}</th>
                            <th>{{ __('app-text.showEmail') }}</th>
                            <th>{{ __('app-text.showPhone') }}</th>
                            <th>{{ __('app-text.showCompany') }}</th>
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
                            <td><a href="{{ route('employee.update', $employee->id) }}" class="btn btn-primary">{{ __('app-text.showEdit') }}</a></td>
                            <td><a href="/all" class="btn btn-secondary">{{ __('app-text.showBack') }}</a></td>
                        </tr>
                    </tbody>
                </table>
            </ul>
        </div>       
    </div>
@endsection