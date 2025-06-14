@extends('backend.admin.master')
@section('title', __('dashboard.role_edit'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.roles_permissions') }}</h3>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('admin.roles.update' , $role->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>{{ __('dashboard.role_edit') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.role_name') }}</label>
                                                            <input type="text" name="name[en]" class="form-control" value="{{ $role->getTranslation('name','en') }}">
                                                            @error('name.en')
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{ __('dashboard.role_name_ar') }}</label>
                                                            <input type="text" name="name[ar]" class="form-control" value="{{ $role->getTranslation('name','ar') }}">
                                                             @error('name.ar')
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>{{ __('dashboard.permissions_all') }}</h4>
                                            <hr/>

                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="check-all-permissions">
                                                    <label class="form-check-label font-weight-bold" for="check-all-permissions">
                                                        {{ __('dashboard.select_all_permissions') }}
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                @if(LaravelLocalization::getCurrentLocale() == 'en')
                                                    @foreach (array_chunk(config('permissions_en.permissions'), 4, true) as $permissionsChunk)
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                @foreach ($permissionsChunk as $key => $permission)
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input" name="permissions[]" id="permission-{{ $key }}" value="{{ $key }}" @checked(in_array($key , $role->permissions))>
                                                                            <label class="form-check-label" for="permission-{{ $key }}">{{ $permission }}</label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @error('permissions')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                @else
                                                    @foreach (array_chunk(config('permissions_ar.permissions'), 4, true) as $permissionsChunk)
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                @foreach ($permissionsChunk as $key => $permission)
                                                                    <div class="col-md-3 col-6">
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input" name="permissions[]" id="permission-{{ $key }}" value="{{ $key }}" @checked(in_array($key , $role->permissions))>
                                                                            <label class="form-check-label" for="permission-{{ $key }}">{{ $permission }}</label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @error('permissions')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                @endif
                                            </div>

                                            <div class="form-actions" style="border-top: none;">
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
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#check-all-permissions').on('change', function () {
                    $('input[name="permissions[]"]').prop('checked', this.checked);
                });

                // Optional: uncheck "Check All" if any individual checkbox is unchecked
                $('input[name="permissions[]"]').on('change', function () {
                    if (!$(this).prop('checked')) {
                        $('#check-all-permissions').prop('checked', false);
                    } else if ($('input[name="permissions[]"]:checked').length === $('input[name="permissions[]"]').length) {
                        $('#check-all-permissions').prop('checked', true);
                    }
                });
            });
        </script>
    @endpush
@endsection
