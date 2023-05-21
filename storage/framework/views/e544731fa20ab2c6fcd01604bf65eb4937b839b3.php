<?php $__env->startPush('libraries_top'); ?>
    <link rel="stylesheet" href="/assets/admin/vendor/owl.carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/admin/vendor/owl.carousel/owl.theme.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


    <section class="section">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg"
                    data-background="<?php echo e(!empty(getPageBackgroundSettings('admin_dashboard')) ? getPageBackgroundSettings('admin_dashboard') : ''); ?>">
                    <div class="hero-inner">
                        <h2><?php echo e(trans('admin/main.welcome')); ?>, <?php echo e($authUser->full_name); ?>!</h2>

                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_quick_access_links')): ?>
                                <div>
                                    <p class="lead"><?php echo e(trans('admin/main.welcome_card_text')); ?></p>

                                    
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_daily_sales_statistics')): ?>
                    <?php if(!empty($dailySalesTypeStatistics)): ?>
                        <div class="card card-statistic-2">
                            <div class="card-stats">
                                <div class="card-stats-title"><?php echo e(trans('admin/main.daily_sales_type_statistics')); ?></div>

                                <div class="card-stats-items">
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count"><?php echo e($dailySalesTypeStatistics['webinarsSales']); ?>

                                        </div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.live_class')); ?></div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count"><?php echo e($dailySalesTypeStatistics['courseSales']); ?></div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.course')); ?></div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count"><?php echo e($dailySalesTypeStatistics['appointmentSales']); ?>

                                        </div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.appointment')); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(trans('admin/main.today_sales')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e($dailySalesTypeStatistics['allSales']); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_income_statistics')): ?>
                    <?php if(!empty($getIncomeStatistics)): ?>
                        <div class="card card-statistic-2">
                            <div class="card-stats">
                                <div class="card-stats-title"><?php echo e(trans('admin/main.income_statistics')); ?></div>

                                <div class="card-stats-items">
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">
                                            <?php echo e($currency); ?><?php echo e($getIncomeStatistics['todaySales']); ?></div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.today')); ?></div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">
                                            <?php echo e($currency); ?><?php echo e($getIncomeStatistics['monthSales']); ?></div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.this_month')); ?></div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">
                                            <?php echo e($currency); ?><?php echo e($getIncomeStatistics['yearSales']); ?></div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.this_year')); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(trans('admin/main.total_incomes')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e($currency); ?><?php echo e($getIncomeStatistics['totalSales']); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_total_sales_statistics')): ?>
                    <?php if(!empty($getTotalSalesStatistics)): ?>
                        <div class="card card-statistic-2">
                            <div class="card-stats">
                                <div class="card-stats-title"><?php echo e(trans('admin/main.salescount')); ?></div>

                                <div class="card-stats-items">
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count"><?php echo e($getTotalSalesStatistics['todaySales']); ?></div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.today')); ?></div>
                                    </div>
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count"><?php echo e($getTotalSalesStatistics['monthSales']); ?></div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.this_month')); ?></div>
                                    </div>
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count"><?php echo e($getTotalSalesStatistics['yearSales']); ?></div>
                                        <div class="card-stats-item-label"><?php echo e(trans('admin/main.this_year')); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </div>

                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(trans('admin/main.total_sales')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e($getTotalSalesStatistics['totalSales']); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_new_sales')): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="" class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.new_sale')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($getNewSalesCount); ?>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_new_comments')): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="" class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-comment"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.new_comment')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($getNewCommentsCount); ?>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_new_tickets')): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="" class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.new_ticket')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($getNewTicketsCount); ?>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_new_reviews')): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.pending_review_classes')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($getPendingReviewCount); ?>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

        </div>


        <div class="row">
            
            

            
            
        </div>


        <div class="row">

            
            

            
            

            
            
        </div>

        
        
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/chartjs/chart.min.js"></script>
    <script src="/assets/admin/vendor/owl.carousel/owl.carousel.min.js"></script>

    <script src="/assets/admin/js/dashboard.min.js"></script>

    <script>
        (function($) {
            "use strict";

            <?php if(!empty($getMonthAndYearSalesChart)): ?>
                makeStatisticsChart('saleStatisticsChart', saleStatisticsChart, 'Sale', <?php echo json_encode($getMonthAndYearSalesChart['labels'], 15, 512) ?>,
                    <?php echo json_encode($getMonthAndYearSalesChart['data'], 15, 512) ?>);
            <?php endif; ?>

            <?php if(!empty($usersStatisticsChart)): ?>
                makeStatisticsChart('usersStatisticsChart', usersStatisticsChart, 'Users', <?php echo json_encode($usersStatisticsChart['labels'], 15, 512) ?>,
                    <?php echo json_encode($usersStatisticsChart['data'], 15, 512) ?>);
            <?php endif; ?>

        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>