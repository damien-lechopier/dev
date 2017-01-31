@extends('idealcoms/eadmin::layout.admin')

@section('title')

@endsection

@section('css')
    @parent
@endsection

@section('content')
    <div ng-controller="MainController as main">
        <toaster-container toaster-options="{'time-out': 3000, 'close-button':true, 'animation-class': 'toast-top-center'}"></toaster-container>
        <div class="row" ui-view></div>
    </div>
@endsection

@section('sidebar-menu')
    @if( Auth::check() )

    <!-- <li class="header">HEADER</li> -->
    <!-- Optionally, you can add icons to the links -->

    @endif

@endsection


@section('javascripts')
@endsection