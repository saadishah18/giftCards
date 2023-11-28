@extends('layouts.master')
@section('content')
    <style>
        .input-group {
            margin-bottom: 20px;
        }
    </style>
    <div class="content-wrapper flex bg-user-color">
        <div class="row flex-grow">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Category</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Option 1</a></li>
                                <li><a class="dropdown-item" href="#">Option 2</a></li>
                                <li><a class="dropdown-item" href="#">Option 3</a></li>
                            </ul>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Location</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">City 1</a></li>
                                <li><a class="dropdown-item" href="#">City 2</a></li>
                                <li><a class="dropdown-item" href="#">City 3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
