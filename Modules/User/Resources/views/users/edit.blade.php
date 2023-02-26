@extends('backend.layout.master')
@section('meta_title', $metaTitle)
<!-- Breadcrumb -->
@section('breadcrumb')
    <x-breadcrumb-component pageVerb="Edit" :pageHeading="$pageHeading" :pageRoute="$pageRoute" />
@endsection
<!-- End: Breadcrumb -->

<!-- Main content area -->
@section('content_area')

    <div class="card">
        <x-card-header-component :cardTitle="$metaTitle" :moduleName="$moduleName" :moduleName="$pageRoute" />
        <!-- /card-header-component -->

        <div class="card-body">

            <form class="row g-3" action="{{ route('admin.users.update', $model) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="col-md-6">
                    <x-input-component inputId="name" inputLabel="User full name" inputRequired="1"
                        inputValue="{{ old('name') ?? $model->name }}"
                        inputError="{{ $errors->has('name') ? true : false }}" />
                    <!-- /input-component -->

                    <x-input-component inputType="email" inputId="email" inputLabel="User email" inputRequired="1"
                        inputValue="{{ old('email') ?? $model->email }}"
                        inputError="{{ $errors->has('email') ? true : false }}" />
                    <!-- /input-component -->


                    <x-input-component inputType="password" inputId="password" inputLabel="User password"
                        inputError="{{ $errors->has('password') ? true : false }}" />
                    <!-- /input-component -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">

                    <x-select-box-component inputLabel="Role" inputId="role" inputRequired="1" :optionList="$roles"
                        :inputSelected="$selectedId" inputDefaultOption="1" />
                    <!-- /select-box-component -->

                    <x-select-box-component inputLabel="Status" inputId="status" inputRequired="1" :optionList="$status"
                        :inputSelected="$model->status" />
                    <!-- /select-box-component -->

                    <div class="input-group mb-3">
                        <input type="file" class="form-control form-control-lg" id="fileName" name="fileName">
                        <label class="input-group-text" for="fileName">Photo</label>
                        <img src="{{ Vite::asset($avatar) }}" alt="Profile" class="rounded-circle avatarImg" />
                    </div>


                </div>
                <!-- /.col -->

                <div class="col d-flex flex-sm-row-reverse flex-column gap-1">

                    <x-btn-component inputType="submit" />
                    <x-btn-component inputType="reset" inputLabel="Reset" inputBtnClass="danger" inputIcon="refresh" />
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
