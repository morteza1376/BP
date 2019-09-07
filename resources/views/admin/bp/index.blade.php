@extends('layout')
@section('section',__('bp.index'))

@include('admin.bp.cardnav')

@section('content')
    <table class="table table-hover ">
      <!-- Table head -->
      <thead class="blue-grey lighten-4">
        <tr>
          <th>#</th>
          <th>نام و نام خانوادگی</th>
          <th>فشار سیستولیک</th>
          <th>فشار دیاستولیک</th>
          <th>تاریخ ثبت</th>
          <th>عملیات</th>
        </tr>
      </thead>
      <!-- Table head -->
  
      <!-- Table body -->
      <tbody>
        @php $i = 1; @endphp
        @foreach ($bps as $bp)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>
              <a href="{{ $bp->patient->getShowRoute() }}">
                <i class="fa fa-link"></i>
                {{ $bp->patient->name . ' ' . $bp ->patient->family}}
              </a>
            </td>
            <td>
              @php
                  $sysExp = explainBP($bp->systolic, 's');
                  $diaExp = explainBP($bp->diastolic, 'd');
              @endphp
              <span title="{{ $sysExp['message'] }}" class="badge" style="color:black !important;font-size:1.2em;background: {{ $sysExp['color'] }}">
                  {{ $bp->systolic}}
              </span>
            </td>
            <td>
              <span title="{{ $diaExp['message'] }}" class="badge" style="color:black !important;font-size:1.2em;background: {{ $diaExp['color'] }}">
                  {{ $bp->diastolic}}
              </span>
            </td>
            <td>{{ $bp->getJalalianDate()}}</td>
            <td>
                <a href="{{ route('bp.show',$bp->id) }}" class="btn btn-sm btn-info btn-do text-white"><i class="fas fa-info"></i></a>
                <a href="{{ route('bp.edit',$bp->id)}}" class="btn btn-sm btn-warning btn-do "><i class="fas fa-user-edit"></i></a>
                <form action="{{ route('bp.destroy',$bp->id)}}" method="POST" class="d-inline ">
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
        {{ $bps->links() }}
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