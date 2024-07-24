@extends('back.layout.auth-layout')
@section('pageTitle',isset($pageTitle)?$pageTilte:'Sign in')
@section('content')

<div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="./back/static/logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </div>
       @livewire('author-signin-form')
            
        <div class="text-center text-secondary mt-3">
          Already have account? <a href="{{route('author.login')}}" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>

@endsection
 