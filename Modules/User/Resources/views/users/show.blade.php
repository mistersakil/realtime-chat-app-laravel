<div class="modal fade show" id="showModal" tabindex="-1" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $metaTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- /.modal-header -->

            <div class="modal-body">
                <div class="tab-content pt-2 profile">
                    <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">


                        <div class="row">
                            <div class="col-lg-4 col-sm-4 label ">Full Name: </div>
                            <div class="col-lg-8 col-sm-8">{{ $user->name }}</div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg-4 col-sm-4 label ">Email: </div>
                            <div class="col-lg-8 col-sm-8">{{ $user->email }}</div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg-4 col-sm-4 label ">Role: </div>
                            <div class="col-lg-8 col-sm-8">{{ $user->firstRoleName }}</div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg-4 col-sm-4 label ">Created At: </div>
                            <div class="col-lg-8 col-sm-8">
                                {{ _dateFormat($user->created_at, 'd M, Y ') }}
                                <span class="text-secondary">
                                    ({{ $user->created_at->diffForHumans() }})
                                </span>
                            </div>
                        </div>
                        <!-- /.row -->


                        <div class="row">
                            <div class="col-lg-4 col-sm-4 label ">Last Modified: </div>
                            <div class="col-lg-8 col-sm-8">
                                {{ _dateFormat($user->updated_at, 'd M, Y ') }}
                                <span class="text-secondary">
                                    ({{ $user->updated_at->diffForHumans() }})
                                </span>
                            </div>
                        </div>
                        <!-- /.row -->


                        <div class="row">
                            <div class="col-lg-4 col-sm-4 label ">Status: </div>
                            <div class="col-lg-8 col-sm-8">
                                <x-status-badge-component :status="$user->status" />
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg-4 col-sm-4 label ">Profile Picture: </div>
                            <div class="col-lg-8 col-sm-8">
                                <img class="profilePicture" src="{{ Vite::asset($avatar) }}"
                                    alt="avatar_{{ $user->name }}">
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.modal-body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <!-- /.modal-footer -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
