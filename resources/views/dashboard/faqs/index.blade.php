<x-dashboard.layouts.main>

    @section('title', 'كافينو  | سوالات متداول')


    @section('content')

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <x-dashboard.partials.messages.success />
                    <x-dashboard.partials.messages.error />


                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">
                                    سوالات متداول
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                @can('create faq')
                                    <!--begin::دکمه-->
                                    <a href="{{ route('dashboard.faqs.create') }}" class="btn btn-primary font-weight-bolder">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/طرح/Flatten.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                                    <path
                                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>سوال جدید
                                    </a>
                                    <!--end::دکمه-->
                                @endcan
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control search-input"
                                                           placeholder="جستجو..."
                                                           id="kt_datatable_search_query">
                                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <label class="mr-3 mb-0 d-none d-md-block">براساس:</label>
                                                    <div class="dropdown bootstrap-select form-control"><select
                                                            class="form-control search-column-select" id="kt_datatable_search_type">
                                                            @foreach ($filter_items as $column => $name)
                                                                <option value="{{ $column }}">{{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="dropdown-menu ">
                                                            <div class="inner show" role="listbox" id="bs-select-2"
                                                                 tabindex="-1">
                                                                <ul class="dropdown-menu inner show" role="presentation">
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                        <a href="javascript:;" class="btn btn-light-primary px-6 font-weight-bold search-link">
                                            اعمال و جستجو
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <form data-action="{{ route('dashboard.faqs.index') }}" action="" id="search-from"></form>

                            <!--begin: جدو داده ها-->
                            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
                                id="kt_datatable" style="">
                                <table class="datatable-table" style="display: block;">
                                    <thead class="datatable-head">
                                        <tr class="datatable-row" style="left: 0px;">

                                            <th data-field="ID" class="datatable-cell datatable-cell-sort">
                                                <span style="width: 137px;">آیدی</span>
                                            </th>

                                            <th data-field="Title" class="datatable-cell datatable-cell-sort">
                                                <span style="width: 137px;">عنوان</span>
                                            </th>

                                            <th data-field="Actions" data-autohide-disabled="false"
                                                class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 125px;">عملیات</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="datatable-body" style="">
                                            @foreach ($faqs as $faq)
                                                <tr data-row="{{ $loop->index }}" class="datatable-row" style="left: 0px;">
                                                    <td data-field="ID" aria-label="0363-0198" class="datatable-cell">
                                                        <span style="width: 137px;">{{ $faq->id }}</span>
                                                    </td>

                                                    <td data-field="Title" aria-label="Philippines" class="datatable-cell">
                                                        <span style="width: 137px;">{{ $faq->title }}</span>
                                                    </td>

                                                    <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                                        class="datatable-cell">
                                                        <span style="overflow: visible; position: relative; width: 125px;">

                                                            @can('see faq')
                                                                <a href="{{ route('dashboard.faqs.edit', $faq) }}" class="btn btn-sm btn-clean btn-icon mr-2"
                                                                    title="ويرايش">
                                                                    <span class="svg-icon svg-icon-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                                <path
                                                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                                    fill="#000000" fill-rule="nonzero"
                                                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                                                </path>
                                                                                <rect fill="#000000" opacity="0.3" x="5" y="20"
                                                                                    width="15" height="2" rx="1"></rect>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            @endcan

                                                            @can('delete faq')
                                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon entityDeleteButton"
                                                                    title="حذف" data-id="{{ $faq->id }}">
                                                                    <span class="svg-icon svg-icon-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                                <path
                                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                    fill="#000000" fill-rule="nonzero"></path>
                                                                                <path
                                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                    fill="#000000" opacity="0.3"></path>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            @endcan

                                                        </span>
                                                    </td>
                                                </tr>

                                                <form class="deleteEntityForm" id="ID-{{ $faq->id }}"
                                                    action="{{ route('dashboard.faqs.destroy', $faq) }}"
                                                    method="post">

                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                @endforeach

                                            </tbody>
                                        </table>

                                        <div class="datatable-pager datatable-paging-loaded">
                                            {{ $faqs->links() }}
                                        </div>
                                    </div>
                                    <!--end: جدول داده ها-->
                                </div>
                            </div>

                        </div>

                    </div>

                </div>



                <!-- مودال-->
                <div class="modal fade" id="deleteEntityModal" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="none" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تایید حذف</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                از حذف آیتم با آیدی
                                <span id="deletingEntityId">0</span>
                                اطمینان دارید؟
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                    data-dismiss="modal">لغو</button>
                                <button type="button" id="confirmDeleteEntity"
                                    class="btn btn-danger font-weight-bold">حذف</button>
                            </div>
                        </div>
                    </div>
                </div>







            @endsection


            @section('scripts')

                <script>
                    $(document).ready(function() {
                        $(".entityDeleteButton").click(function() {
                            const button = $(this);
                            const entityID = button.attr('data-id');

                            // show category id in modal
                            $("#deletingEntityId").html(entityID);
                            // show modal
                            $('#deleteEntityModal').modal('show');

                            // delete category when modal confrimed
                            $("#confirmDeleteEntity").click(function() {
                                const form = $("#ID-" + entityID);
                                form.submit();
                            });
                        });

                        const searchInput = $(".search-input");
                        const searchColumnSelect = $(".search-column-select");
                        const searchLink = $(".search-link");
                        const searchForm = $("#search-from");
                        const searchAction = searchForm.attr('data-action');

                        searchLink.click(function () {
                            const data = {
                                searchText: searchInput.val(),
                                column:  searchColumnSelect.find(":selected").val(),
                            };
                            // let link = searchAction + '?filter[status]=' + data.status;
                            let link = searchAction + '?sort=' + data.column + '&filter['+ data.column +']=' + data.searchText;
                            // console.log(link);
                            window.location.replace(link);
                        });
                    });
                </script>



                <!--begin::Page Scripts(used by this page)-->
                <script src="{{ asset('assets/js/pages/crud/ktdatatable/base/data-local.js?v=7.0.6') }}"></script>
                <!--end::Page Scripts-->
            @endsection

</x-dashboard.layouts.main>
