@extends('layout')

@section('section',__('patient.index'))
@section('sub_section','/'.__('patient.show'))

@include('admin.patient.cardnav')

{{-- @include('admin.patient.health_bar') --}}

@section('head')
    <link rel="stylesheet" href="{{ asset('/css/Chart.min.css') }}">
    <script src="{{ asset('/js/Chart.min.js') }}"></script>
@endsection

@section('content')
    {{-- <h2>{{ $patient->name . " " . $patient->family }}</h2> --}}



    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: ;">
                    {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                    <div class="row">
                        <div class="card card-body col-4">
                            <h5 class="card-title"><i class="fas fa-{{ $patient->getGender('en') }} mr-2"></i> {{ $patient->name . " " . $patient->family }}</h5>
                            <p class="card-text">کد ملی: <strong>{{ $patient->national_code }}</strong></p>
                            <p class="card-text">شماره تماس: <strong>{{ $patient->phone_number }}</strong></p>
                            <hr>
                            <p class="card-text">سن: <strong>{{ $patient->birth_year }}</strong></p>
                            <p class="card-text">قد: <strong>{{ $patient->height }}</strong></p>
                            <p class="card-text">وزن: <strong>{{ $patient->weight }}</strong></p>
                            <p class="card-text">شاخص توده بدنی: <span class="badge" style="font-size:1.2em;background-color:{{ explainBMI($patient->getBMI())['color'] }}">{{ $patient->getBMI() }}</span></p>
                            <form action="{{ route('patient.destroy',$patient->id)}}" method="POST" class="d-inline ">
                                @csrf
                                @method('delete')
                                <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> ویرایش</a>
                                <button  class="btn btn-sm btn-danger" onclick="return askIfDelete()" type="submit"><i class="fas fa-trash"></i> حذف کاربر</button>
                            </form>
                        </div>
                        <div class="card card-body col-8">
                            <h5 class="card-title"><i class="fas fa-chart-bar mr-2"></i> نمودار فشار خون</h5>
                            <canvas id="bpChart" width="600" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-0 mt-md-0 mt-3">
                <div class="card" style="width: ;">
                    {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                    
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

        var ctx = document.getElementById('bpChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dates) !!},
                datasets: [{
                    label: 'فشار سیستولیک',
                    data: {{ json_encode($systolics) }},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'فشار دیاستولیک',
                    data: {{ json_encode($diastolics) }},
                    backgroundColor: [
                        'rgba(10, 99, 89, 0.2)',
                    ],
                    borderColor: [
                        'rgba(15, 20, 117, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
