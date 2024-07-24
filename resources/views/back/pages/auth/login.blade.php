@extends('back.layout.auth-layout')
@section('pageTitle',isset($pageTitle)?$pageTilte:'Login')
@section('content')

<div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="./back/static/logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
           @livewire('author-login-form')
          </div>
         
        </div>
        <div class="text-center text-secondary mt-3">
          Don't have account yet? <a href="{{route('author.signin')}}" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>

@endsection