@extends('layout.mian-dashbord')

@section('content')
<div class="container">
    <h1>{{ $criminal->name }} - {{__('court_process')}}</h1>

    <!-- Form to add a new court record -->
    <form action="{{ route('court.store', $criminal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ariza_before">{{__('send_to_court_ariza')}}</label>
            <input type="file" name="ariza_before" id="ariza_before" required>
        </div>
        <button type="submit" class="btn btn-primary">{{__('send_to_court')}}</button>
    </form>

    <hr>

    <!-- Display all courts associated with the criminal -->
    @foreach($courts as $court)
        <div class="card mt-3">
            <div class="card-body">
                <h3>{{__('court_result')}} #{{ $loop->iteration }}</h3>
                @if($court->result)
                    <p><strong>{{__('result')}}:</strong> {{ $court->result }}</p>
                    <p><strong>{{__('ariza_before')}}:</strong> <a href="{{ asset('storage/' . $court->ariza_before) }}">{{__('download')}}</a></p>
                    <p><strong>{{__('ariza_after')}}:</strong> <a href="{{ asset('storage/' . $court->ariza_after) }}">{{__('download')}}</a></p>
                @else
                    <form action="{{ route('court.update', $court->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="ariza_after">{{__('ariza_after_court')}}</label>
                            <input type="file" name="ariza_after" id="ariza_after" required>
                        </div>
                        <div class="form-group">
                            <label for="result">{{__('result')}}</label>
                            <input type="text" name="result" id="result" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('submit_court_result')}}</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
