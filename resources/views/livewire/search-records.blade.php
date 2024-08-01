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
                                <input type="text" class="form-control" id="searchName" wire:model.lazy="name" placeholder="{{__('Enter_the_name')}}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchFatherName">{{__('Father_name')}}</label>
                                <input type="text" class="form-control" id="searchFatherName" wire:model.lazy="father_name" placeholder="{{__('Enter_father_name')}}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-10">
                                <label for="searchLastName">{{__('Last_name')}}</label>
                                <input type="text" class="form-control" id="searchLastName" wire:model.lazy="last_name" placeholder="{{__('Enter_last_name')}}">
                            </div>
                            {{-- <div class="form-group col-md-5">
                                <label for="searchID">{{__('ID')}}</label>
                                <input type="text" class="form-control" id="searchID" wire:model.lazy="id" placeholder="{{__('Enter_ID')}}">
                            </div> --}}

                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-5">
                                <label for="searchPhone">{{__('Phone_number')}}</label>
                                <input type="text" class="form-control" id="searchPhone" wire:model.lazy="phone" placeholder="{{__('Enter_phone_number')}}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchEmail">{{__('Email')}}</label>
                                <input type="email" class="form-control" id="searchEmail" wire:model.lazy="email" placeholder="{{__('Enter_email')}}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-5">
                                <label for="searchAddress">{{__('Address')}}</label>
                                <input type="text" class="form-control" id="searchAddress" wire:model.lazy="address" placeholder="{{__('Enter_address')}}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchDOB">{{__('Date_of_birth')}}</label>
                                <input type="date" class="form-control" id="searchDOB" wire:model.lazy="dob">
                            </div>
                        </div>
                    </form>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Last_Name')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Actual_Address')}}</th>
                                <th>{{__('Current_Address')}}</th>
                                <th>{{__('Father_Name')}}</th>
                                <th>{{__('Is_Criminal')}}</th>
                                <th>{{__('Created_At')}}</th>
                            </tr>
                        </thead>
                        <tbody id="criminal">
                            @foreach($criminals as $criminal)
                                <tr>
                                    <td>{{ $criminal->id }}</td>
                                    <td>{{ $criminal->criminal_name }}</td>
                                    <td>{{ $criminal->last_name }}</td>
                                    <td>{{ $criminal->phone }}</td>
                                    <td>{{ $criminal->actual_address }}</td>
                                    <td>{{ $criminal->current_address }}</td>
                                    <td>{{ $criminal->father_name }}</td>
                                    <td>{{ $criminal->isCriminal ? 'Yes' : 'No' }}</td>
                                    <td>{{ $criminal->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $criminals->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
