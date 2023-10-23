<?php $__env->startSection("title","Product Home Page"); ?>

<?php $__env->startSection("content"); ?>
<style>
    .pagination > li {
        padding: 5px 15px;
        background: #ddd;
        margin-right: 1px;
    }

    #edit-cat{
        cursor: pointer;
    }
</style>
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make("layout.admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-8">
            <?php if(\app\classes\Session::has("product_insert_success")): ?>
            <?php echo e(\app\classes\Session::flash("product_insert_success")); ?>

            <?php endif; ?>

            <!-- Table Start -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-muted">
                            <th><?php echo e($product->id); ?></th>
                            <td><img src="<?php echo e($product->image); ?>" style="max-width:100px; max-height:150px"></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->price); ?></td>
                            
                            <td>
                                <i class="fa fa-edit text-warning"></i>
                                <i class="fa fa-trash text-danger"></i>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <!-- Table End -->

            <div class="mt-2 offset-md-4">
                <?php echo $pages; ?>

            </div>
        </div>
    </div>
</div>
                








<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>