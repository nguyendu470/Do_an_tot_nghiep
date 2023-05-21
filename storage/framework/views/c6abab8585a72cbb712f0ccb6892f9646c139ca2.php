<?php $__env->startSection('content'); ?>


    <?php if(!empty($order) && $order->status === \App\Models\Order::$paid): ?>
        <div class="no-result default-no-result my-50 d-flex align-items-center justify-content-center flex-column">
            <div class="no-result-logo">
                <img src="/assets/default/img/no-results/search.png" alt="">
            </div>
            <div class="d-flex align-items-center flex-column mt-30 text-center">
                <h2><?php echo e(trans('cart.success_pay_title')); ?></h2>
                <p class="mt-5 text-center"><?php echo trans('cart.success_pay_msg'); ?></p>
                <a href="/panel" class="btn btn-sm btn-primary mt-20"><?php echo e(trans('public.my_panel')); ?></a>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($order) && $order->status === \App\Models\Order::$fail): ?>
        <div class="no-result status-failed my-50 d-flex align-items-center justify-content-center flex-column">
            <div class="no-result-logo">
                <img src="/assets/default/img/no-results/failed_pay.png" alt="">
            </div>
            <div class="d-flex align-items-center flex-column mt-30 text-center">
                <h2><?php echo e(trans('cart.failed_pay_title')); ?></h2>
                <p class="mt-5 text-center"><?php echo nl2br(trans('cart.failed_pay_msg')); ?></p>
                <a href="/panel" class="btn btn-sm btn-primary mt-20"><?php echo e(trans('public.my_panel')); ?></a>
            </div>
        </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Nguyen Du\Downloads\backup-vnedumall.com-07.18.2022_02-32-41\public_html\old\resources\views/web/default/cart/status_pay.blade.php ENDPATH**/ ?>