@extends('layout.mian-dashbord')
@section('content')
    <div class="container-fluid">
        @foreach($ariza as $item)
        <div class="row">
            <embed src="{{asset('ariza-of-compleint/'. $item->ariza)}}" type="application/pdf" width="100%" height="500px">

        </div>
        @endforeach
    </div>
@endsection
