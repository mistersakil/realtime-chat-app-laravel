@extends('backend.layout.master')
@section('meta_title', $metaTitle)
<!-- Breadcrumb  -->
@section('breadcrumb')
    <x-breadcrumb-component pageVerb="List" :pageHeading="$pageHeading" :pageRoute="$pageRoute" />
@endsection
<!-- End: breadcrumb  -->

@section('content_area')

    <div class="card">
        <x-card-header-component :cardTitle="$metaTitle" :moduleName="$pageRoute" />
        <!-- /card-header-component  -->

        <div class="card-body table-responsive">

            <table class="table table-bordered table-sm" id="datatable">
                <thead>
                    <tr>
                        <th width="5%">Id</th>
                        <th width="25%">Name</th>
                        <th width="30%">Email</th>
                        <th width="15%">Role</th>
                        <th width="10%">Status</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
            </table>
            <!-- /.table -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

@push('dynamic_script')
    <script type="module">
$(document).ready(function() {

    /**
     * CSRF token setup for all ajax request
     * @return null
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });


    /* Remove modal from dom when it hides from window */

    $("body").on("hide.bs.modal", ".modal", function() {
        $(this).remove();
    });


    /** 
     * Display edit modal using fetch API (ajax) 
     * @return view modal
     * @package custom.js
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    $('body').on('click', '.btnShow', function(event) {
        event.preventDefault();
        let url = $(this).data('href');
        fetch(url)
            .then(response => response.text())
            .then(html => {
                $('body').append(html);
                var showModal = new bootstrap.Modal(document.getElementById('showModal'), {
                    keyboard: false
                });
                showModal.show();
            })
    });

    /**
     * List of resources using datatable on ajax call     
     * @package custom.js
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    listResource({
        dataTableElement: $("#datatable"),
        url: "{{ route('admin.users.datatable') }}",
        displayLength: 5,
        columns: [{
                data: "name",
                name: "name",
            },
            {
                data: "email",
                name: "email",
            },
            {
                data: "roleName",
                name: "roleName",
                sorting:false
            },
            {
                data: "status",
                name: "status",
                searching: false,
            },
        ]

    });

    /**
     * Delete resource using ajax request
     * @return null
     * @package custom.js
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    $("body").on("click", ".btnDelete", function(event) {
        changeResourceStatus({
            event,
            element: $(this),
            method: 'delete',
            dataTable: $("#datatable").dataTable()
        });
    });

    /**
     * Change resource status using ajax request
     * @return null
     * @package custom.js
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    $("body").on("click", ".changeResourceStatus", function(event) {
        changeResourceStatus({
            event,
            element: $(this),
            method: 'get',
            dataTable: $("#datatable").dataTable()
        });
    });

    /* Get session data for toast */
    let status = "{{ session('status') }}";
    let message = "{{ session('message') }}";
    /* Success alert */
    if (status == 'success') {
        toastr.success(message, __ucFirst(status), __toastOptions());
    }
    /* Error alert */
    if (status == 'error') {
        toastr.error(message, __ucFirst(status), __toastOptions(4000));
    }

});
</script>
@endpush
