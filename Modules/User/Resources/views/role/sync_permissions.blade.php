@extends('backend.layout.master')
@section('meta_title', $metaTitle)
<!-- Breadcrumb -->
@section('breadcrumb')
    <x-breadcrumb-component pageVerb="Assign Permissions" :pageHeading="$pageHeading" :pageRoute="$pageRoute" />
@endsection
<!-- End: Breadcrumb -->

<!-- Main content area -->
@section('content_area')
    <form id="createForm" action="{{ route('admin.roles.syncPermissionsStore', encrypt($model->id)) }}" method="post">
        @csrf
        <div class="card">
            <x-card-header-component :cardTitle="$metaTitle" :moduleName="$pageRoute" />
            <!-- /card-header-component -->

            <div class="card-body">
                <div class="row g-3">
                    @foreach ($permissions as $permission_chunk)
                        <div class="col-sm-6 col-lg-4">
                            @foreach ($permission_chunk as $key => $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $key }}"
                                        id="permissions_{{ $key }}" name="permissions[]"
                                        @if (array_key_exists($key, $role_permissions)) checked @endif>
                                    <label class="form-check-label" for="permissions_{{ $key }}">
                                        {{ _ucFirst($permission) }}
                                    </label>
                                </div>
                                <!-- /.form-check -->
                            @endforeach
                        </div>
                        <!-- /.col -->
                    @endforeach
                </div>
                <!-- /.row  -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-muted">
                <x-btn-component inputType="submit" />
                <!-- /btn-component -->
            </div>

        </div>
        <!-- /.card -->
    </form>
    <!-- /#createForm -->


@endsection

<!-- End: Main content area -->
