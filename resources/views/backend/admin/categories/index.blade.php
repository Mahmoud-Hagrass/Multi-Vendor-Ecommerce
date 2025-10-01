@extends('backend.admin.master')

@section('title', __('dashboard.categories'))

@section('content')
    <div class="content-body">
        <section id="autofill">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="min-height: 70vh;">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h1 class="card-title">{{ __('dashboard.categories') }}</h1>
                                @can('category_create' , App\Models\Admin::class)
                                    <button type="button" data-toggle="modal" data-target="#create_category_modal" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> {{ __('dashboard.category_create') }}
                                    </button>
                                @endcan
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard p-2">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('dashboard.category_id') }}</th>
                                                    <th>{{ __('dashboard.category_name') }}</th>
                                                    <th>{{ __('dashboard.category_status') }}</th>
                                                    <th>{{ __('dashboard.category_created_at') }}</th>
                                                    <th>{{ __('dashboard.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>{{ __('dashboard.category_id') }}</th>
                                                    <th>{{ __('dashboard.category_name') }}</th>
                                                    <th>{{ __('dashboard.category_status') }}</th>
                                                    <th>{{ __('dashboard.category_created_at') }}</th>
                                                    <th>{{ __('dashboard.actions') }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> {{-- /.card --}}
                    </div>
                </div>
            </div>
        </section>
    </div>


<!-- Modal -->
@include('backend.admin.categories.modals.create_category')

@foreach($allCategories as $category)
    @include('backend.admin.categories.modals.edit_category', ['category' => $category])
@endforeach

@endsection

@push('css')
    {{--  DataTables + Responsive CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.min.css" />

    {{-- Yajra Button CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.5/css/buttons.bootstrap5.min.css" />

    {{-- Responsive CSS CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.6/css/responsive.bootstrap5.min.css" />

    {{-- Row Reorder CSS CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.bootstrap5.min.css" />

    {{-- Col Reorder CSS CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/2.1.1/css/colReorder.bootstrap5.min.css">

    {{-- Select CSS CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/select/3.1.0/css/select.bootstrap5.min.css">
@endpush

@push('js')
    {{--  jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{--  DataTables + Responsive JS --}}
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.min.js"></script>

    {{-- Yajra Button CDN --}}
    <script src="https://cdn.datatables.net/buttons/3.2.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.bootstrap5.min.js"></script>

    {{-- Column Visability CDN --}}
    <script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.colVis.min.js"></script>

    {{-- Print Button CDN --}}
    <script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.print.min.js"></script>

    {{-- Excel CDN --}}
    <script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.html5.min.js"></script>

    {{-- Excel CDN --}}
    <script src="{{ asset('vendor/datatables/excel/jszip.min.js') }}"></script>


    {{-- PDF CDN --}}
    <script src="{{ asset('vendor/datatables/pdf/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/pdf/vfs_fonts.js') }}"></script>

    {{-- Responsive Js CDN --}}
    <script src="https://cdn.datatables.net/responsive/3.0.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.6/js/responsive.bootstrap5.min.js"></script>


    {{-- Row Reorder JS CDN
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.bootstrap5.min.js"></script> --}}

    {{-- Column Reorder JS CDN --}}
    <script src="https://cdn.datatables.net/colreorder/2.1.1/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/2.1.1/js/colReorder.bootstrap5.min.js"></script>

    {{-- Select Js CDN --}}
    <script src="https://cdn.datatables.net/select/3.1.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/select/3.1.0/js/select.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            var language = "{{ app()->getLocale() }}";
            var languageCdn = {};
            var buttons = ['colvis', 'copy', 'excel', 'pdf', 'print']; // default "en" language
            if (language == 'ar') {
                languageCdn = {
                    url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/ar.json'
                };

                // override the default button names in arabic language
                buttons = [{
                        extend: 'colvis',
                        text: 'إظهار الأعمدة'
                    },
                    {
                        extend: 'copy',
                        text: 'نسخ'
                    },
                    {
                        extend: 'excel',
                        text: 'اكسيل'
                    },
                    {
                        extend: 'pdf',
                        text: 'بي دي إف'
                    },
                    {
                        extend: 'print',
                        text: 'طباعة'
                    }
                ];
            }
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: true,
                scrollX: true,
                colReorder: true,
                // rowReorder: true,
                select: true,
                ajax: "{{ route('admin.categories.yajra.all') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id',
                        searchable: false,
                        orderable: false,
                        width: '30px',
                        className: 'text-center',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center',
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-center',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                    },
                ],
                layout: {
                    topStart: {
                        buttons: buttons,
                    }
                },

                language: languageCdn,
            });
        });
    </script>

    <script>
        $(document).on('click' , '#deleteCategoryForm' , function(e){
            e.preventDefault() ;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    });
                    $(this).closest("form").submit();
                }
            });
        }) ;
    </script>
@endpush
