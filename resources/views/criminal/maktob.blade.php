@extends('layout.mian-dashbord')
@section('content')

    <div class="container mt-5">
        <h1 class="display-5 mb-4">View PDF Document</h1>
@foreach($data as $item)
        <!-- PDF Embed -->

        <div class="embed-responsive embed-responsive-16by9">
            <embed src="{{asset('storage/criminal/'.$item->	photo)}}"  width="100%" height="600px">
        </div>
        @endforeach
    </div>

@endsection
