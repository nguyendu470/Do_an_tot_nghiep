<?php $__env->startSection('content'); ?>
    <link href="/assets/vendors/plyr/plyr.css" rel="stylesheet" />
    <section class="cart-banner position-relative text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">

                    <h1 class="font-30 text-white font-weight-bold"><?php echo e($files->title); ?></h1>

                    <div class="mt-20 font-16 font-weight-500 text-white">
                        <span><?php echo e(trans('product.course')); ?>: <a href="<?php echo e($course->getUrl()); ?>"
                                class="font-16 font-weight-500 text-white text-decoration-underline"><?php echo e($course->title); ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-10 mt-md-40">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="post-show mt-30">
                    <?php if($files->storage == 'online' && $files->file_type == 'video'): ?>
                        <div class="plyr__video-embed" id="player">
                            <iframe height="500"
                                src="<?php echo e($files->file); ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div>
                    <?php elseif($files->storage == 'local'): ?>
                        <?php if($files->file_type == 'mp4'): ?>
                            <video id="player" playsinline controls>
                                <source src="<?php echo e(url($files->file)); ?>" type="video/mp4">
                            </video>
                        <?php elseif($files->file_type == 'webm'): ?>
                            <video id="player" playsinline controls>
                                <source src="<?php echo e(url($file->file)); ?>" type="video/webm">
                            </video>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                
                <div class="mt-30 row align-items-center">
                    

                    
                    
                </div>
            </div>

            <div class="col-12 col-lg-4">

                
                

                
                <?php if(!empty($course->files) and count($course->files)): ?>
                    <div class="shadow-sm rounded-lg bg-white px-15 px-md-25 py-20 mt-30">
                        <h3 class="category-filter-title font-16 font-weight-bold text-dark-blue">
                            <?php echo e(trans('public.course_sessions')); ?></h3>

                        <div class="p-0 m-0 pt-10">
                            <?php $__currentLoopData = $course->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($lesson->id); ?>/watch"
                                    class="d-block mt-10 px-10 py-15 rounded font-14 font-weight-500 text-ellipsis <?php if($lesson->id == $files->id): ?> bg-primary text-white <?php else: ?> bg-info-lighter text-dark-blue <?php endif; ?>">
                                    <?php echo e($loop->iteration . '- ' . $lesson->title); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var learningToggleLangSuccess = '<?php echo e(trans('public.course_learning_change_status_success')); ?>';
        var learningToggleLangError = '<?php echo e(trans('public.course_learning_change_status_error')); ?>';
    </script>

    <script src="/assets/default/js/parts/text_lesson.min.js"></script>
    <script src="/assets/vendors/plyr/plyr.js"></script>
    <script>
        const player = new Plyr('#player');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() . '.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/web/default/course/files_lesson.blade.php ENDPATH**/ ?>