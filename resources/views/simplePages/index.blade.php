@extends('layouts.app')
@section('title',' - Home')
@section('styles')
<style>
.home-welcome {
    background-image: linear-gradient(45deg, #361752, #B31B67);
    background-image: -webkit-linear-gradient(45deg, #361752, #B31B67);
    background-image: -moz-linear-gradient(45deg, #361752, #B31B67);
    background-image: -ms-linear-gradient(45deg, #361752, #B31B67);
    background-image: -o-linear-gradient(45deg, #361752, #B31B67);
    color: white;
    padding: 10rem;
    font-size: 125%;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    z-index: -1;
}
</style>
@endsection
@section('content')
<div class="home-welcome" style="position:absolute;top0;bottom:0;left:0;right:0;">Welcome page</div>
@endsection

@section('scripts')

@endsection
