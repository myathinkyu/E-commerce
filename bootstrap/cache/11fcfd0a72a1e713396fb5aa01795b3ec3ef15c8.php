<?php $__env->startSection("title","User Register"); ?>

<?php $__env->startSection("content"); ?>

<div class="container my-5">
    <div class="col-md-8 offset-md-2">
        <h3 class="mb-5 text-center text-info english">User Register</h3>
        <?php if(\app\classes\session::has("error_message")): ?>
            <?php echo e(\app\classes\session::flash("error_message")); ?>

        <?php endif; ?>
        <form action="/E-commerce/public/user/register" method="post">
            <input type="hidden" name="token" value="<?php echo e(\app\classes\CSRFtoken::_token()); ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" required>  
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>  
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>  
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>  
            </div>
            <div class="row no-gutters justify-content-between">
                <a href="/E-commerce/public/user/login">Already Register! Please login Here!</a>
                <span>
                    <button class="btn btn-outline-warning btn-sm">Cancel</button>
                    <button class="btn btn-primary btn-sm">Register</button>
                </span>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>