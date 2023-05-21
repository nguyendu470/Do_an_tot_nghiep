
<?php if($course->description): ?>
    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('product.Webinar_description')); ?></h2>
        <div class="mt-15 course-description">
            <?php echo clean($course->description); ?>

        </div>
    </div>
<?php endif; ?>










 
<?php echo $__env->make('web.default.includes.comments',[
        'comments' => $course->comments,
        'inputName' => 'webinar_id',
        'inputValue' => $course->id
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/web/default/course/tabs/information.blade.php ENDPATH**/ ?>