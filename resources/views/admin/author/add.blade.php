@extends('layout')
@section('section',__('admin.manage_authors'))
@section('sub_section','/'.__('admin.add_author'))

@include('admin.author.cardnav')
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
    <form action="" method="POST" class="w-100">
        <div class="form-group">
            <label for="name">نام و نام خانوادگی: </label><br>
            <input type="text" class="form-control" required name="name" id="name" placeholder="نام و نام خانوادگی" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="desc">توضیحات: </label>
            <textarea type="text" class="form-control" name="desc" id="desc" placeholder="توضیحات">{{ old('desc') }}</textarea>
        </div>
           
        
        @csrf
        <div class="submit-group">
            <input type="submit" value="ثبت" class="btn btn-success">
        </div>
    </form>
@endsection

