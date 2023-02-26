@extends('backend.layout.master')
@section('meta_title', $metaTitle)
@section('breadcrumb')
    <x-breadcrumb-component pageVerb="List" :pageHeading="$pageHeading" :pageRoute="$pageRoute" />
    <!-- /breadcrumb-component  -->
@endsection
@section('content_area')
    <div class="card">
        <x-card-header-component :cardTitle="$metaTitle" :moduleName="$pageRoute" />
        <!-- /card-header-component  -->

        <div class="card-body table-responsive">

            <table class="table table-bordered table-sm" id="datatable">
                <thead>
                    <tr>
                        <th width="5%">Id</th>
                        <th width="20%">Name</th>
                        <th width="20%">Permissions</th>
                        <th width="20%">Created at</th>
                        <th width="15%">Status</th>
                        <th width="20%">Actions</th>
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
        url: "{{ route('admin.roles.datatable') }}",
        displayLength: 5,
        columns: [{
                data: "name",
                name: "name",
            },
            
            {
                data: "permissions_count",
                name: "permissions_count",
                searching: false,
                sorting:false
            },
            {
                data: "created_at",
                name: "created_at",
                searching: false,
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

});
</script>
@endpush
