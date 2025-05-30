@extends('backend.admin.auth.password.master')
@section('title', 'verify-otp')
@section('content')
    <body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper" style="display: flex; justify-content: space-between; width: 100%;">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
              <i class="ft-menu font-large-1"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="{{ asset('assets/assets-back')}}/images/logo/logo.png">
              <h3 class="brand-text">Modern Admin</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
              <i class="la la-ellipsis-v"></i>
            </a>
          </li>
        </ul>
      </div>

      @if(LaravelLocalization::getCurrentLocale() == 'en')
        <div style="display: flex; align-items: center; margin-left: auto; margin-right: 150px;">
            <div style="list-style: none; display: inline-block; padding: 8px 0;">
            <x-language-switcher />
            </div>
        </div>
      @else
        <div style="display: flex; align-items: center; margin-left: auto; margin-left: 150px;">
            <div style="list-style: none; display: inline-block; padding: 8px 0;">
            <x-language-switcher />
            </div>
        </div>
      @endif
      <!-- Language Switcher with right margin -->
    </div>
  </nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="{{ asset('assets/assets-back') }}/images/logo/logo-dark.png" alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>We will send you a link to reset password.</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.password.reset' , ['token' => $token]) }}" method="POST">
                       <fieldset class="form-group position-relative has-icon-left">
                        <input type="hidden" name="email" value="{{ $email }}" class="form-control form-control-lg input-lg" id="user-email">
                        <div class="form-control-position">

                        </div>
                      </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="otp" class="form-control form-control-lg input-lg" id="user-email"
                        placeholder="{{ __('auth.enter_otp') }}" required>
                            @error('otp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="hidden" name="token" class="form-control form-control-lg input-lg" id="user-email" value="{{ $token }}">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                      </fieldset>
                      <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i>{{ __('auth.send') }}</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer border-0">
                  <p class="float-sm-left text-center">{{ __('auth.already_have_account') }}<a href="{{ route('admin.login') }}" class="card-link" style="padding-left: 10px">{{ __('auth.login') }}</a></p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('backend.admin.auth.password.partials.scripts')
</body>
</html>
@endsection
