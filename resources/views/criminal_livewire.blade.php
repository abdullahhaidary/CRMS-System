@extends('layout.mian-dashbord')
@section('styles')
{{-- <link rel="stylesheet" href="{{asset('dist/css/select2.min.css')}}"> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@livewireStyles()
@endsection



@section('content')
@livewire('criminal-register')
@endsection


@section('scripts')
@livewireScripts()
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script src="{{asset('dist/js/jquery-3.5.1.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/select2.min.js')}}"></script> --}}
@endsection
