@extends('backend.admin.master')
@section('title', __('dashboard.admin_index'))

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            </div>
        </div>

        <div class="content-body">
            <!-- Table with Bordered Columns and Gray Header -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('dashboard.admins_all') }}</h4>
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('dashboard.admin_name') }}</th>
                                                <th>{{ __('dashboard.admin_email') }}</th>
                                                <th>{{ __('dashboard.admin_role') }}</th>
                                                <th>{{ __('dashboard.admin_status') }}</th>
                                                <th>{{ __('dashboard.admin_created_date') }}</th>
                                                <th class="text-center">{{ __('dashboard.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($admins as $admin)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ $admin->role->name }}</td>
                                                    <td>{{ $admin->status }}</td>
                                                    <td>{{ $admin->created_at->format('d-m-Y a') }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <button class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                                    type="button" id="dropdownActions"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                {{ __('dashboard.actions') }}
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownActions">
                                                                @can('admin_update')
                                                                    <a class="dropdown-item" href="{{ route('admin.admins.edit', $admin->id) }}">
                                                                        <i class="la la-edit"></i> {{ __('dashboard.admin_edit') }}
                                                                    </a>
                                                                @endcan
                                                                @can('admin_delete')
                                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('delete_admin_{{ $admin->id }}').submit();">
                                                                        <i class="la la-trash-o"></i> {{ __('dashboard.admin_delete') }}
                                                                    </a>
                                                                @endcan

                                                                @if($admin->status == __('dashboard.active'))
                                                                   @can('admin_change_status')
                                                                        <a class="dropdown-item" href="{{ route('admin.admins.change-status', $admin->id) }}">
                                                                            <i class="la la-ban"></i> {{ __('dashboard.in_active') }}
                                                                        </a>
                                                                   @endcan
                                                                @else
                                                                @can('admin_change_status')
                                                                    <a class="dropdown-item" href="{{ route('admin.admins.change-status', $admin->id) }}">
                                                                        <i class="la la-check-circle"></i> {{ __('dashboard.active') }}
                                                                    </a>
                                                                @endcan
                                                                @endif

                                                                <form id="delete_admin_{{ $admin->id }}" action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="20" class="text-center text-muted">
                                                        <strong class="font-weight-bold text-danger">{{ __('dashboard.no_admins_found') }}</strong>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $admins->appends(request()->input())->render('pagination::bootstrap-4') }}
                                </div>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card-content -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.content-body -->
    </div> <!-- /.content-wrapper -->
</div> <!-- /.app-content -->
@endsection
