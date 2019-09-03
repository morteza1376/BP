@extends('layout')

@section('section',__('admin.manage_authors'))
@section('sub_section','/'.__('admin.show_author'))

@include('admin.author.cardnav')

@section('content')
    {{-- <h2>{{ $author->name . " " . $author->family }}</h2> --}}

    <div class="center">
        <div class="card center" style="width: ;">
            {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
            <div class="card-body">
                <h5 class="card-title">{{ $author->name }}</h5>
                <p class="card-text">توضیحات: {{ $author->desc }}</p>
                <p class="card-text">تاریخ عضویت: {{ $author->created_at }}</p>
                <p class="card-text">تاریخ آخرین تغییر: {{ $author->updated_at }}</p>
                <a href="#" class="btn btn-primary">ویرایش</a>
                <a href="{{ route('delete_author',$author->id)}}" onclick="return askIfDelete()" class="btn btn-danger">حذف</a>
            </div>
        </div>
    </div>
    <script>
        function askIfDelete() {
            res = confirm('آیا از حذف این نویسنده اطمینان دارید؟');
            if(res) {
            return true;
            } else {
            return false;
            }
        }
    </script>
@endsection
