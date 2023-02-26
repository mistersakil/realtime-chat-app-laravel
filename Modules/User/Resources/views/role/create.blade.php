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
        <x-card-header-component :cardTitle="$metaTitle" :moduleName="$pageRoute" />
        <!-- /card-header-component -->

        <div class="card-body">

            <form class="row g-3" action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="col-md-4 offset-md-4">
                    <x-input-component inputId="name" inputLabel="Role name" inputRequired="1" inputValue="{{ old('name') }}"
                        inputError="{{ $errors->has('name') ? true : false }}" />
                    <!-- /input-component -->

                    <x-textarea-component inputId="details" inputLabel="Note" inputRequired="1"
                        inputValue="{{ old('details') }}" inputError="{{ $errors->has('details') ? true : false }}" />
                    <!-- /textarea-component -->

                    <x-select-box-component inputId="status" inputLabel="Status" :optionList="$status" />
                    <!-- /select-box-component -->

                    <x-btn-component inputType="submit" />
                    <!-- /btn-component -->
                </div>
                <!-- /.col -->


            </form>
            <!-- /form -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

<!-- End: Main content area -->
