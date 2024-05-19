@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="mdi mdi-bell-outline mdi-20px me-1"></i>Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="mdi mdi-link mdi-20px me-1"></i>Connections</a></li>
    </ul>
    <div class="card mb-4">
      <h4 class="card-header">Profile Details</h4>
      <!-- Account -->
      <form id="formAccountSettings" method="POST" action="{{ route('profile.update') }}"s>
        @csrf
        @method('patch')

        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" style="width:100%; height:auto; object-fit: cover;" id="uploadedAvatar" />
            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                <input type="file" id="upload" name="photos" class="account-file-input" hidden accept="image/png, image/jpeg" />
                </label>
                <button type="button" class="btn btn-outline-danger account-image-reset mb-3">
                <i class="mdi mdi-reload d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
                </button>
                <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
            </div>
            </div>
        </div>
        <div class="card-body pt-2 mt-1">
            <div class="row mt-2 gy-4">
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus />
                    <label for="firstName">Fullname</label>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input class="form-control" type="text" name="username" id="username" value="{{ auth()->user()->username }}" />
                    <label for="username">Username</label>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" />
                    <label for="email">E-mail</label>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                    <input class="form-control" type="text" id="work" name="work" placeholder="Mahasiswa" />
                    <label for="work">Jobs</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                    <span class="input-group-text">ID (+62)</span>
                        <div class="form-floating form-floating-outline">
                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="81 555 0XXX" />
                        <label for="phoneNumber">Phone Number</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                    <label for="address">Address</label>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <select id="currency" class="select2 form-select">
                    <option value="">Select Currency</option>
                    <option value="usd">USD</option>
                    <option value="euro">Euro</option>
                    <option value="pound">Pound</option>
                    <option value="bitcoin">Bitcoin</option>
                    </select>
                    <label for="currency">Currency</label>
                </div>
                </div> --}}
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
        </div>
    </form>
      <!-- /Account -->
    </div>
    <div class="card">
      <h5 class="card-header fw-normal">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3 ms-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger">Deactivate Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
