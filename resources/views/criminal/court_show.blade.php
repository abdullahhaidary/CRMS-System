@extends('layout.mian-dashbord')

@section('content')
<div class="container">
    <h1>{{ $criminal->name }} - {{__('court_process')}}</h1>

    @if($court && $court->result)
        <div class="card">
            <div class="card-body">
                <h3>Court Result</h3>
                <p><strong>Result:</strong> {{ $court->result }}</p>
                <p><strong>Ariza (Before):</strong> <a href="{{ asset('storage/' . $court->ariza_before) }}">Download</a></p>
                <p><strong>Ariza (After):</strong> <a href="{{ asset('storage/' . $court->ariza_after) }}">Download</a></p>
            </div>
        </div>
    @elseif($court)
        <form action="{{ route('court.update', $court->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ariza_after">Ariza (After Court)</label>
                <input type="file" name="ariza_after" id="ariza_after" required>
            </div>
            <div class="form-group">
                <label for="result">Result</label>
                <input type="text" name="result" id="result" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Court Result</button>
        </form>
    @else
        <form action="{{ route('court.store', $criminal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ariza_before">{{__('send_to_court_ariza')}}</label>
                <input type="file" name="ariza_before" id="ariza_before" required>
            </div>
            <button type="submit" class="btn btn-primary">Send to Court</button>
        </form>
    @endif
</div>
@endsection
