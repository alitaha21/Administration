@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="card">
        
        <div class="container">
            <div class="card-body">
                <h4 class="card-title">{{ __('app-text.indexDisplayCompanies') }}</h4>
            </div>

                <table id="datatable" class="table">
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
            {{ $companies->links() }}
        </div>       
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection