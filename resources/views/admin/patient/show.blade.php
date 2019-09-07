@extends('layout')

@section('section',__('patient.index'))
@section('sub_section','/'.__('patient.show'))

@include('admin.patient.cardnav')

@include('admin.patient.health_bar')

@section('content')
    {{-- <h2>{{ $patient->name . " " . $patient->family }}</h2> --}}



    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: ;">
                    {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-{{ $patient->getGender('en') }} mr-2"></i> {{ $patient->name . " " . $patient->family }}</h5>
                        <p class="card-text">کد ملی: <strong>{{ $patient->national_code }}</strong></p>
                        <p class="card-text">شماره تماس: <strong>{{ $patient->phone_number }}</strong></p>
                        <hr>
                        <p class="card-text">سن: <strong>{{ $patient->birth_year }}</strong></p>
                        <p class="card-text">قد: <strong>{{ $patient->height }}</strong></p>
                        <p class="card-text">وزن: <strong>{{ $patient->weight }}</strong></p>
                        <p class="card-text">شاخص توده بدنی: <span class="badge" style="font-size:1.2em;background-color:{{ explainBMI($patient->getBMI())['color'] }}">{{ $patient->getBMI() }}</span></p>
                        <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-sm btn-primary">ویرایش</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-0 mt-md-0 mt-3">
                <div class="card" style="width: ;">
                    {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-chart-bar mr-2"></i> نمودار فشار خون</h5>
                        <p class="card-text">کد ملی: <strong>{{ $patient->national_code }}</strong></p>
                        <p class="card-text">شماره تماس: <strong>{{ $patient->phone_number }}</strong></p>
                        <hr>
                        <p class="card-text">سن: <strong>{{ $patient->birth_year }}</strong></p>
                        <p class="card-text">قد: <strong>{{ $patient->height }}</strong></p>
                        <p class="card-text"><i class="fas fa-weight mr-2"></i> وزن: <strong>{{ $patient->weight }}</strong></p>
                        <p class="card-text">شاخص توده بدنی: <span class="badge" style="font-size:1.2em;background-color:{{ explainBMI($patient->getBMI())['color'] }}">{{ $patient->getBMI() }}</span></p>
                        <a href="#" class="btn btn-primary">ویرایش</a>
                        <a href="{{ route('patient.destroy',$patient->id)}}" onclick="return askIfDelete()" class="btn btn-danger">حذف</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function askIfDelete() {
            res = confirm('آیا از حذف این خدمت گیرنده اطمینان دارید؟');
            if(res) {
            return true;
            } else {
            return false;
            }
        }
    </script>
@endsection
