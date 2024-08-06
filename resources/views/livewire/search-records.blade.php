<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">{{__('Search_records')}}</h2>
                    <form wire:submit.prevent="render">
                        <div class="form-row row">

                            <div class="form-group col-md-5">
                                <label for="searchName">{{__('Name')}}</label>
                                <input type="text" class="form-control" id="searchName" wire:model.live="name" placeholder="{{__('Enter_your_name')}}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchFatherName">{{__('Father_name')}}</label>
                                <input type="text" class="form-control" id="searchFatherName" wire:model.live="father_name" placeholder="{{__('Enter_father_name')}}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-5">
                                <label for="searchLastName">{{__('Last_name')}}</label>
                                <input type="text" class="form-control" id="searchLastName" wire:model.live="last_name" placeholder="{{__('Enter_last_name')}}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchAddress">{{__('Tazkira_number')}}</label>
                                <input type="number" class="form-control" id="searchAddress" wire:model.live="tazkira_number" placeholder="{{__('Enter_address')}}">
                            </div>
                            {{-- <div class="form-group col-md-5">
                                <label for="searchID">{{__('ID')}}</label>
                                <input type="text" class="form-control" id="searchID" wire:model.live="id" placeholder="{{__('Enter_ID')}}">
                            </div> --}}
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-5">
                                <label for="searchPhone">{{__('Phone_number')}}</label>
                                <input type="number" class="form-control" id="searchPhone" wire:model.live="phone" placeholder="{{__('Enter_phone_number')}}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchEmail">{{__('Email')}}</label>
                                <input type="email" class="form-control" id="searchEmail" wire:model.live="email" placeholder="{{__('Enter_email')}}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-5">
                                <label for="searchAddress">{{__('Address')}}</label>
                                <input type="text" class="form-control" id="searchAddress" wire:model.live="address" placeholder="{{__('Enter_address')}}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchDOB">{{__('Date_of_birth')}}</label>
                                <input type="date" class="form-control" id="searchDOB" wire:model.live="dob">
                            </div>
                        </div>
                    </form>


                    <div class="container-fluid">
                        <table class="table mt-4">
                            <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Last_name')}}</th>
                                <th>{{__('Father_name')}}</th>
                                <th>{{__('Phone_number')}}</th>
                                <th>{{__('Main_address')}}</th>
                                <th>{{__('Current_address')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Create_date')}}</th>
                            </tr>
                            </thead>
                            <tbody id="criminal">
                            @if ($criminals->isNotEmpty())
                                @foreach($criminals as $criminal)
                                    <tr>
                                        <td>{{ $criminal->id }}</td>
                                        <td>{{ $criminal->criminal_name }}</td>
                                        <td>{{ $criminal->last_name }}</td>
                                        <td>{{ $criminal->father_name }}</td>
                                        <td>{{ $criminal->phone }}</td>
                                        <td>{{ $criminal->actual_address }}</td>
                                        <td>{{ $criminal->current_address }}</td>
                                        @if($criminal->isCriminal==0)
                                            <td style="color: #ffc604;">مظنون</td>
                                        @elseif($criminal->isCriminal==1)
                                            <td  style="color: #02f602;">فرد عادی</td>
                                        @elseif($criminal->isCriminal==2)
                                            <td  style="color: red;">مجریم</td>
                                        @endif
                                        <td>{{ $criminal->created_at }}</td>
                                    </tr>
                                @endforeach
                            @elseif (!empty($suspects))
                            @foreach($suspects as $suspect)
                                {{$suspect}}
                            @endforeach

                            @else

                            @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        {{ $criminals->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
