<?php $__env->startSection("content"); ?>
<section>
    <h1>Esto es un pequeño render</h1>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>