@section('cardnav')
<a href="{{ route('manage_authors') }}" class="btn btn-info waves-effect waves-light">نمایش همه نویسندگان</a>
<a href="{{ route('add_author') }}" class="btn btn-success waves-effect waves-light">ثبت نویسنده جدید</a>
@endsection