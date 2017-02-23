@extends('layouts.home')
@section('content')
    <div class="content">
        <div class="content_resize">
            @yield('plate')
            @include('index.sidebar')
            <div class="clr"></div>
        </div>
    </div>
@endsection

