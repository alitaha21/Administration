@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Display Companies</h4>
        </div>

        <div class="container">
            <ul class="list-group">
                <table class="table table-striper">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td><a href="{{ route('company.show', $company->id) }}">{{ $company->name }}</a></td>
                                <td><a href="{{ route('company.update', $company->id) }}" class="btn btn-primary">Edit</a></td>
                                <td><form action="{{ route('company.delete', $company->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
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