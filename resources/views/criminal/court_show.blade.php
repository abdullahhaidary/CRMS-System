@extends('layout.mian-dashbord')

@section('content')
<div class="container">
    <h1 class="mb-5">{{ $criminal->name }} {{__('court_process')}}</h1>

    <!-- Check if the last court is marked as the final court -->
    @if($courts->isEmpty() || ($courts->isNotEmpty() && !$courts->last()->final_mahkama))
    <!-- Form to add a new court record -->
   <div class="container-fluid">
       <div class="section">
          <div class="row">
              <form action="{{ route('court.store', $criminal->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label class="form-label" for="ariza_before">{{__('send_to_court_ariza')}}</label>
                      <input type="file" name="ariza_before" class="form-control" id="ariza_before" required>
                  </div>
                  <button type="submit" class="btn btn-primary">{{__('send_to_court')}}</button>
              </form>
          </div>
       </div>
   </div>
@else
    <div class="alert alert-info">
        {{__('final_mahkama_reached')}}
    </div>
@endif


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
                    <p><strong>{{__('date_till_in_jail')}}:</strong> {{ $court->date_till_in_jail }}</p>
                    @if($court->final_mahkama)
                        <p><strong>{{__('final_mahkama')}}:</strong> {{__('yes')}}</p>
                    @endif
                @else
                    <div class="container-fluid">
                        <div class="section">
                            <div class="row">
                                <div class="">
                                    <form action="{{ route('court.update', $court->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="form-label" for="ariza_after">{{__('ariza_after_court')}}</label>
                                            <input type="file" class="form-control" name="ariza_after" id="ariza_after" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="result">{{__('result')}}</label>
                                            <input type="text" class="form-control" name="result" id="result" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="date_till_in_jail">{{__('date_till_in_jail')}}</label>
                                            <input type="date" class="form-control" name="date_till_in_jail" id="date_till_in_jail" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="final_mahkama">{{__('final_mahkama')}}</label>
                                            <input type="checkbox" class="" name="final_mahkama" id="final_mahkama">
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{__('submit_court_result')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
