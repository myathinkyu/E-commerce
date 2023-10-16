<?php $__env->startSection("title","hello"); ?>

<?php $__env->startSection('content'); ?>

<h4>Welcome from E-commerce</h4>
<img src="<?php echo URL_ROOT . '/assets/images/projectlogo.png' ?>" alt="">

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>