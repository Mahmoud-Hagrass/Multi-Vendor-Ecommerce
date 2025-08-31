@extends('backend.admin.master')
@section('title', __('dashboard.governments'))
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <h2 class="content-header-title">
                                        <i class="fas fa-map-marked-alt"></i>
                                        {{ __('dashboard.governments') }}
                                    </h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    @include('backend.admin.includes.tostar-success')

                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead class="bg-primary white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('dashboard.government_name') }}</th>
                                                    <th>{{ __('dashboard.country_name') }}</th>
                                                    <th>{{ __('dashboard.government_cities_count') }}</th>
                                                    <th>{{ __('dashboard.government_users_count') }}</th>
                                                    <th>{{ __('dashboard.government_status') }}</th>
                                                    @can('government_change_status' , App\Models\Admin::class)
                                                        <th>{{ __('dashboard.government_change_status') }}</th>
                                                    @endcan
                                                    <th>{{ __('dashboard.shippinng_price') }}</th>
                                                    @can('government_shipping_price_change' , App\Models\Admin::class)
                                                        <th>{{ __('dashboard.shippinng_price_change') }}</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($countries_with_governments as $country)
                                                    @foreach ($country->governments as $government)
                                                        <tr>
                                                            <th scope="row">
                                                                {{ $loop->parent->iteration }}.{{ $loop->iteration }}</th>
                                                            <td class="text-center">
                                                                <div class="badge badge-glow badge-pill badge-primary">
                                                                    {{ $government->name }}</div>
                                                            </td>
                                                            <td>
                                                                @if (isset($country->flag))
                                                                    <img src="https://flagcdn.com/w40/{{ strtolower($country->flag) ?? 'eg' }}.png"
                                                                        width="25" height="15"
                                                                        style="margin-inline-end: 8px;">
                                                                @endif
                                                                {{ $country->getTranslation('name', app()->getLocale()) }}
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="badge badge-glow badge-pill badge-success">
                                                                    {{ $government->cities_count }}</div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="badge badge-glow badge-pill badge-warning">
                                                                    {{ $country->users_count ?? 0 }}</div>
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($government->status === __('dashboard.active'))
                                                                    <div id="status_{{ $government->id }}"
                                                                        class="badge badge-glow badge-pill badge-success">
                                                                        {{ __('dashboard.active') }}</div>
                                                                @else
                                                                    <div id="status_{{ $government->id }}"
                                                                        class="badge badge-glow badge-pill badge-danger">
                                                                        {{ __('dashboard.in_active') }}</div>
                                                                @endif
                                                            </td>
                                                            @can('government_change_status' , App\Models\Admin::class)
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="switch change_status status-label"
                                                                        government-id="{{ $country->id }}" id="switch5"
                                                                        {{ $country->getRawOriginal('status') == 1 ? 'checked' : '' }}
                                                                        data-group-cls="btn-group-sm"
                                                                        style="visibility: hidden;" />
                                                                </td>
                                                            @endcan
                                                            <td class="text-center">
                                                                <div class="badge badge-glow badge-pill badge-success">
                                                                    {{ $government->shippingPrice->shipping_price ?? '-' }}
                                                                </div>
                                                            </td>
                                                            @can('government_shipping_price_change' , App\Models\Admin::class)
                                                                <td class="text-center">
                                                                    <button class="btn btn-primary" data-toggle="modal"
                                                                        data-target="#changeGovernmentShippingPrice_{{ $government->id }}">{{ __('dashboard.change_government_shipping_price') }}</button>
                                                                </td>
                                                                    <x-change-government-shipping-price
                                                                        government-id="{{ $government->id }}"></x-change-government-shipping-price>
                                                            @endcan
                                                        </tr>
                                                    @endforeach
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">
                                                            {{ __('dashboard.no_countries') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>


                                        {{-- Pagination Links --}}
                                        <div class="d-flex justify-content-center mt-2">
                                            {{ $countries_with_governments->appends(request()->input())->render('pagination::bootstrap-4') }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets-back') }}/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="{{ asset('assets-back') }}/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script>
    <script src="{{ asset('assets-back') }}/js/scripts/tables/components/table-components.js"></script>
    <script src="{{ asset('assets-back') }}/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('assets-back') }}/js/core/app-menu.js"></script>
    <script src="{{ asset('assets-back') }}/js/core/app.js"></script>
    <script src="{{ asset('assets-back') }}/js/scripts/customizer.js"></script>

    <script>
        $(document).ready(function() {
            $('input[type="checkbox"].switch').bootstrapSwitch({
                onText: '{{ __('dashboard.active') }}',
                offText: '{{ __('dashboard.in_active') }}',
                onColor: 'success',
                offColor: 'danger',
                size: 'small'
            });

            setTimeout(function() {
                $('.switch').css('visibility', 'visible');
            }, 0);

            $(document).on('switchChange.bootstrapSwitch', '.change_status', function(event, state) {
                let id = $(this).attr('government-id');
                let url = "{{ route('admin.world.governments.change-status', ':id') }}".replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: "json",
                    success: function(response) {
                        if (response.status === true) {
                            let statusElement = $('#status_' + response.data.id);
                            statusElement.removeClass('badge-success badge-danger');

                            if (response.data.status === 'active' || response.data.status ===
                                'مفعل') {
                                statusElement.addClass('badge-success');
                            } else {
                                statusElement.addClass('badge-danger');
                            }

                            statusElement.text(response.data.status);

                            $('.tostar_success').stop(true, true).text(response.message)
                            .fadeIn();
                            setTimeout(() => {
                                $('.tostar_success').fadeOut();
                            }, 5000);
                        } else {
                            $('.tostar_error').stop(true, true).text(response.message).fadeIn();
                            setTimeout(() => {
                                $('.tostar_error').fadeOut();
                            }, 5000);
                        }
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            });
        });
    </script>
@endpush
