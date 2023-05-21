<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.students')); ?> <?php echo e(trans('admin/main.list')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a><?php echo e(trans('admin/main.students')); ?></a></div>
                <div class="breadcrumb-item"><a href="#"><?php echo e(trans('admin/main.users_list')); ?></a></div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_students')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalStudents); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-briefcase"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.organizations_students')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalOrganizationsStudents); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-info-circle"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.inactive_students')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($inactiveStudents); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-ban"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.ban_students')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($banStudents); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="card">
            <div class="card-body">
                <form method="get" class="mb-0">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                <input name="full_name" type="text" class="form-control" value="<?php echo e(request()->get('full_name')); ?>">
                            </div>
                        </div>

                        
                        


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                <select name="sort" data-plugin-selectTwo class="form-control populate">
                                    <option value=""><?php echo e(trans('admin/main.filter_type')); ?></option>
                                    <option value="purchased_classes_asc" <?php if(request()->get('sort') == 'purchased_classes_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_classes_ascending')); ?></option>
                                    <option value="purchased_classes_desc" <?php if(request()->get('sort') == 'purchased_classes_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_classes_descending')); ?></option>

                                    <option value="purchased_classes_amount_asc" <?php if(request()->get('sort') == 'purchased_classes_amount_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_classes_amount_ascending')); ?></option>
                                    <option value="purchased_classes_amount_desc" <?php if(request()->get('sort') == 'purchased_classes_amount_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_classes_amount_descending')); ?></option>


                                    <option value="purchased_appointments_asc" <?php if(request()->get('sort') == 'purchased_appointments_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_appointments_ascending')); ?></option>
                                    <option value="purchased_appointments_desc" <?php if(request()->get('sort') == 'purchased_appointments_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_appointments_descending')); ?></option>

                                    <option value="purchased_appointments_amount_asc" <?php if(request()->get('sort') == 'purchased_appointments_amount_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_appointments_amount_ascending')); ?></option>
                                    <option value="purchased_appointments_amount_desc" <?php if(request()->get('sort') == 'purchased_appointments_amount_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.purchased_appointments_amount_descending')); ?></option>

                                    <option value="register_asc" <?php if(request()->get('sort') == 'register_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.register_date_ascending')); ?></option>
                                    <option value="register_desc" <?php if(request()->get('sort') == 'register_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.register_date_descending')); ?></option>
                                </select>
                            </div>
                        </div>


                        

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.users_group')); ?></label>
                                <select name="group_id" data-plugin-selectTwo class="form-control populate">
                                    <option value=""><?php echo e(trans('admin/main.select_users_group')); ?></option>
                                    <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($userGroup->id); ?>" <?php if(request()->get('group_id') == $userGroup->id): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                        

                        <div class="col-md-3">
                            <div class="form-group mt-1">
                                <label class="input-label mb-4"> </label>
                                <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <div class="card">
        
        

        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-striped font-14">
                    <tr>
                        <th>ID</th>
                        <th><?php echo e(trans('admin/main.name')); ?></th>
                        
                        
                        
                        <th><?php echo e(trans('admin/main.user_group')); ?></th>
                        <th><?php echo e(trans('admin/main.register_date')); ?></th>
                        <th><?php echo e(trans('admin/main.status')); ?></th>
                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td class="text-left">
                                <div class="d-flex align-items-center">
                                    <figure class="avatar mr-2">
                                        <img src="<?php echo e($user->getAvatar()); ?>" alt="<?php echo e($user->full_name); ?>">
                                    </figure>
                                    <div class="media-body ml-1">
                                        <div class="mt-0 mb-1 font-weight-bold"><?php echo e($user->full_name); ?></div>

                                        <?php if($user->mobile): ?>
                                            <div class="text-primary text-small font-600-bold"><?php echo e($user->mobile); ?></div>
                                        <?php endif; ?>

                                        <?php if($user->email): ?>
                                            <div class="text-primary text-small font-600-bold"><?php echo e($user->email); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>

                            

                            

                            

                            <td>
                                <?php echo e(!empty($user->userGroup) ? $user->userGroup->group->name : ''); ?>

                            </td>

                            <td><?php echo e(dateTimeFormat($user->created_at, 'Y/m/j - H:i')); ?></td>

                            <td>
                                <?php if($user->ban and !empty($user->ban_end_at) and $user->ban_end_at > time()): ?>
                                    <div class="mt-0 mb-1 font-weight-bold text-danger"><?php echo e(trans('admin/main.ban')); ?></div>
                                    <div class="text-small font-600-bold">Until <?php echo e(dateTimeFormat($user->ban_end_at, 'Y/m/j')); ?></div>
                                <?php else: ?>
                                    <div class="mt-0 mb-1 font-weight-bold <?php echo e(($user->status == 'active') ? 'text-success' : 'text-warning'); ?>"><?php echo e(trans('admin/main.'.$user->status)); ?></div>
                                <?php endif; ?>
                            </td>

                            <td class="text-center mb-2" width="120">
                                
                                

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                    <a href="/admin/users/<?php echo e($user->id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_delete')): ?>
                                    <?php echo $__env->make('admin.includes.delete_button',['url' => '/admin/users/'.$user->id.'/delete' , 'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <?php echo e($users->links()); ?>

        </div>
    </div>

    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/admin/users/students.blade.php ENDPATH**/ ?>