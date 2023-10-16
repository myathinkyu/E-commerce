<?php $__env->startSection('title','Category Create'); ?>

<?php $__env->startSection('content'); ?> 
    <div class="container my-5">
        <h3 class="text-primary text-center english">Create Category</h3>
        <div class="col-md-8 offset-md-2">
        <!-- form start -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="english">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="file" class="file">File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <div class="row justify-content-end no-gutters mt-2">
                    <button type="submit" class="btn btn-primary btn-sm english">Create</button>
                </div>
            </form>
        <!-- form end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>



 
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>