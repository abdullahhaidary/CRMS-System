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
                                        <div class="form-group" style="position: relative;">
                                            <label for="search">{{ __('suspect_search') }}</label>
                                            <input type="text" class="form-control" id="search"
                                                placeholder="Search for suspect..." wire:model.live="search"
                                            required>
                                        </div>

                                        @if (!empty($suspects))
                                            <ul class="list-group" id="suspect-list">
                                                @foreach ($suspects as $suspect)
                                                    <li class="list-group-item" wire:click="selectSuspect({{ $suspect['id'] }})">
                                                        {{ $suspect['name'] }} - {{ $suspect['father_name'] }} - {{ $suspect['id'] }}
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
                                                <input type="text" id="first-name-column" class="form-control" placeholder="{{ __('Enter_your_name') }}" wire:model="name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="last-name-column" class="form-label">{{ __('Last_name') }}</label>
                                                <input type="text" id="last-name-column" class="form-control" placeholder="{{ __('Enter_last_name') }}" wire:model="lname" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="city-column" class="form-label">{{ __('Father_name') }}</label>
                                                <input type="text" id="city-column" class="form-control" placeholder="{{ __('Enter_father_name') }}" wire:model="father_name" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="country-floating" class="form-label">{{ __('Phone_number') }}</label>
                                                <input type="number" id="country-floating" class="form-control" wire:model="phone" placeholder="{{ __('Enter_phone_number') }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="company-column" class="form-label">{{ __('Email') }}</label>
                                                <input type="email" id="company-column" class="form-control" wire:model="email" placeholder="{{ __('Enter_email_address') }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email-id-column" class="form-label">{{ __('Current_address') }}</label>
                                                <input type="text" id="email-id-column" class="form-control" wire:model="current_address" placeholder="{{ __('Enter_current_address') }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email-id-column" class="form-label">{{ __('Actual_address') }}</label>
                                                <input type="text" id="email-id-column" class="form-control" wire:model="actual_address" placeholder="{{ __('Enter_actual_address') }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Date_of_birth') }}</label>
                                                <input type="date" id="password-column" class="form-control" wire:model="dateofbirth" placeholder="{{ __('Enter_date_of_birth') }}" required/>
                                            </div>
                                        </div>

                                        @endif
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Gender') }}</label>
                                                <select class="form-control" id="gender" wire:model="gender" required>
                                                    <option value="1">{{ __('Male') }}</option>
                                                    <option value="0">{{ __('Female') }}</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Job') }}</label>
                                                <input type="text" id="password-column" class="form-control" wire:model="job" placeholder="{{ __('Enter_job') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Marital_status') }}</label>
                                                <input type="text" id="password-column" class="form-control" wire:model="marital_status" placeholder="{{ __('Enter_marital_status') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Family_members') }}</label>
                                                <input type="number" id="password-column" class="form-control" wire:model="familymember" placeholder="{{ __('Enter_family_members') }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('Description') }}</label>
                                                <textarea id="password-column" class="form-control" wire:model="discription" placeholder="{{ __('Enter_description') }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password-column" class="form-label">{{ __('arrest_date_label') }}</label>
                                                <input type="date"class="form-control" wire:model="arrest_date" placeholder="{{ __('arrest_date_placeholder') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="photo">{{ __('Photo') }}</label>
                                                <input type="file" id="photo" class="form-control" wire:model="photo" />

                                                @if ($photo)
                                                    <img src="{{ $photo->temporaryUrl() }}" width="100" height="100" />
                                                @endif
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
