@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{route('province_from')}}" class="btn btn-outline-primary btn-light"> ثبت شکایت  </a>
    </div>
    <div class="page-heading text-center">
        <h3>جدول تمام افراد شکایت کننده ها</h3>
        @include('massage')
    </div>
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
                    <th>تاریخ شکایت</th>
                    <th>موضوع شکایت</th>
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
                        <td><a href="{{url('ariza/arizafile/'.$item->id)}}">عریضه</a></td>
                        <td><a href="{{url('province/crime/info/'.$item->id)}}">توضیحات</a></td>
                        <td><a href="{{url('province/suspect_list/'.$item->id)}}">لیست مظنونین</a></td>
                        <td>

                                <a href="{{url('/province/people/edit/'.$item->id)}}"><i class="bi bi-pencil" style="color:#4b4cff;"></i></a>
                                <a href="{{url('/province/people/delete/'.$item->id)}}" class="p-2"><i class="bi bi-trash" style="color: red"></i></a>
                                <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

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
