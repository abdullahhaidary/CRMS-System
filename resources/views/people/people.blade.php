@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{route('people_form')}}" class="btn btn-outline-primary btn-light"> ثبت شکایت  </a>
{{--        <a href="{{route('people_all')}}" class="btn btn-outline-primary btn-light"> ثبت شواهد  </a>--}}
{{--        <select class="btn btn-outline-primary btn-light ml-5">--}}
{{--            <option>انتقال قضیه به ارګان مربوط</option>--}}
{{--            @foreach($data as $items)--}}
{{--            <a href=""> <option value="{{$items->id}}">{{$items->name. " ". $items->last_name}}</option></a>--}}
{{--            @endforeach--}}
{{--        </select>--}}

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
                    <th>ایمیل</th>
                    <th> شماره تماس</th>
                    <th> نمبر تذکره</th>
                    <th>آدرس</th>
                    <th> ادرس فعلی</th>
                    <th> case</th>
                    <th>موضوع شکایت</th>
                    <th>تاریخ شکایت</th>
                    <th>توسط</th>
                    <th>عریضه</th>
                    <th>توضیحات</th>
                    <th>دیدن مظنونین</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td class="text-bold-500">{{$item->name." ". $item->last_name}}</td>
                        <td>{{$item->father_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->tazkira_number}} </td>
                        <td>{{$item->actual_address}}</td>
                        <td>{{$item->current_address}}</td>
                        <td>{{$item->crime_case}}</td>
                        <td>{{$item->crim_date}}</td>
                        <td>{{$item->subject_crim}}</td>
                        <td>{{$item->Created_by}}</td>
                        <td><a href="{{url('ariza/arizafile/'.$item->id)}}">عریضه</a></td>
                        <td><a href="{{url('crime/info/'.$item->id)}}">توضیحات</a></td>
                        <td><a href="{{url('suspect_list/'.$item->id)}}">لیست مظنونین</a></td>
                        <td>
                            @can('super_admin')
                            <a href="{{url('people/edit/'.$item->id)}}"><i class="bi bi-pencil" style="color:#4b4cff;"></i></a>
                            <a href="{{url('people/delete/'. $item->id)}}" type="button" data-bs-toggle="modal" class="p-2"><i class="bi bi-trash" style="color: red"></i></a>
                             <a href="{{url('people/all/'. $item->id)}}" type="button" class="p-2"><i class="bi bi-chevron-down" style="color: red"></i></a>
                                <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->
                            @endcan
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
