@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create a Company</h4>
        </div>

        <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <h3>Add Company Logo:</h3>
                <form action="/form" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="text" name="name">
                    <input type="file" name="profile_picture">
                    <input type="submit">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        </div>
    </div>
@endsection