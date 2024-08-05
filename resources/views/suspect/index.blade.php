@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{url('/suspect/form/'.$id)}}" class="btn btn-outline-primary btn-light">{{__('New_suspect_registration')}}</a>
    </div>
<div class="page-heading mt-5 text-center">
<h3>{{__('Suspect_list')}}</h3>
</div>
@include('massage')
<!--  Inverse table start -->
<section class="section">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                <th>{{__('Name')}}</th>
                <th>{{__('Last_name')}}</th>
                <th>{{__('Father_name')}}</th>
                <th>{{__('ID_number')}}</th>
                <th>{{__('Phone_number')}}</th>
                <th>{{__('Main_address')}}</th>
                <th>{{__('Current_address')}}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($suspects as $suspect)
                <tr>
                    <td>{{$suspect->name}}</td>
                    <td>{{$suspect->last_name}}</td>
                    <td>{{$suspect->father_name}}</td>
                    <td>{{$suspect->tazcira_number}}</td>
                    <td>{{$suspect->phone}}</td>
                    <td>{{$suspect->actual_address}}</td>
                    <td>{{$suspect->current_address}}</td>
                    <th></th>
                    <th><a class="btn btn-sm btn-primary" href="{{url('finger_print_add/'.$suspect->id)}}">{{__('Fingerprint')}}</a>
                        @can('super_admin')
                        <a class="btn btn-info btn-sm" href="{{url('suspect/edit/'.$suspect->id)}}">{{__('Edit')}}</a>
                        <a class="btn btn-danger btn-sm"  type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" href="">{{__('Delete')}}</a></th>
                    @endcan
                </tr>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">{{__('Confirm_delete')}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{__('Delete_description')}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                                <form id="deleteForm" action="{{url('/suspect/delete/'.$suspect->id)}}" method="get" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="id" id="deleteId" value="">
                                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            </tbody>
        </table>
        <div class="page-heading mt-5 text-end">
            <a href="{{route('people')}}" class="btn btn-outline-primary btn-light"> رفتن صفحه افراد  </a>

        </div>
    </div>
    <div class="mt-3">
        <nav aria-label="Page navigation example">
            <div class="mt-3">
                <nav aria-label="Page navigation example">
                    {{$suspects->links()}}
                </nav>
            </div>
        </nav>
    </div>
</section>

@endsection
