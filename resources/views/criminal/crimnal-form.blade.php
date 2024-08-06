@extends('layout.mian-dashbord')
@section('styles')
{{-- <link rel="stylesheet" href="{{asset('dist/css/select2.min.css')}}"> --}}
@livewireStyles()
@endsection



@section('content')
@livewire('criminal-register')
@endsection


@section('scripts')
@livewireScripts()
{{-- <script src="{{asset('dist/js/jquery-3.5.1.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/select2.min.js')}}"></script> --}}
@endsection
