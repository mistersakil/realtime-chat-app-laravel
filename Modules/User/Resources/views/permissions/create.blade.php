@extends('backend.layout.master')
@section('meta_title', $metaTitle)
<!-- Breadcrumb -->
@section('breadcrumb')
    <x-breadcrumb-component pageVerb="Create" :pageHeading="$pageHeading" :pageRoute="$pageRoute" />
@endsection
<!-- End: Breadcrumb -->

<!-- Main content area -->
@section('content_area')
    <div class="card">
        <form id="createForm" action="{{ route('admin.permissions.store') }}" method="post">
            @csrf
            <x-card-header-component :cardTitle="$metaTitle" :moduleName="$pageRoute" />
            <!-- /card-header-component -->

            <div class="card-body">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 g-2">
                    @if (isset($availablePermissions) && count($availablePermissions))
                        @foreach ($availablePermissions as $type => $permissionList)
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div
                                            class="form-check form-switch mt-1 mb-1 d-flex align-items-center justify-content-between">

                                            <input class="form-check-input" type="checkbox"
                                                id="{{ $type }}_select_all" title="{{ $type }}">
                                            <label class="form-check-label text-muted fs-5"
                                                for="{{ $type }}_select_all">{{ ucwords($type) }}</label>
                                        </div>
                                        <hr>
                                        <!-- /.form-switch -->

                                        @foreach ($permissionList as $key => $permission)
                                            <div class="form-check">
                                                <input class="form-check-input {{ $type . '_permissions' }}" type="checkbox"
                                                    value="{{ $type . '-' . $permission }}"
                                                    id="{{ $type }}_permission_{{ $key }}"
                                                    name="permissions[]" @if (in_array($type . '-' . $permission, $existingPermissions)) checked @endif>
                                                <label class="form-check-label"
                                                    for="{{ $type }}_permission_{{ $key }}">
                                                    {{ _ucFirst($permission) }}
                                                </label>
                                            </div>
                                            <!-- /.form-check -->
                                        @endforeach
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        @endforeach
                    @endif
                </div>
                <!-- /.row-cols -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-muted">
                <x-btn-component inputType="submit" />
                <!-- /btn-component -->
            </div>
        </form>
        <!-- /#createForm -->
    </div>
    <!-- /.card -->


@endsection

<!-- End: Main content area -->


@push('dynamic_script')
    <script type="module">
window.onchange = function(event) {
    const checkboxToggler = event.target;
    if (checkboxToggler.hasAttribute("title")) {
        /* Name of permission group */
        let groupName = checkboxToggler.getAttribute("title");
        /* Check is checked the specific group */
        let isGroupChecked = checkboxToggler.checked;
        /* Permission check toggler function */
        permissionCheckToggler({
            groupName,
            isGroupChecked
        });
    }
}

/**
 * permissionCheckToggler toggles on all permission based on group selection
 * @param Object[Mixed]
 * @return null
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

function permissionCheckToggler({
    groupName,
    isGroupChecked
}) {
    let permissionList = document.querySelectorAll(`.${groupName}_permissions`);
    for (let i = 0; i < permissionList.length; i++) {
        if (isGroupChecked) {
            permissionList[i].checked = true;
        } else {
            permissionList[i].checked = false;
        }
    }
}
</script>
@endpush
