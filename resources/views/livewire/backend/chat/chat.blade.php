<div class="chat-wrapper">
    <div class="chat-sidebar">
        <div class="chat-sidebar-header">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-2">
                    <h6 class="mb-0">Chat List</h6>
                </div>
                <div class="dropdown">
                    <div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item"
                            href="javascript:;">Settings</a>
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
    <livewire:backend.chat.chat-header />
    <livewire:backend.chat.chat-content />


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