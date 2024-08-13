<div>
    <div class="page-heading text-center">
        <h3>{{ __('New_criminal_creation_form') }}</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form wire:submit.prevent="submit" enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf()
                                <div class="row">
                                    <div class="form-group">
                                        <label for="isSuspectAvailable">{{ __('is_suspect_available') }}</label>
                                        <select class="form-control" id="isSuspectAvailable" wire:model.live="isSuspectAvailable" required>
                                            <option value="0">نه</option>
                                            <option value="1">هو</option>
                                        </select>
                                    </div>
                                    @if ($isSuspectAvailable)
                                        <div class="form-group">
                                            <label for="search">{{ __('suspect_search') }}</label>
                                            <input type="text" class="form-control" id="search"
                                                placeholder="{{__('Search_for_suspect')}}" wire:model.live="search"
                                            required>
                                        </div>

                                        @if (!empty($suspects))
                                            <ul class="list-group" id="suspect-list">
                                                @foreach ($suspects as $suspect)
                                                    <li class="list-group-item" wire:click="selectSuspect({{ $suspect['id'] }})">
                                                        {{ $suspect['name'] }} - {{ $suspect['last_name'] }}- {{ $suspect['father_name'] }} - {{ $suspect['id'] }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        <div class="form-group">
                                            <input hidden type="text" class="form-control" id="selected-suspect" wire:model="selectedSuspect" readonly required>
                                        </div>

                                        <style>
                                            #suspect-list {
                                                position: absolute;
                                                z-index: 1000;
                                                width: 100%;
                                                background: white;
                                                border: 1px solid #ddd;
                                                max-height: 200px;
                                                overflow-y: auto;
                                            }

                                            #suspect-list .list-group-item {
                                                cursor: pointer;
                                            }

                                            #suspect-list .list-group-item:hover {
                                                background-color: #f1f1f1;
                                            }
                                        </style>
                                    @else
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="first-name-column" class="form-label">{{ __('Name') }}</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                       placeholder="{{ __('Enter_your_name') }}" wire:model="name" />
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="last-name-column" class="form-label">{{ __('Last_name') }}</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="{{ __('Enter_last_name') }}" wire:model="lname" />
                                                @error('lname')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="city-column" class="form-label">{{ __('Father_name') }}</label>
                                                <input type="text" id="city-column" class="form-control"
                                                       placeholder="{{ __('Enter_father_name') }}" wire:model="father_name"/>
                                                @error('father_name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="country-floating" class="form-label">{{ __('Phone_number') }}</label>
                                                <input type="number" id="country-floating" class="form-control" wire:model="phone"
                                                       placeholder="{{ __('Enter_phone_number') }}" />
                                                @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="company-column" class="form-label">{{ __('Email') }}</label>
                                                <input type="email" id="company-column" class="form-control" wire:model="email"
                                                       placeholder="{{ __('Enter_email_address') }}"
                                                />
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email-id-column" class="form-label">{{ __('Current_address') }}</label>
                                                <input type="text" id="email-id-column" class="form-control" wire:model="current_address"
                                                       placeholder="{{ __('Enter_current_address') }}" />
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email-id-column" class="form-label">{{ __('Main_address') }}</label>
                                                <input type="text" id="email-id-column" class="form-control" wire:model="actual_address"
                                                       placeholder="{{ __('Enter_main_address') }}" />
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Date_of_birth') }}</label>
                                                <input type="date" id="password-column" class="form-control" wire:model="dateofbirth"
                                                       placeholder="{{ __('Enter_date_of_birth') }}" />
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Gender') }}</label>
                                                <select class="form-control" id="gender" wire:model="gender" >
                                                    <option value="1">{{ __('Male') }}</option>
                                                    <option value="0">{{ __('Female') }}</option>
                                                </select>
                                                @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Job') }}</label>
                                                <input type="text" id="password-column" class="form-control" wire:model="job"
                                                       placeholder="{{ __('Enter_job') }}" />
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Marital_status') }}</label>
{{--                                                <input type="text" id="password-column" class="form-control" wire:model="marital_status"--}}
{{--                                                       placeholder="{{ __('Enter_marital_status') }}" />--}}
                                                <select class="form-control" id="gender" wire:model="marital_status" >
                                                    <option value="مجرد">مجرد</option>
                                                    <option value="متاهل">متاهل</option>
                                                </select>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Family_members') }}</label>
                                                <input type="number" id="password-column" class="form-control" wire:model="familymember"
                                                       placeholder="{{ __('Enter_family_members') }}" required/>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('arrest_date_label') }}</label>
                                                <input type="date" class="form-control" wire:model="arrest_date"
                                                       placeholder="{{ __('arrest_date_placeholder') }}" />
                                                @error('arrest_date')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="password-column" class="form-label">{{ __('Case') }}</label>
                                            <input type="text" id="case" class="form-control"
                                                   placeholder="{{ __('Search_case') }}" wire:model.live="casee" required/>
                                            @if (!empty($cases))
                                                <ul class="list-group" id="suspect-list">
                                                    @foreach ($cases as $case)
                                                        <li class="list-group-item" wire:click="selectCase({{ $case['id'] }})">
                                                            {{ $case['case_number'] }} - {{ $case['status'] }}- {{ $case['crime_type'] }} - {{ $case['id'] }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            @error('arrest_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="photo">{{ __('Maktob') }}</label>
                                                <input type="file" id="photo" class="form-control" wire:model="photo" required/>
                                                @error('photo')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="photo">{{ __('Picture') }}</label>
                                            <input type="file" id="picture" class="form-control" wire:model="picture" required/>
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="password-column" class="form-label">{{ __('Description') }}</label>
                                            <textarea id="password-column" class="form-control" wire:model="discription"
                                                      placeholder="{{ __('Enter_description') }}"></textarea>
                                            @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">{{ __('Save') }}</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">{{ __('Reset') }}</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
