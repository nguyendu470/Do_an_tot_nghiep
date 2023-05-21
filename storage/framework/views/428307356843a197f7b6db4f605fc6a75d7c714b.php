<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/owl-carousel2/owl.carousel.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    
    <?php if(!empty($heroSectionData)): ?>
        <?php if(!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == '1'): ?>
            <?php $__env->startPush('scripts_bottom'); ?>
                <script src="/assets/default/vendors/lottie/lottie-player.js"></script>
            <?php $__env->stopPush(); ?>
        <?php endif; ?>

        <section class="slider-container  <?php echo e($heroSection == '2' ? 'slider-hero-section2' : ''); ?>"
            style="background-image: url('<?php echo e($heroSectionData['hero_background']); ?>')">

            <?php if($heroSection == '1'): ?>
                <div class="mask"></div>
            <?php endif; ?>

            <div class="container user-select-none">

                <?php if($heroSection == '2'): ?>
                    
                <?php else: ?>
                    
                    <div class="text-center slider-content">
                        <h1>Chào Mừng Đến Với EduChamp</h1>
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-12 col-md-9 col-lg-7">
                                <p class="mt-30 slide-hint">EduChamp là một nền tảng học trực tuyến với nhiều khóa học đa
                                    dạng khác nhau, giúp bạn phát triển hơn cả mong đợi.</p>
                                <p class="mt-30 slide-hint">Còn chờ gì nữa hãy đến với Educhamp nào!</p>

                                <form action="/search" method="get" class="d-inline-flex mt-30 mt-lg-50 w-100">
                                    <div class="form-group d-flex align-items-center m-0 slider-search p-10 bg-white w-100">
                                        <input type="text" name="search" class="form-control border-0 mr-lg-50"
                                            placeholder="<?php echo e(trans('home.slider_search_placeholder')); ?>" />
                                        <button type="submit"
                                            class="btn btn-primary rounded-pill"><?php echo e(trans('home.find')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    
    

    
    

    
    

    
    

    
    
    

    
    

    
    <?php if(!empty($latestWebinars) and !$latestWebinars->isEmpty()): ?>
        <section class="home-sections home-sections-swiper container">
            <div class="d-flex justify-content-between ">
                <div>
                    <h2 class="section-title"><?php echo e(trans('home.latest_classes')); ?></h2>
                    <p class="section-hint"><?php echo e(trans('home.latest_webinars_hint')); ?></p>
                </div>

                <a href="/classes?sort=newest" class="btn btn-border-white"><?php echo e(trans('home.view_all')); ?></a>
            </div>

            <div class="mt-10 position-relative">
                <div class="swiper-container latest-webinars-swiper px-12">
                    <div class="swiper-wrapper py-20">
                        <?php $__currentLoopData = $latestWebinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestWebinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <?php echo $__env->make('web.default.includes.webinar.grid-card', [
                                    'webinar' => $latestWebinar,
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="swiper-pagination latest-webinars-swiper-pagination"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    
    

    
    

    
    <?php if(!empty($advertisingBanners1) and count($advertisingBanners1)): ?>
        <div class="home-sections container">
            <div class="row">
                <?php $__currentLoopData = $advertisingBanners1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-<?php echo e($banner1->size); ?>">
                        <a href="#">
                            <img src="<?php echo e($banner1->image); ?>" class="img-cover rounded-sm" alt="<?php echo e($banner1->title); ?>">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    

    
    

    
    

    
    <?php if(!empty($freeWebinars) and !$freeWebinars->isEmpty()): ?>
        <section class="home-sections home-sections-swiper container">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title"><?php echo e(trans('home.free_classes')); ?></h2>
                    <p class="section-hint"><?php echo e(trans('home.free_classes_hint')); ?></p>
                </div>

                <a href="/classes?free=on" class="btn btn-border-white"><?php echo e(trans('home.view_all')); ?></a>
            </div>

            <div class="mt-10 position-relative">
                <div class="swiper-container free-webinars-swiper px-12">
                    <div class="swiper-wrapper py-20">

                        <?php $__currentLoopData = $freeWebinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freeWebinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <?php echo $__env->make('web.default.includes.webinar.grid-card', [
                                    'webinar' => $freeWebinar,
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="swiper-pagination free-webinars-swiper-pagination"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    
    

    
    

    
    

    
    

    
    <?php if(!empty($advertisingBanners2) and count($advertisingBanners2)): ?>
        <div class="home-sections container">
            <div class="row">
                <?php $__currentLoopData = $advertisingBanners2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-<?php echo e($banner2->size); ?>">
                        <a href="#">
                            <img src="<?php echo e($banner2->image); ?>" class="img-cover rounded-sm" alt="<?php echo e($banner2->title); ?>">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    

    
    

    
    <?php if(!empty($blog) and !$blog->isEmpty()): ?>
        <section class="home-sections container">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title"><?php echo e(trans('home.blog')); ?></h2>
                    <p class="section-hint"><?php echo e(trans('home.blog_hint')); ?></p>
                </div>

                <a href="/blog" class="btn btn-border-white"><?php echo e(trans('home.all_blog')); ?></a>
            </div>

            <div class="row mt-35">

                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0">
                        <?php echo $__env->make('web.default.blog.grid-list', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/default/vendors/owl-carousel2/owl.carousel.min.js"></script>
    <script src="/assets/default/vendors/parallax/parallax.min.js"></script>
    <script src="/assets/default/js/parts/home.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() . '.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/web/default/pages/home.blade.php ENDPATH**/ ?>