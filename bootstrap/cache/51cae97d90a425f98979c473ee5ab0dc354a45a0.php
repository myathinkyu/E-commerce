<?php $__env->startSection('title','Category Create'); ?>

<?php $__env->startSection('content'); ?> 
    <div class="container my-5">
        <h3 class="text-primary text-center english">Create Category</h3>
        
        <!-- <?php if(\app\classes\session::has("error")): ?>
            <?php echo e(\app\classes\session::flash("error")); ?>

        <?php endif; ?> -->

        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make("layout.admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-md-8">
            <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="english">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <input type="hidden" name="token" value="<?php echo e(\app\classes\CSRFtoken::_token()); ?>">
                    <div class="row justify-content-end no-gutters mt-2">
                        <button type="submit" class="btn btn-primary btn-sm english">Create</button>
                    </div>
                </form>
            <!-- form end -->
                <ul class="list-group mt-5">
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="/E-commerce/public/admin/category/all"><?php echo e($cat->name); ?></a>
                            <span class="float-right">
                                <i class="fa fa-edit text-warning"></i>
                                <i class="fa fa-trash text-danger"></i>
                            </span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



 
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>