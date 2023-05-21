<?php $__env->startSection('content'); ?>
    <link href="/assets/vendors/plyr/plyr.css" rel="stylesheet"/>
    <section class="cart-banner position-relative text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">

                    <h1 class="font-30 text-white font-weight-bold"><?php echo e($files->title); ?></h1>

                    <div class="mt-20 font-16 font-weight-500 text-white">
                        <span><?php echo e(trans('product.course')); ?>: <a href="<?php echo e($course->getUrl()); ?>" class="font-16 font-weight-500 text-white text-decoration-underline"><?php echo e($course->title); ?></a></span>
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
                        <iframe height="500" src="<?php echo e($files->file); ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                    </div>
                    <?php elseif($files->storage == 'local'): ?>
                        <?php if($files->file_type == 'mp4'): ?>
                        <video id="player" playsinline controls>
                            <source src="<?php echo e(url($file->file)); ?>" type="video/mp4">
                        </video>
                        <?php elseif($files->file_type == 'webm'): ?>
                        <video id="player" playsinline controls>
                            <source src="<?php echo e(url($file->file)); ?>" type="video/webm">
                        </video>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>


                <div class="mt-30 row align-items-center">
                    <div class="col-12 col-md-5">
                        <?php if(auth()->check()): ?>
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer font-weight-500" for="readLessonSwitch"><?php echo e(trans('public.i_passed_this_lesson')); ?></label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" id="fileReadToggle<?php echo e($files->id); ?>" data-file-id="<?php echo e($files->id); ?>" value="<?php echo e($course->id); ?>" class="js-file-learning-toggle custom-control-input" <?php if(!empty($files->learningStatus)): ?> checked <?php endif; ?>>
                                    <label class="custom-control-label" for="fileReadToggle<?php echo e($files->id); ?>"></label>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-md-7 text-right">
                        <?php if(!empty($course->files) and count($course->files)): ?>
                            <a href="<?php echo e((!empty($previousLesson)) ? $course->getUrl() .'/lessons/'. $previousLesson->id .'/watch' : '#'); ?>" class="btn btn-sm <?php echo e((!empty($previousLesson)) ? 'btn-primary' : 'btn-gray disabled'); ?>"><?php echo e(trans('public.previous_lesson')); ?></a>

                            <a href="<?php echo e((!empty($nextLesson)) ? $course->getUrl() .'/lessons/'. $nextLesson->id .'/watch' : '#'); ?>" class="btn btn-sm <?php echo e((!empty($nextLesson)) ? 'btn-primary' : 'btn-gray disabled'); ?>"><?php echo e(trans('public.next_lesson')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">

                <div class="rounded-lg shadow-sm mt-35 p-20 course-teacher-card d-flex align-items-center flex-column">
                    <div class="teacher-avatar mt-5">
                        <img src="<?php echo e($course->teacher->getAvatar()); ?>" class="img-cover" alt="<?php echo e($course->teacher->full_name); ?>">
                    </div>
                    <h3 class="mt-10 font-20 font-weight-bold text-secondary"><?php echo e($course->teacher->full_name); ?></h3>
                    <span class="mt-5 font-weight-500 text-gray"><?php echo e(trans('product.product_designer')); ?></span>

                    <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $course->teacher->rates()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="user-reward-badges d-flex align-items-center mt-30">
                        <?php $__currentLoopData = $course->teacher->getBadges(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mr-15" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo (!empty($userBadge->badge_id) ? nl2br($userBadge->badge->description) : nl2br($userBadge->description)); ?>">
                                <img src="<?php echo e(!empty($userBadge->badge_id) ? $userBadge->badge->image : $userBadge->image); ?>" width="32" height="32" alt="<?php echo e(!empty($userBadge->badge_id) ? $userBadge->badge->title : $userBadge->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="mt-25 d-flex flex-row align-items-center justify-content-center w-100">
                        <a href="<?php echo e($course->teacher->getProfileUrl()); ?>" target="_blank" class="btn btn-sm btn-primary teacher-btn-action"><?php echo e(trans('public.profile')); ?></a>

                        <?php if(!empty($course->teacher->hasMeeting())): ?>
                            <a href="<?php echo e($course->teacher->getProfileUrl()); ?>" class="btn btn-sm btn-primary teacher-btn-action ml-15"><?php echo e(trans('public.book_a_meeting')); ?></a>
                        <?php else: ?>
                            <button type="button" class="btn btn-sm btn-primary disabled teacher-btn-action ml-15"><?php echo e(trans('public.book_a_meeting')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if(!empty($course->files) and count($course->files)): ?>
                    <div class="shadow-sm rounded-lg bg-white px-15 px-md-25 py-20 mt-30">
                        <h3 class="category-filter-title font-16 font-weight-bold text-dark-blue"><?php echo e(trans('public.course_sessions')); ?></h3>

                        <div class="p-0 m-0 pt-10">
                            <?php $__currentLoopData = $course->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($lesson->id); ?>/watch"
                                   class="d-block mt-10 px-10 py-15 rounded font-14 font-weight-500 text-ellipsis <?php if($lesson->id == $files->id): ?> bg-primary text-white <?php else: ?> bg-info-lighter text-dark-blue <?php endif; ?>">
                                    <?php echo e($loop->iteration .'- '. $lesson->title); ?>

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
    <script>const player = new Plyr('#player');</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Nguyen Du\Downloads\backup-vnedumall.com-07.18.2022_02-32-41\public_html\old\resources\views/web/default/course/files_lesson.blade.php ENDPATH**/ ?>