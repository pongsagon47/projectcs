@extends('frontend.layouts.main')

@section('title','Kidthuang Bekery')

@section('content')
    @include('frontend.partials.intro')
    <div id="main">
        @include('frontend.partials.welcome')
        @include('frontend.partials.call_action')
        @include('frontend.partials.gallery')
        @include('frontend.partials.more_features')
    </div>

@endsection
