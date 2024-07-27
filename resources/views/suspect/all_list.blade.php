@extends('layout.mian-dashbord')
@section('content')
   <div class="row">
       <div class="page-heading mt-5 text-center">
               <h3>افراد مظنون</h3>
           </div></div>

    @include('massage')
    <!--  Inverse table start -->
    <section class="section">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>نوم</th>
                    <th> تخلص</th>
                    <th> پلار نوم</th>
                    <th>نمبر تذکره</th>
                    <th> شماره تماس</th>
                    <th>آدرس اصلی</th>
                    <th> ادرس فعلی</th>
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
                        <th>
                            @can('super_admin')
                                <a class="btn btn-info btn-sm" href="{{url('suspect/edit/'.$suspect->id)}}">تصحیح</a>
                                <a class="btn btn-danger btn-sm" href="{{url('/suspect/delete/'.$suspect->id)}}">حذف</a></th>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
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
