<div class="card">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="text-center">
                <h3 class="text-muted">Admin Login</h3>
            </div>
            <div class="form-body">
                <form class="row g-3" autocomplete="off" wire:submit.prevent="login_process">
                    <div class="col-12">
                        <label for="email" class="form-label">
                            <i class="bx bxs-envelope"></i>
                            {{ __('Email Address') }}
                        </label>
                        <input wire:model.lazy="email" type="text" class="form-control" id="email"
                            placeholder="{{ __('Enter your email address') }}">
                    </div>
                    <!-- /.col -->

                    <div class="col-12">
                        <label for="password" class="form-label">
                            <i class="bx bxs-lock-alt"></i>
                            {{ __('Enter Password') }}
                        </label>
                        <div class="input-group" id="show_hide_password">
                            <input wire:model.lazy="password" type="password" class="form-control border-end-0"
                                id="password" value="12345678" placeholder="{{ __('Enter your password') }}">
                            <a href="javascript:void(0)" class="input-group-text bg-transparent">
                                <i class='bx bx-hide'></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="remeber_me" checked>
                            <label class="form-check-label" for="remeber_me">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bxs-lock-open"></i>
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <!-- /.col -->

                </form>
                <!-- /.row -->
            </div>
            <!-- /.border -->
        </div>
        <!-- /.border -->
    </div>
    <!-- /.card -->
</div>
<!-- /.card -->
