@extends('layout')
@section('section',__('bp.index'))
@section('sub_section','/'.__('bp.create'))

@include('admin.bp.cardnav')

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
<form action="{{route('bp.update', $bp->id)}}" method="POST">
    @method('PATCH')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="label-30" for="patient">انتخاب خدمت گیرنده : </label>
                    <select class="js-patients" required name="patient_id" id="patient">
                        <option value="0">---- انتخاب خدمت گیرنده -----</option>    
                            @foreach ($patients as $patient)
                                <option {{ ($bp->id == $patient->id) ? 'selected' : '' }} value="{{ $patient->id }}">{{ $patient->name . ' ' . $patient->family }}</option>    
                            @endforeach
                    </select>
                </div>
            
                <div class="form-group">
                    <label class="label-30" for="systolic">فشار سیستولیک (بالا) : </label>
                    <input type="number" class="form-control" style="width:80px;" required name="systolic" id="systolic" value="{{ $bp->systolic }}">
                    <small>واحد فشار میلی متر جیوه می باشد (برای مثال ۱۲٫۵ برابر است با ۱۲۵ میلی متر جیوه)</small>
                </div>
            
                <div class="form-group">
                    <label class="label-30" for="diastolic">فشار دیاستولیک (پایین) : </label>
                    <input type="number" class="form-control" style="width:80px;" required name="diastolic" id="diastolic" value="{{ $bp->diastolic }}">
                    <small>واحد فشار میلی متر جیوه می باشد (برای مثال ۸ برابر است با ۸۰ میلی متر جیوه)</small>

                </div>

                <div class="form-group">
                    <label class="label-30" for="register_date">تاریخ ثبت : </label>
                    <input type="text" class="form-control" required name="register_date" id="register_date" value="{{ $bp->getJalalianDate() }}">
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
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-patients').select2();
    });
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
