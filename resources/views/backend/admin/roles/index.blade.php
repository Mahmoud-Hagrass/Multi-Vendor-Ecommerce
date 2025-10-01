@extends('backend.admin.master')
@section('title', __('dashboard.roles_all'))
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.roles_all') }}</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('dashboard.roles_all') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (LaravelLocalization::getCurrentLocale() == 'en')
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('dashboard.role_name') }}</th>
                                                <th>{{ __('dashboard.permissions_all') }}</th>
                                                <th>{{ __('dashboard.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($roles->count() > 0)
                                                @forelse ($roles as $role)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $role->getTranslation('name', 'en') }}</td>
                                                        <td>
                                                            @php
                                                                $configEnglishPermissions = config(
                                                                    'permissions_en.permissions',
                                                                );
                                                            @endphp
                                                            @if (is_array($role->permissions))
                                                                @foreach ($role->permissions as $permission)
                                                                    @if (isset($configEnglishPermissions[$permission]))
                                                                        <span
                                                                            class="badge badge-primary">{{ $configEnglishPermissions[$permission] }}</span>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <div style="display: inline-block;">
                                                                <div class="dropdown">
                                                                    <button
                                                                        class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                                        id="dropdownBreadcrumbButton" type="button"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        {{ __('dashboard.actions') }}
                                                                    </button>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownBreadcrumbButton">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin.roles.edit', $role->id) }}"><i
                                                                                class="la la-edit"></i>
                                                                            {{ __('dashboard.edit') }}</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                                            onclick="document.getElementById('delete_form_'+{{ $role->id }}).submit();"><i
                                                                                class="la la-trash"></i>
                                                                            {{ __('dashboard.delete') }}</a>
                                                                    </div>
                                                                </div>
                                                                <form id="delete_form_{{ $role->id }}"
                                                                    action="{{ route('admin.roles.destroy', $role->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            @endif

                                        </tbody>
                                    </table>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('dashboard.role_name_ar') }}</th>
                                                <th>{{ __('dashboard.permissions_all') }}</th>
                                                <th>{{ __('dashboard.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($roles->count() > 0)
                                                @forelse ($roles as $role)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $role->getTranslation('name', 'ar') }}</td>
                                                        <td>
                                                            @php
                                                                $configArabicPermissions = config(
                                                                    'permissions_ar.permissions',
                                                                );
                                                            @endphp
                                                            @if (is_array($role->permissions))
                                                                @foreach ($role->permissions as $permission)
                                                                    @if (isset($configArabicPermissions[$permission]))
                                                                        <span
                                                                            class="badge badge-primary">{{ $configArabicPermissions[$permission] }}</span>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <div style="display: inline-block;">
                                                                <div class="dropdown">
                                                                    <button
                                                                        class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                                        id="dropdownBreadcrumbButton" type="button"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        {{ __('dashboard.actions') }}
                                                                    </button>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownBreadcrumbButton">
                                                                        @can('role_update')
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('admin.roles.edit', $role->id) }}"><i
                                                                                    class="la la-edit"></i>
                                                                                {{ __('dashboard.edit') }}</a>
                                                                        @endcan
                                                                        @can('role_delete')
                                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                                onclick="document.getElementById('delete_form_'+{{ $role->id }}).submit();"><i
                                                                                    class="la la-trash"></i>
                                                                                {{ __('dashboard.delete') }}</a>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                                <form id="delete_form_{{ $role->id }}"
                                                                    action="{{ route('admin.roles.destroy', $role->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            @endif

                                        </tbody>
                                    </table>
                                    {{ $roles->appends(request()->input())->render('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
