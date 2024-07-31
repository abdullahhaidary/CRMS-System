<div>
@if (session()->has('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

    <form wire:submit.prevent="submit">
        @csrf
        @error('name')
        <div style="color:red">{{$message}}</div>
        @enderror
        <input type="text" name="name" placeholder="اسم مکمل" required wire:model="name">

        @error('email')
        <div style="color:red">{{$message}}</div>
        @enderror
        <input type="text" name="email" placeholder="ایمیل" required wire:model="email">

        <input type="hidden" value="3" name="postion">


        <select  class="form-select" wire:model.live="selectedProvince" wire:model="selectedProvince">
            <option class="form-option-list" value="">انتیخاب والسوالی یا حوزه</option>
            @foreach (\App\Models\Province::all() as $district)
                <option class="form-option-list" value="{{ $district->id }}">{{ $district->name }}</option>
            @endforeach
        </select>


        <select class="form-select" name="district" wire:model.live="selectedDistrict" wire:key="{{ $selectedProvince }} wire:model="selectedDistrict">
            <option class="form-option-list" value="">انتیخاب والسوالی یا حوزه</option>
            @foreach($districts as $district)
                <option class="form-option-list" value="{{ $district->id }}">{{ $district->name }}</option>
            @endforeach
        </select>


        <input type="hidden" name="action" value="1">

        @error('password')
        <div style="color:red">{{$message}}</div>
        @enderror
        <input type="password" name="password" placeholder="فاسورد" required wire:model="password">
        <button type="submit">ذخیره</button>
    </form>
</div>
