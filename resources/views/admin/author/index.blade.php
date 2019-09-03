@extends('layout')
@section('section',__('admin.manage_authors'))
@include('admin.author.cardnav')

@section('content')
<table class="table table-hover">
        <!-- Table head -->
        <thead class="blue-grey lighten-4">
          <tr>
            <th>#</th>
            <th>نام و نام خانوادگی</th>
            <th>توضیحات</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <!-- Table head -->
    
        <!-- Table body -->
        <tbody>
          @php $i = 1; @endphp
          @foreach ($authors as $author)
            <tr>
              <th scope="row">{{ $i++ }}</th>
              <td>{{ $author ->name}}</td>
              <td>{{ $author ->desc}}</td>
              <td>
                  <a href="{{ route('show_author',$author->id) }}" class="btn btn-sm btn-info btn-do text-white"><i class="fas fa-info"></i></a>
                  <a href="{{ route('edit_author',$author->id)}}" class="btn btn-sm btn-warning btn-do text-white"><i class="fas fa-user-edit"></i></a>
                  <a href="{{ route('delete_author',$author->id)}}" onclick="return askIfDelete()" class="btn btn-sm btn-danger btn-do text-white"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          @endforeach
    
        </tbody>
        <!-- Table body -->
      </table>
      <script>
        function askIfDelete() {
          res = confirm('آیا از حذف این کاربر اطمینان دارید؟');
          if(res) {
            return true;
          } else {
            return false;
          }
        }
      </script>
@endsection

