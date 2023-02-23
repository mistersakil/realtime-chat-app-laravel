<div class="chat-wrapper">
    <div class="chat-sidebar">
        <div class="chat-sidebar-header">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-2">
                    <h6 class="mb-0">Chat List</h6>
                </div>
                <div class="dropdown">
                    <div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;">Settings</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Help &amp;
                            Feedback</a>
                        <a class="dropdown-item" href="javascript:;">Enable Split View Mode</a>
                    </div>
                </div>
            </div>
            <div class="mb-3"></div>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-transparent">
                    <i class="bx bx-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="People, groups, &amp; messages">
                <span class="input-group-text bg-transparent">
                    <i class="bx bx-dialpad"></i>
                </span>
            </div>
            <!-- /.input-group -->
        </div>
        <!-- /.chat-sidebar-header -->
        <div class="chat-sidebar-content">
            <div class="chat-list ps ps--active-y">
                <livewire:backend.chat.chat-list />
            </div>
            <!-- /.chat-list -->
        </div>
        <!-- /.chat-sidebar-content -->
    </div>
    <!-- /.chat-sidebar -->
    <div class="chat-header d-flex align-items-center">
        <div class="chat-toggle-btn"><i class="bx bx-menu-alt-left"></i>
        </div>
        <div>
            <h4 class="mb-1 font-weight-bold">Harvey Inspector</h4>
            <div class="list-inline d-sm-flex mb-0 d-none"> <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><small class="bx bxs-circle me-1 chart-online"></small>Active Now</a>
                <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">|</a>
                <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><i class="bx bx-images me-1"></i>Gallery</a>
                <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">|</a>
                <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><i class="bx bx-search me-1"></i>Find</a>
            </div>
        </div>
        <div class="chat-top-header-menu ms-auto"> <a href="javascript:;"><i class="bx bx-video"></i></a>
            <a href="javascript:;"><i class="bx bx-phone"></i></a>
            <a href="javascript:;"><i class="bx bx-user-plus"></i></a>
        </div>
    </div>
    <div class="chat-content ps ps--active-y">
        <div class="chat-content-leftside">
            <div class="d-flex">
                <img src="{{ Vite::image('avatar-1.png') }}" width="48" height="48" class="rounded-circle" alt="">
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0 chat-time">Harvey, 2:35 PM</p>
                    <p class="chat-left-msg">Hi, harvey where are you now a days?</p>
                </div>
            </div>
        </div>
        <div class="chat-content-rightside">
            <div class="d-flex ms-auto">
                <div class="flex-grow-1 me-2">
                    <p class="mb-0 chat-time text-end">you, 2:37 PM</p>
                    <p class="chat-right-msg">I am in USA</p>
                </div>
            </div>
        </div>
        <div class="chat-content-leftside">
            <div class="d-flex">
                <img src="{{ Vite::image('avatar-1.png') }}" width="48" height="48" class="rounded-circle" alt="">
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0 chat-time">Harvey, 2:48 PM</p>
                    <p class="chat-left-msg">okk, what about admin template?</p>
                </div>
            </div>
        </div>
        <div class="chat-content-rightside">
            <div class="d-flex">
                <div class="flex-grow-1 me-2">
                    <p class="mb-0 chat-time text-end">you, 2:49 PM</p>
                    <p class="chat-right-msg">i have already purchased the admin template</p>
                </div>
            </div>
        </div>
        <div class="chat-content-leftside">
            <div class="d-flex">
                <img src="{{ Vite::image('avatar-1.png') }}" width="48" height="48" class="rounded-circle" alt="">
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0 chat-time">Harvey, 3:12 PM</p>
                    <p class="chat-left-msg">ohhk, great, which admin template you have purchased?</p>
                </div>
            </div>
        </div>
        <div class="chat-content-rightside">
            <div class="d-flex">
                <div class="flex-grow-1 me-2">
                    <p class="mb-0 chat-time text-end">you, 3:14 PM</p>
                    <p class="chat-right-msg">i purchased dashtreme admin template from themeforest. it is very good
                        product for web application</p>
                </div>
            </div>
        </div>
        <div class="chat-content-leftside">
            <div class="d-flex">
                <img src="{{ Vite::image('avatar-1.png') }}" width="48" height="48" class="rounded-circle" alt="">
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0 chat-time">Harvey, 3:16 PM</p>
                    <p class="chat-left-msg">who is the author of this template?</p>
                </div>
            </div>
        </div>
        <div class="chat-content-rightside">
            <div class="d-flex">
                <div class="flex-grow-1 me-2">
                    <p class="mb-0 chat-time text-end">you, 3:22 PM</p>
                    <p class="chat-right-msg">codervent is the author of this admin template</p>
                </div>
            </div>
        </div>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 520px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 235px;"></div>
        </div>
    </div>
    <div class="chat-footer d-flex align-items-center">
        <div class="flex-grow-1 pe-2">
            <div class="input-group"> <span class="input-group-text"><i class="bx bx-smile"></i></span>
                <input type="text" class="form-control" placeholder="Type a message">
            </div>
        </div>
        <div class="chat-footer-menu"> <a href="javascript:;"><i class="bx bx-file"></i></a>
            <a href="javascript:;"><i class="bx bxs-contact"></i></a>
            <a href="javascript:;"><i class="bx bx-microphone"></i></a>
            <a href="javascript:;"><i class="bx bx-dots-horizontal-rounded"></i></a>
        </div>
    </div>
    <!-- /.chat-footer -->
    <div class="overlay chat-toggle-btn-mobile"></div>
    <!--end chat overlay-->
</div>
<!-- /.chat-wrapper -->

@push('dynamic_js')
<script type="module">
    new PerfectScrollbar('.chat-list');
    new PerfectScrollbar('.chat-content');
</script>
@endpush