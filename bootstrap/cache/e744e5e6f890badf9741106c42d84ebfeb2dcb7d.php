<?php $__env->startSection("title","Product Edit Page"); ?>

<?php $__env->startSection("content"); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make("layout.admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-8">
            <?php echo $__env->make("layout.report_message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Form Start -->
            <form class="table-bordered p-3" action="/E-commerce/public/admin/product/<?php echo e($product->id); ?>/edit" method="post" enctype="multipart/form-data">
                <h3 class="text-center english text-info">Create Product</h3> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($product->name); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="number" step="any" class="form-control" id="price" name="price" value="<?php echo e($product->price); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select class="form-control" id="cat_id" name="cat_id">
                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php echo $cat->id == $product->cat_id ? 'selected' : '' ?>><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_cat_id">Sub Category</label>
                            <select class="form-control" id="sub_cat_id" name="sub_cat_id">
                                <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php echo $cat->id == $product->sub_cat_id ? 'selected' : '' ?>><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="form-group">
                        <label for="file">File input</label>
                        <input type="file" class="form-control-file bg-dark text-white" id="file" name="file">
                    </div>

                    <input type="hidden" name="old_image" value="<?php echo e($product->image); ?>">

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">
                            <?php echo e($product->description); ?>

                        </textarea>
                    </div>

                    <input type="hidden" name="token" value="<?php echo e(app\classes\CSRFtoken::_token()); ?>">

                    <div class="row justify-content-end no-gutters">
                        <button type="rest" class="btn btn-outline-secondary btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm ml-1">Update</button>
                    </div>
                </form>
            </form>
            <!-- Form End -->
        </div>
    </div>
</div>









<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>