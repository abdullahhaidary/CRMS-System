<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">{{__('Search_records')}}</h2>
                    <form wire:submit.prevent="render">
                        <div class="form-row row">

                            <div class="form-group col-md-5">
                                <label for="searchName">{{__('Search')}}</label>
                                <input type="text" class="form-control" id="searchName" wire:model.lazy="name" placeholder="{{__('Search')}}...">
                            </div>
                        </div>
                    </form>
                    <section class="section">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Last_name')}}</th>
                                    <th>{{__('Father_name')}}</th>
                                    <th>{{__('ID_number')}}</th>
                                    <th>{{__('Phone_number')}}</th>
                                    <th>{{__('Main_address')}}</th>
                                    <th>{{__('Current_address')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suspects as $suspect)
                                    <tr>
                                        <td>{{$suspect->id}}</td>
                                        <td>{{$suspect->name}}</td>
                                        <td>{{$suspect->last_name}}</td>
                                        <td>{{$suspect->father_name}}</td>
                                        <td>{{$suspect->tazcira_number}}</td>
                                        <td>{{$suspect->phone}}</td>
                                        <td>{{$suspect->actual_address}}</td>
                                        <td>{{$suspect->current_address}}</td>
                                        @if($suspect->isCriminal==0)
                                            <td style="color: #ffc604;">مظنون</td>
                                        @elseif($suspect->isCriminal==1)
                                            <td  style="color: #02f602;">فرد عادی</td>
                                        @elseif($suspect->isCriminal==2)
                                            <td  style="color: red;">مجریم</td>
                                        @endif
                                        <th>
                                            @can('super_admin')
                                                <a class="btn btn-info btn-sm" href="{{url('suspect/edit/'.$suspect->id)}}">تصحیح</a>
                                                <a class="btn btn-danger btn-sm" href="{{url('/suspect/delete/'.$suspect->id)}}">حذف</a>
                                        </th>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <div class="mt-4">
                        {{ $suspects->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
