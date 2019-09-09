@extends('layout')

@section('section',__('bp.index'))
@section('sub_section','/'.__('bp.show'))

@include('admin.bp.cardnav')

@section('content')
    {{-- <h2>{{ $bp->name . " " . $bp->family }}</h2> --}}


    @php
        $sysExp = explainBP($bp->systolic, 's');
        $diaExp = explainBP($bp->diastolic, 'd');
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="row">
                    <div class="card-body col-12 pb-0">
                        <h5 class="card-title float-left"><i class="fas fa-{{ $bp->patient->getGender('en') }} mr-2"></i> {{ $bp->patient->name . " " . $bp->patient->family }}</h5>
                        <div class="float-right">
                            <a href="{{ route('patient.show', $bp->patient->id) }}" class="btn btn-sm btn-info pt-2">مشاهده</a>
                            <a href="{{ route('patient.edit', $bp->patient->id) }}" class="btn btn-sm btn-primary pt-2">ویرایش</a>
                        </div>

                    </div>
                    <div class="card-body col-6">
                        <p class="card-text">کد ملی: <strong>{{ $bp->patient->national_code }}</strong></p>
                        <p class="card-text">شماره تماس: <strong>{{ $bp->patient->phone_number }}</strong></p>
                        <p class="card-text">سن: <strong>{{ $bp->patient->getAge() }} سال</strong></p>
                    </div>
                    <div class="card-body col-6">
                        <p class="card-text">قد: <strong>{{ $bp->patient->height }} سانتی‌متر</strong></p>
                        <p class="card-text">وزن: <strong>{{ $bp->patient->weight }} کیلوگرم</strong></p>
                        <p class="card-text">شاخص توده بدنی: <span class="badge" style="font-size:1.2em;background-color:{{ explainBMI($bp->patient->getBMI())['color'] }}">{{ $bp->patient->getBMI() }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 card" style="width: ;">
                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-heartbeat mr-2"></i> وضعیت فشارخون</h5>
                    <p class="card-text"><i class="fas fa-angle-up mr-2"></i> فشارخون سیستولیک(بالا): 
                        <span title="{{ $sysExp['message'] }}" class="badge" style="color:black !important;font-size:1.2em;background: {{ $sysExp['color'] }}">
                            {{ $bp->systolic}} میلی‌متر جیوه
                        </span>
                    </p>
                    <p class="card-text"><i class="fas fa-angle-down mr-2"></i> فشارخون دیاستولیک (پایین): 
                        <span title="{{ $diaExp['message'] }}" class="badge" style="color:black !important;font-size:1.2em;background: {{ $diaExp['color'] }}">
                            {{ $bp->diastolic}} میلی‌متر جیوه
                        </span>
                    </p>
                    <p class="card-text"><i class="fas fa-calendar-day mr-2"></i> تاریخ ثبت: <strong>{{ $bp->getJalalianDate() }}</strong></p>
                    <a href="#" class="btn btn-sm btn-primary">ویرایش</a>
                    <a href="{{ route('bp.destroy',$bp->id)}}" onclick="return askIfDelete()" class="btn btn-sm btn-danger">حذف</a>
                </div>
            </div>
            <div class="col-md-7 card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-notes-medical mr-2"></i> گزارش فشارخون</h5>
                    <p class="card-text">
                        <strong>
                            {{ getBloodPressureReport($bp->systolic, 's') }}. 
                            {{ getBloodPressureReport($bp->diastolic, 'd') }}.
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function askIfDelete() {
            res = confirm('آیا از حذف این رکور فشارخون اطمینان دارید؟');
            if(res) {
            return true;
            } else {
            return false;
            }
        }
    </script>
@endsection
