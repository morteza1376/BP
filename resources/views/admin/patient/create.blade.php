@extends('layout')
@section('section',__('patient.index'))
@section('sub_section','/'.__('patient.create'))

@include('admin.patient.cardnav')

@section('error_message')
    @if(count($errors) > 0)
        <div class="error card mb-4 wow red bounceInUp">
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif
@endsection

@section('content')
<form action="{{route('patient.store')}}" method="POST">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-30" for="name">نام : </label>
                    <input type="text" class="form-control" required name="name" id="name" placeholder="نام" value="{{ old('name') }}">
                </div>
            
                <div class="form-group">
                    <label class="label-30" for="family">نام خانوادگی : </label>
                    <input type="text" class="form-control" required name="family" id="family" placeholder="نام خانوادگی" value="{{ old('family') }}">
                </div>
            
                <div class="form-group">
                    <label class="label-30" for="birth_year">سال تولد : </label>
                    <input type="text" class="form-control" required name="birth_year" id="birth_year" placeholder="تاریخ تولد" value="{{ old('birth_year') }}">
                </div>
            
                <div class="form-group">
                    <label class="label-30" for="national_code">کد ملی : </label>
                    <input type="text" class="form-control" required name="national_code" id="national_code" placeholder="کد ملی" value="{{ old('national_code') }}">
                </div>
                <div class="form-group">
                    <label class="label-30" for="gender">جنسیت : </label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input required @php echo (old('gender') === "0") ? 'checked' : '' @endphp type="radio" id="male" value="0" name="gender" class="custom-control-input">
                        <label class="custom-control-label" for="male">مرد</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input required @php echo (old('gender') === "1") ? 'checked' : '' @endphp type="radio" id="female" value="1" name="gender" class="custom-control-input">
                        <label class="custom-control-label" for="female">زن</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-30" for="phone_number">شماره همراه : </label>
                    <input type="text" class="form-control" required name="phone_number" id="phone_number" placeholder="شماره تماس" value="{{ old('phone_number') }}">
                </div>
            
                <div class="form-group">
                    <label class="label-30" for="weight">وزن : </label>
                    <input type="text" class="form-control" name="weight" id="weight" placeholder="وزن" value="{{ old('weight') }}">
                </div>
            
                <div class="form-group">
                    <label class="label-30" for="height">قد : </label>
                    <input type="text" class="form-control" name="height" id="height" placeholder="قد" value="{{ old('height') }}">
                </div>
                <div class="form-group">
                    <label class="label-30" for="smoking-status">وضعیت سیگار : </label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input @php echo (old('is_smoker') === "1") ? 'checked' : '' @endphp type="radio" id="smoking" value="1" name="is_smoker" onclick="return showSmokeField('smoker')" class="custom-control-input">
                        <label class="custom-control-label" for="smoking">سیگاری</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input @php echo (old('is_smoker') === "0") ? 'checked' : '' @endphp type="radio" id="no-smoking" value="0" name="is_smoker" onclick="return showSmokeField('no-smoker')" class="custom-control-input">
                        <label class="custom-control-label" for="no-smoking">عدم مصرف سیگار</label>
                    </div>
                </div>
                <div class="form-group" id="smoking_time" style="display:none">
                    <label class="label-30" for="smoke_time">مدت زمان مصرف : </label>
                    <input type="text" class="form-control" name="smoke_time" id="smoke_time" placeholder="مدت زمان مصرف به سال" value="{{ old('smoke_time') }}">
                </div>
            </div>
        </div>

    </div>
    

    
    @csrf
    <div class="submit-group">
        <input type="submit" value="ثبت" class="btn btn-success">
    </div>
</form>

<script>
    function showSmokeField(checkb) {
        if(checkb == 'smoker') {
            document.getElementById('smoking_time').style.display = 'block';
            document.getElementById('smoking_time').children[1].setAttribute('name','smoke_time');
            document.getElementById('smoking_time').children[1].setAttribute('required','');

        } else if(checkb == 'no-smoker') {
            document.getElementById('smoking_time').style.display = 'none';
            document.getElementById('smoking_time').children[1].value = '';
            document.getElementById('smoking_time').children[1].removeAttribute('name');
            document.getElementById('smoking_time').children[1].removeAttribute('required');

        }

    }
</script>

@endsection
