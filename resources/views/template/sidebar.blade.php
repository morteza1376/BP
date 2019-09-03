<?php
$options = \App\Options\SidebarOptions::getSidebarOptions();
?>
<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

<a class="logo-wrapper waves-effect">
    <img src="{{asset('img/logo.png')}}" class="img-fluid" alt="">
</a>

<div class="list-group list-group-flush">
    @foreach ($options as $option)
        @php
            $name = 'sidebar.' . $option['name'];
            $route = route($option['route']);
            $is_active = '';
            if(request()->is($option['activeString'])) $is_active = 'active';
        @endphp
        <a href="{{ $route }}" class="list-group-item {{ $is_active }} waves-effect">
            <i class="fas fa-{{ $option['icon']}} mr-3"></i> @lang($name)
        </a>
    @endforeach

</div>

</div>
<!-- Sidebar -->