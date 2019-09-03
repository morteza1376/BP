@section('cardnav')
<a href="{{ route('patient.index') }}" class="btn btn-info waves-effect waves-light">@lang('patient.index')</a>
<a href="{{ route('patient.create') }}" class="btn btn-success waves-effect waves-light">@lang('patient.create')</a>
@endsection