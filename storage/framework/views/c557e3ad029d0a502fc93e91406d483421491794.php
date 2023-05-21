    <div style="display: none;">
        <form action="<?php echo e($endpoint); ?>" id="payment_form" method="POST">
            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>
    </div>

    <script>
        document.getElementById('payment_form').submit();
    </script><?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\storage\framework\views/55313886b2c966699c293babdb5278b50c3781cc.blade.php ENDPATH**/ ?>