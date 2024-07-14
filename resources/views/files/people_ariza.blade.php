@extends('layout.mian-dashbord')
@section('content')
    <div class="container-fluid">
        @foreach($ariza as $item)
        <div class="row">
            <img src="{{asset('ariza-of-compleint/'. $item->ariza)}}" width="150px" height="200px" alt="">
        </div>
        @endforeach
    </div>
@endsection
