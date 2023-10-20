<?php $__env->startSection('title','Category Create'); ?>

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
    <h3 class="text-primary text-center english">Create Category</h3>
        
    <!-- <?php if(\app\classes\session::has("error")): ?>
    <?php echo e(\app\classes\session::flash("error")); ?>

    <?php endif; ?> -->

    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make("layout.admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="col-md-8">
            <?php echo $__env->make("layout.report_message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php if(\app\classes\session::has("delete_success")): ?>
                <?php echo e(\app\classes\session::flash("delete_success")); ?>

            <?php endif; ?>
            <?php if(\app\classes\session::has("delete_fail")): ?>
                <?php echo e(\app\classes\session::flash("delete_fail")); ?>

            <?php endif; ?>

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
                            <i class="fa fa-edit text-warning" onclick="fun('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')" id="edit-cat"></i>
                            <a href="/E-commerce/public/admin/category/<?php echo e($cat->id); ?>/delete"><i class="fa fa-trash text-danger"></i></a>
                        </span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="mt-5"></div>
            <?php echo $pages; ?>


        </div>
    </div>
</div>

<!-- Modal Start -->
<div class="modal" id="CatUpdateModel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form>
            <div class="form-group">
                <label for="name" class="english">Category Name</label>
                <input type="text" class="form-control" id="edit-name" >
            </div>
            <input type="hidden" id="edit-token" value="<?php echo e(\app\classes\CSRFtoken::_token()); ?>">
            <input type="hidden" id="edit-id">
            <div class="row justify-content-end no-gutters mt-2">
                <button class="btn btn-primary btn-sm english" onclick="startEdit(event)">Update</button>
            </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        function fun(name, id){
            $("#edit-name").val(name);
            $("#edit-id").val(id);
            //alert("Name is " + name + " ID is "+ id);
            $("#CatUpdateModel") . modal("show");
        }

        function startEdit(e){
            e.preventDefault();
            name = $("#edit-name").val();
            token = $("#edit-token").val();
            id = $("#edit-id").val();

            //console.log("Name is " + name + "<br> Token is " + token + "id is" + id);

            $("#CatUpdateModel") . modal("hide");
            $.ajax({
                type: 'POST',
                url: 'http://localhost/E-commerce/public/admin/category/update',
                data: {
                    name: name,
                    token: token,
                    id: id
                },
                success: function(result){
                    window.location.href="/E-commerce/public/admin/category/create";
                },
                error: function(response){
                    var str = "";
                    var resp = (JSON.parse(response.responseText));
                    alert(resp.name);
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>