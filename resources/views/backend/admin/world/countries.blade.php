@extends('backend.admin.master')
@section('title', __('dashboard.countries'))
@section('content')
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <h2 class="content-header-title">
                                           <i class="fas fa-map-marked-alt"></i>
                                           {{ __('dashboard.countries') }}
                                       </h2>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                {{-- رسالة نجاح واحدة فقط --}}
                                @include('backend.admin.includes.tostar-success')

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary white">
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('dashboard.country_name') }}</th>
                                                <th>{{ __('dashboard.country_phone_code') }}</th>
                                                <th>{{ __('dashboard.country_governments_count') }}</th>
                                                <th>{{ __('dashboard.country_users_count') }}</th>
                                                <th>{{ __('dashboard.country_status') }}</th>
                                                <th>{{ __('dashboard.country_change_status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($countries as $country)
                                                <tr>
                                                    <th scope="row">{{ $countries->firstItem() + $loop->index }}</th>
                                                    <td>
                                                        <img src="https://flagcdn.com/w40/{{ strtolower($country->flag) }}.png"
                                                             alt="{{ $country->getTranslation('name', app()->getLocale()) }}"
                                                             width="25"
                                                             height="15"
                                                             style="margin-inline-end: 8px;">
                                                        {{ $country->getTranslation('name', app()->getLocale()) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="badge badge-glow badge-pill badge-primary">{{ $country->phone_code }}</div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="badge badge-glow badge-pill badge-success">{{ $country->governments_count }}</div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="badge badge-glow badge-pill badge-warning">{{ $country->users_count ?? 0 }}</div>
                                                    </td>
                                                    <td class="text-center">
                                                        @if($country->status === __('dashboard.active'))
                                                            <div id="status_{{ $country->id }}" class="badge badge-glow badge-pill badge-success">{{ __('dashboard.active') }}</div>
                                                        @else
                                                            <div id="status_{{ $country->id }}" class="badge badge-glow badge-pill badge-danger">{{ __('dashboard.in_active') }}</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <input
                                                            type="checkbox"
                                                            class="switch change_status status-label"
                                                            country-id="{{ $country->id }}"
                                                            id="switch5"
                                                            {{ $country->getRawOriginal('status') == 1 ? 'checked' : '' }}
                                                            data-group-cls="btn-group-sm"
                                                            style="visibility: hidden;" />
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">{{ __('dashboard.no_countries') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $countries->appends(request()->input())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('js')
<script src="{{ asset('assets-back') }}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{ asset('assets-back') }}/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="{{ asset('assets-back') }}/js/scripts/tables/components/table-components.js" type="text/javascript"></script>
<script src="{{ asset('assets-back') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="{{ asset('assets-back') }}/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{ asset('assets-back') }}/js/core/app.js" type="text/javascript"></script>
<script src="{{ asset('assets-back') }}/js/scripts/customizer.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        // تفعيل toggle مفعل / غير مفعل
        $('input[type="checkbox"].switch').bootstrapSwitch({
            onText: '{{ __("dashboard.active") }}',
            offText: '{{ __("dashboard.in_active") }}',
            onColor: 'success',
            offColor: 'danger',
            size: 'small'
        });

        // إظهار العناصر
        setTimeout(function () {
            $('.switch').css('visibility', 'visible');
        }, 0);

        $(document).on('switchChange.bootstrapSwitch', '.change_status', function (event, state) {
            let id = $(this).attr('country-id');
            let url = "{{ route('admin.world.countries.change-status', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: "json",
                success: function (response) {
                    if (response.status === true) {
                        let statusElement = $('#status_' + response.data.id);

                        // حذف الكلاسات القديمة
                        statusElement.removeClass('badge-success badge-danger');

                        // إضافة الكلاس المناسب
                        if (response.data.status === 'active' || response.data.status === 'مفعل') {
                            statusElement.addClass('badge-success');
                        } else {
                            statusElement.addClass('badge-danger');
                        }

                        // تحديث النص
                        statusElement.text(response.data.status);

                        // اظهار رسالة النجاح بشكل سلس
                        $('.tostar_success').stop(true, true).text(response.message).fadeIn();

                        setTimeout(function() {
                            $('.tostar_success').fadeOut();
                        }, 5000);

                    } else {
                        $('.tostar_error').stop(true, true).text(response.message).fadeIn();

                        setTimeout(function() {
                            $('.tostar_error').fadeOut();
                        }, 5000);
                    }
                },
                error: function (error) {
                    console.log("Error:", error);
                }
            });
        });
    });
</script>
@endpush
