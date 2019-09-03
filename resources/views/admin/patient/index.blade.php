@extends('layout')
@section('section',__('patient.index'))

@include('admin.patient.cardnav')

@section('content')
    <table class="table table-hover ">
      <!-- Table head -->
      <thead class="blue-grey lighten-4">
        <tr>
          <th>#</th>
          <th>نام و نام خانوادگی</th>
          <th>شماره همراه</th>
          <th>جنسیت</th>
          <th>کد ملی</th>
          <th>وضعیت سلامتی</th>
          <th>عملیات</th>
        </tr>
      </thead>
      <!-- Table head -->
  
      <!-- Table body -->
      <tbody>
        @php $i = 1; @endphp
        @foreach ($patients as $patient)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $patient->name . ' ' . $patient ->family}}</td>
            <td>{{ $patient->phone_number}}</td>
            <td>{{ $patient->getGender('fa') }}</td>
            <td>{{ $patient->national_code}}</td>
            <td>{{ $patient->health_status}}</td>
            <td>
                <a href="{{ route('patient.show',$patient->id) }}" class="btn btn-sm btn-info btn-do text-white"><i class="fas fa-info"></i></a>
                <a href="{{ route('patient.edit',$patient->id)}}" class="btn btn-sm btn-warning btn-do "><i class="fas fa-user-edit"></i></a>
                <form action="{{ route('patient.destroy',$patient->id)}}" method="POST" class="d-inline ">
                  @csrf
                  @method('delete')
                  <button  class="m-0 btn btn-sm btn-danger btn-do text-white" onclick="return askIfDelete()" type="submit"><i class="fas fa-trash"></i></button>
                </form>
            </td>
          </tr>
        @endforeach
  
      </tbody>
      <!-- Table body -->
    </table>
    <div class="row d-flex justify-content-center">
        {{ $patients->links() }}
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