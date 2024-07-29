@extends('layout.mian-dashbord')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-5">لیست تصاویر یک مجرم</h2>
        <div class="row">
            <div class="col-12 d-flex justify-content-end mb-3">
                <a href="" class="btn btn-light-primary" style="width: 90px;">Bake</a>
            </div>
                @foreach($pictures as $picture)
                <div class="col-md-3 my-2">
                    <img src="{{ asset('criminal/' . $picture->path) }}" class="img-fluid rounded" alt="Criminal Image">
                </div>
            @endforeach
        </div>
    </div>
@endsection
