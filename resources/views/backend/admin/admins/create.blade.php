@extends('backend.admin.master')
@section('title' , __('dashboard.admin_create'))
@section('content')
    <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form" action="{{ route('admin.admins.store') }}" method="POST">
                        @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>{{ __('dashboard.admin_create') }}</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('dashboard.admin_name') }}</label>
                              <input type="text" name="name"  class="form-control" placeholder="{{ __('dashboard.enter_name') }}">
                              @error('name')
                                  <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">{{ __('dashboard.admin_email') }}</label>
                              <input type="email" name="email" class="form-control" placeholder="{{ __('dashboard.enter_email') }}">
                               @error('email')
                                  <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('dashboard.password') }}</label>
                              <input type="password" name="password"  class="form-control" placeholder="{{ __('dashboard.enter_password') }}">
                               @error('password')
                                  <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">{{ __('dashboard.password_confirmation') }}</label>
                              <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('dashboard.enter_confirm_password') }}">
                               @error('password_confirmation')
                                  <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">{{ __('dashboard.admin_role') }}</label>
                              <select name="role_id" class="form-control">
                                @if($roles->count() >0)
                                    <option selected="" disabled="">{{ __('dashboard.select_role') }}</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                              </select>
                              @error('role_id')
                                  <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">{{ __('dashboard.admin_status') }}</label>
                              <select name="status" class="form-control">
                                    <option selected="" disabled="">{{ __('dashboard.select_status') }}</option>
                                    <option value="{{ __('dashboard.active') }}">{{ __('dashboard.active') }}</option>
                                    <option value="{{ __('dashboard.in_active') }}">{{ __('dashboard.in_active') }}</option>
                              </select>
                               @error('status')
                                  <strong class="text-danger">{{ $message }}</strong>
                              @enderror
                            </div>
                          </div>
                        </div>
                      <div class="form-actions">
                        <button type="reset" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('dashboard.save') }}
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- // Basic form layout section end -->
      </div>
    </div>
  </div>

@endsection
