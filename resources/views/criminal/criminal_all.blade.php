@extends('layout.mian-dashbord')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        .page-heading {
            margin: 20px 0;
            color: #343a40;
        }
        .details-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }
        .details-card img {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .details-label {
            font-weight: bold;
            color: #495057;
        }
        .details-value {
            font-size: 1.1rem;
            color: #212529;
        }
        .details-item {
            margin-bottom: 10px;
        }
        .fingerprint img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            max-width: 100px;
            height: auto;
        }
        .section-title {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #495057;
        }
    </style>
    @if($data)
<div class="container-fluid">
    @foreach($data as $item)
    <div class="text-center ">
        <div class="nav text-right">
            @can('super_admin')
            <a class="link-item mx-2 btn btn-light-info" href="{{url('criminal/edit/'.$item->id)}}">{{__('Edit')}}</a>
            <a class="link-item mx-2 btn btn-light-info" href="{{url('court/'.$item->id)}}">{{__('see_courts')}}</a>
            <a class="link-item mx-2 btn btn-light-info" href="{{url('criminal/edit/'.$item->id)}}">{{__('add_court')}}</a>
            <button type="button" class="link-item btn btn-light-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$item->id}}">{{__('Delete')}}</button>
            @endcan
                <a class="link-item mx-2 btn" href="{{route('crimnal')}}">{{__('View_list')}}</a>
                <a class="link-item btn " href="{{url('criminal/picture/show/'.$item->id)}}">{{__('Pictures_a_criminal')}}</a>
        </div>
        <!-- معلومات مکمل یک مجرم -->
        <h1>{{__('Additional_information_of_a_criminal')}}</h1>
    </div>
    <div class="row ">
        <div class="col-lg-4 col-md-6 mb-4">
            <img src="{{asset('storage/criminal/'.$item->photo)}}" alt="" width="100%" height="300px">
{{--            <image src="{{asset('storage/criminal/'.$item->photo)}}" type="application/pdf" width="100%" height="300px">--}}

            <div class="details-item">
                <span class="">{{__('Name')}}:</span>
                <span class="">{{$item->criminal_name}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Last_name')}}:</span>
                <span>{{$item->last_name}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Father_name')}}:</span>
                <span>{{$item->father_name}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Gender')}}:</span>
                <span>{{$item->gender==1 ?  'male' : 'female'}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Age')}}:</span>
                <span>{{$item->date_of_birth}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Job')}}:</span>
                <span>{{$item->job}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Case_number')}}: </span>
                <span>{{$item->case_number}}</span>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <h4 class="section-title">{{__('Personal_information')}}</h4>

            <div class="details-item">
                <span>{{__('ID')}}:</span>
                <span>{{$item->id}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Email')}}:</span>
                <span>{{$item->email}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Contact_number')}}:</span>
                <span>{{$item->phone}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Main_address')}}:</span>
                <span>{{$item->actual_address}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Current_address')}}:</span>
                <span>{{$item->current_address}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Family_members')}}:</span>
                <span>{{$item->family_members}}</span>
            </div>
            <h4 class="section-title mt-4">{{__('Crime_profile')}}</h4>
            <div class="details-item">
                <span>{{__('Date_of_Registration')}}:</span>
                <span>{{$item->created_at}}</span>
            </div>
            <div class="details-item">
                <span>{{__('History_of_crime')}}:</span>
                <span>{{$item->arrest_date}}</span>
            </div>

            <div class="details-item">
                <span>{{__('Updated_At')}}:</span>
                <span>{{$item->updated_at}}</span>
            </div>
            <div class="details-item">
                <span>{{__('Description')}}:</span>
                <span>{{$item->marital_status}}</span>
            </div>
        </div>
    </div>
    <!-- strat of finger part -->
    <div class="row details-card mt-4">
        <div class="col-lg-12">
            <h4 class="section-title">دست راست</h4>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 1">
                    </div>
                    <div class="text-center details-label">First Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 2">
                    </div>
                    <div class="text-center details-label">Second Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 3">
                    </div>
                    <div class="text-center details-label">Third Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 4">
                    </div>
                    <div class="text-center details-label">Fourth Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 5">
                    </div>
                    <div class="text-center details-label">Fifth Fingerprint</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row  card mt-4">
        <div class="col-lg-12">
            <h4 class="section-title">فینګر دست چپ</h4>
            <div class="row ">
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 1">
                    </div>
                    <div class="text-center details-label">First Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 2">
                    </div>
                    <div class="text-center details-label">Second Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 3">
                    </div>
                    <div class="text-center details-label">Third Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 4">
                    </div>
                    <div class="text-center details-label">Fourth Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 5">
                    </div>
                    <div class="text-center details-label">Fifth Fingerprint</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end fingar part -->
      <!-- start modal  -->

<!-- end modal -->
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
                <form id="deleteForm" action="" method="get" style="display:inline;">
                    @csrf
                    <input type="hidden" name="id" id="deleteId" value="">
                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const form = deleteModal.querySelector('#deleteForm');
            form.action = `{{url('criminal/delete/')}}/${id}`;
            form.querySelector('#deleteId').value = id;
        });
    });
    </script>

    @endforeach
    </div>

    @else
    <div class="text-center">
        <h3>Not Found Data</h3>
    </div>
@endif
@endsection

