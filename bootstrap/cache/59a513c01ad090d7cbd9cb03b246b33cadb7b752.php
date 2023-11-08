<?php $__env->startSection("title","ALFREDO"); ?>

<?php $__env->startSection('content'); ?>
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
<h3 class="text-info">Most Popular</h3>
    <div class="row">
        <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header"><?php echo e($product->name); ?></div>
                <div class="card-block text-center">
                    <img src="<?php echo e($product->image); ?>" alt=""  width="120px" height="150px">
                </div>
                <div class="card-footer">
                    <div class="row justify-content-between">
                        <a href="/E-commerce/public/product/<?php echo e($product->id); ?>/detail" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <span>$<?php echo e($product->price); ?></span>
                        <button class="btn btn-info btn-sm" onclick="addToCart('<?php echo e($product->id); ?>')">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <h3 class="text-info">All Products</h3>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header"><?php echo e($product->name); ?></div>
                <div class="card-block text-center">
                    <img src="<?php echo e($product->image); ?>" alt="" width="120px" height="150px">
                </div>
                <div class="card-footer">
                    <div class="row justify-content-between">    
                        <a href="/E-commerce/public/product/<?php echo e($product->id); ?>/detail" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <span>$<?php echo e($product->price); ?></span>
                        <button class="btn btn-info btn-sm" onclick="addToCart('<?php echo e($product->id); ?>')">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-2 offset-md-4">
            <?php echo $pages; ?>

    </div>


</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>