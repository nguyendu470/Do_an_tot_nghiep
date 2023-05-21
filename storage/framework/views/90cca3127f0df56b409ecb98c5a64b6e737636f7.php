<div class="webinar-card">
    <figure>
        <div class="image-box">
            

             <a href="<?php echo e($webinar->getUrl()); ?>">
            <img src="<?php echo e($webinar->getImage()); ?>" class="img-cover" alt="<?php echo e($webinar->title); ?>" >
             </a>

            <?php if($webinar->type == 'webinar'): ?>
                <div class="progress">
                    <span class="progress-bar" style="width: <?php echo e($webinar->getProgress()); ?>%"></span>
                </div>

                <a href="<?php echo e($webinar->addToCalendarLink()); ?>" target="_blank" class="webinar-notify d-flex align-items-center justify-content-center">
                    <i data-feather="bell" width="20" height="20" class="webinar-icon"></i>
                </a>
            <?php endif; ?>
        </div>

        <figcaption class="webinar-card-body">
            
            

            <a href="<?php echo e($webinar->getUrl()); ?>">
                <h3 class="mt-15 webinar-title font-weight-bold font-16 text-dark-blue"><?php echo e(clean($webinar->title,'title')); ?></h3>
            </a>

            <?php if(!empty($webinar->category)): ?>
                <span class="d-block font-14 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($webinar->category->getUrl()); ?>" target="_blank" class="text-decoration-underline"><?php echo e($webinar->category->title); ?></a></span>
            <?php endif; ?>

            <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $webinar->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="d-flex justify-content-between mt-20">
                <div class="d-flex align-items-center">
                    <i data-feather="clock" width="20" height="20" class="webinar-icon"></i>
                    <span class="duration font-14 ml-5"><?php echo e(convertMinutesToHourAndMinute($webinar->duration)); ?> <?php echo e(trans('home.hours')); ?></span>
                </div>

                <div class="vertical-line mx-15"></div>

                <div class="d-flex align-items-center">
                    <i data-feather="calendar" width="20" height="20" class="webinar-icon"></i>
                    <span class="date-published font-14 ml-5"><?php echo e(dateTimeFormat(!empty($webinar->start_date) ? $webinar->start_date : $webinar->created_at,'j F Y')); ?></span>
                </div>
            </div>

            <div class="webinar-price-box mt-25">
                <?php if(!empty($webinar->price) and $webinar->price > 0): ?>
                    <?php if($webinar->bestTicket() < $webinar->price): ?>
                        <span class="real"><?php echo e(number_format($webinar->bestTicket(),0,",",".")); ?><?php echo e($currency); ?></span>
                        <span class="off ml-10"><?php echo e(number_format($webinar->price,0,",",".")); ?><?php echo e($currency); ?></span>
                    <?php else: ?>
                        <span class="real"><?php echo e(number_format($webinar->price,0,",",".")); ?><?php echo e($currency); ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="real font-14"><?php echo e(trans('public.free')); ?></span>
                <?php endif; ?>
            </div>
        </figcaption>
    </figure>
</div>
<?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/web/default/includes/webinar/grid-card.blade.php ENDPATH**/ ?>