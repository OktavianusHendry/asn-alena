<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

    >

    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Anagata Sisedu Nusantara | Forgot Password</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
        <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="../assets/css/demo.css" />
        <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
        <script src="../assets/vendor/js/helpers.js"></script>
        <script src="../assets/js/config.js"></script>
    </head>

    <body>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">

                            <h4 class="mb-2">Reset Password 🔒</h4>
                            <p class="mb-4">Masukkan email Anda untuk mengatur ulang kata sandi.</p>

                            <!-- Validation Errors -->
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form id="formAuthentication" class="mb-3" method="POST"
                                action="<?php echo e(route('password.update')); ?>">
                                <?php echo csrf_field(); ?>

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Enter your email" value="<?php echo e(old('email', $request->email)); ?>"
                                        required autofocus />
                                </div>

                                <!-- New Password -->
                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password" type="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                required>
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                </div>


                                <!-- Confirm Password -->
                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                required>
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
                                            <?php if($errors->has('password')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary d-grid w-100">Reset Password</button>
                            </form>

                            <div class="text-center">
                                <a href="<?php echo e(route('login')); ?>" class="d-flex align-items-center justify-content-center">
                                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                    Kembali ke Login
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Card -->
                </div>
            </div>
        </div>

        <!-- Core JS -->
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/libs/popper/popper.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../assets/vendor/js/menu.js"></script>
        <script src="../assets/js/main.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>

</html>
<?php /**PATH C:\xampp\htdocs\Aplikasi_Manajemen_Kantor_v.1.4\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>