@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{route('people_form')}}" class="btn btn-outline-primary btn-light"> ثبت شکایت  </a>
    </div>

    <div class="page-heading text-center">
        <h3>{{__('list_of_complint_people')}}</h3>
    </div>
    @include('massage')
    <!--  Inverse table start -->
    <section class="section">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>

                <tr class="table-active">
                    <th>#</th>
                    <th>نوم</th>
                    <th> پلار نوم</th>
                    <th> شماره تماس</th>
                    <th> نمبر تذکره</th>
                    <th>آدرس</th>
                    <th> ادرس فعلی</th>
                    <th> case</th>
                    <th>موضوع شکایت</th>
                    <th>تاریخ شکایت</th>
                    <th>توسط</th>
                    <th>معلومات</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td class="text-bold-500">{{$item->name." ". $item->last_name}}</td>
                        <td>{{$item->father_name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->tazkira_number}} </td>
                        <td>{{$item->actual_address}}</td>
                        <td>{{$item->current_address}}</td>
                        <td>{{$item->crime_case}}</td>
                        <td>{{$item->crim_date}}</td>
                        <td>{{$item->subject_crim}}</td>
                        <td>{{$item->Created_by}}</td>
                        <td>
                            <div class="dropdown">
                                <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    معلومات
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item " href="{{url('ariza/arizafile/'.$item->id)}}"><span class="">عریضه</span></a></li>
                                    <li><a class="dropdown-item " href="{{url('crime/info/'.$item->id)}}">توضیحات</a></li>
                                    <li><a class="dropdown-item " href="{{url('suspect_list/'.$item->id)}}">لیست مظنونین</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-light-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item bg-light-info" href="{{url('people/edit/'.$item->id)}}">Edit</a></li>
                                    <li><a class="dropdown-item bg-light-danger" href="{{url('people/delete/'. $item->id)}}">Delete</a></li>
                                    <li><a class="dropdown-item bg-light-success" href="{{url('people/all/'. $item->id)}}">View</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="mymodal">
                        <iframe id="pdfIframe" src="{{asset('ariza-of-compleint/'. $item->ariza)}}" style="width: 100%" frameborder="0"></iframe>
                    </div>

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
                                    <form id="deleteForm" action="{{url('/people/delete/'.$item->id)}}" method="get" style="display:inline;">
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

        </div>
    </section>
    <body>
    </body>

    <!--  Inverse table end -->
    <div class="mt-3">
        <nav aria-label="Page navigation example">
            <div class="mt-3">
                <nav aria-label="Page navigation example">
                    {{$data->links()}}
                </nav>
            </div>
        </nav>
    </div>

@endsection

@push('scripts')

@endpush
@section('scripts')
    <script>
        var deleteUrl = '';

        function showDeleteModal(url) {
            deleteUrl = url; // Store the URL for deletion
            var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            myModal.show(); // Show the modal
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            if (deleteUrl) {
                window.location.href = deleteUrl; // Redirect to the delete route
            }
        });
    </script>

@endsection
