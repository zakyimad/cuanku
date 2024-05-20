@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Login -->
      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
            <img src="/assets/img/icon.png" style="width: 80%;" alt="Icon">
        </div>
        <!-- /Logo -->

        <div class="card-body mt-2 justify-content-center">
          <h4 class="mb-2 mt-4 text-center">Selamat Datang di {{config('variables.templateName')}}! 👋</h4>
          <p class="mb-5">Catatan Keuangan Ku, Web apps Pengelola Keuangan</p>


          <div class="mb-3">
            <a href="/dashboard" class="btn btn-primary d-grid w-100"> Let's Go </a>
          </div>

        </div>
      </div>
      <!-- /Login -->
      <img src="{{asset('assets/img/illustrations/tree-3.png')}}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block">
      <img src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}" class="authentication-image d-none d-lg-block" alt="triangle-bg">
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block">
    </div>
  </div>
</div>
@endsection
