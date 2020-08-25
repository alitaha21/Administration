@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('app-text.indexDisplayCompanies') }}</h4>
        </div>

        <div class="container">
            <ul class="list-group">
                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('app-text.indexName') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td><a href="{{ route('company.show', $company->id) }}">{{ $company->name }}</a></td>
                                <td><a href="{{ route('company.update', $company->id) }}" class="btn btn-primary">{{ __('app-text.indexEdit') }}</a></td>
                                <td><form action="{{ route('company.delete', $company->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('app-text.indexDelete') }}</button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
            {{ $companies->links() }}
        </div>       
    </div>
@endsection