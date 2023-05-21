<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        
        <div class="sidebar-brand">
            <a href="/admin">
                EduChamp admin
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
                <?php if(!empty($generalSettings['site_name'])): ?>
                    <?php echo e(strtoupper(substr($generalSettings['site_name'], 0, 2))); ?>

                <?php endif; ?>
            </a>
        </div>

        <ul class="sidebar-menu">
            
            

            
            


            
            <?php if(
                $authUser->can('admin_webinars') or
                    $authUser->can('admin_categories') or
                    $authUser->can('admin_filters') or
                    $authUser->can('admin_quizzes') or
                    $authUser->can('admin_certificate') or
                    $authUser->can('admin_reviews_lists')): ?>
                <li class="menu-header"><?php echo e(trans('site.education')); ?></li>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars')): ?>
                <li
                    class="nav-item dropdown <?php echo e((request()->is('admin/webinars*') and !request()->is('admin/webinars/comments*')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i>
                        <span><?php echo e(trans('panel.classes')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_list')): ?>
                            
                            <li
                                class="<?php echo e((request()->is('admin/webinars') and request()->get('type') == 'course') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['courses']) and $sidebarBeeps['courses']): ?> beep beep-sidebar <?php endif; ?>"
                                    href="/admin/webinars?type=course">Danh Sách Khóa Học</a>
                            </li>

                            
                            

                            
                            
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_create')): ?>
                            <li class="<?php echo e(request()->is('admin/webinars/create') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/webinars/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories')): ?>
                <li class="nav-item dropdown <?php echo e(request()->is('admin/categories*') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-th"></i>
                        <span><?php echo e(trans('admin/main.categories')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_list')): ?>
                            <li class="<?php echo e(request()->is('admin/categories') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/categories"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_create')): ?>
                            <li class="<?php echo e(request()->is('admin/categories/create') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/categories/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        
                    </ul>
                </li>
            <?php endif; ?>

            
            


            
            

            
            

            
            

            
            
            
            

            
            

            
            <?php if(
                $authUser->can('admin_users') or
                    $authUser->can('admin_roles') or
                    $authUser->can('admin_group') or
                    $authUser->can('admin_users_badges') or
                    $authUser->can('admin_become_instructors_list')): ?>
                <li class="menu-header"><?php echo e(trans('panel.users')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users')): ?>
                <li
                    class="nav-item dropdown <?php echo e((request()->is('admin/staffs') or request()->is('admin/students') or request()->is('admin/instructors') or request()->is('admin/organizations')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-users"></i>
                        <span><?php echo e(trans('admin/main.users_list')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_staffs_list')): ?>
                            <li class="<?php echo e(request()->is('admin/staffs') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/staffs"><?php echo e(trans('admin/main.staff')); ?></a>
                            </li>
                        <?php endif; ?>

                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_list')): ?>
                            <li class="<?php echo e(request()->is('admin/students') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/students"><?php echo e(trans('public.students')); ?></a>
                            </li>
                        <?php endif; ?>

                        
                        
                        
                        

                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_create')): ?>
                            <li class="<?php echo e(request()->is('admin/users/create') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/users/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles')): ?>
                <li class="nav-item dropdown <?php echo e(request()->is('admin/roles*') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> <span><?php echo e(trans('admin/main.roles')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_list')): ?>
                            <li class="<?php echo e(request()->is('admin/roles') ? 'active' : ''); ?>">
                                <a class="nav-link active" href="/admin/roles"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_create')): ?>
                            <li class="<?php echo e(request()->is('admin/roles/create') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/roles/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            
            

            
            


            
            

            
            <?php if(
                $authUser->can('admin_supports') or
                    $authUser->can('admin_comments') or
                    $authUser->can('admin_reports') or
                    $authUser->can('admin_contacts') or
                    $authUser->can('admin_noticeboards') or
                    $authUser->can('admin_notifications')): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.crm')); ?></li>
            <?php endif; ?>
            
            
            
                
                
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments')): ?>
                <li
                    class="nav-item dropdown <?php echo e((request()->is('admin/comments*') and !request()->is('admin/comments/webinars/reports')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-comments"></i>
                        <span><?php echo e(trans('admin/main.comments')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_comments')): ?>
                            <li class="<?php echo e(request()->is('admin/comments/webinars') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['classesComments']) and $sidebarBeeps['classesComments']): ?> beep beep-sidebar <?php endif; ?>"
                                    href="/admin/comments/webinars"><?php echo e(trans('admin/main.classes_comments')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_comments')): ?>
                            <li class="<?php echo e(request()->is('admin/comments/blog') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['blogComments']) and $sidebarBeeps['blogComments']): ?> beep beep-sidebar <?php endif; ?>"
                                    href="/admin/comments/blog"><?php echo e(trans('admin/main.blog_comments')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            
            
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_contacts')): ?>
                <li class="<?php echo e(request()->is('admin/contacts*') ? 'active' : ''); ?>">
                    <a class="nav-link" href="/admin/contacts">
                        <i class="fas fa-phone-square"></i>
                        <span><?php echo e(trans('admin/main.contacts')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            
            
            
            
            
            

            
            <?php if(
                $authUser->can('admin_blog') or
                    $authUser->can('admin_pages') or
                    $authUser->can('admin_additional_pages') or
                    $authUser->can('admin_testimonials') or
                    $authUser->can('admin_tags')): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.content')); ?></li>
            <?php endif; ?>
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog')): ?>
                <li
                    class="nav-item dropdown <?php echo e((request()->is('admin/blog*') and !request()->is('admin/blog/comments')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-rss-square"></i>
                        <span><?php echo e(trans('admin/main.blog')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_lists')): ?>
                            <li class="<?php echo e(request()->is('admin/blog') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/blog"><?php echo e(trans('site.posts')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_create')): ?>
                            <li class="<?php echo e(request()->is('admin/blog/create') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/blog/create"><?php echo e(trans('admin/main.new_post')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_blog_categories')): ?>
                            <li class="<?php echo e(request()->is('admin/blog/categories') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/blog/categories"><?php echo e(trans('admin/main.categories')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            
            
            
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages')): ?>
                <li class="nav-item dropdown <?php echo e(request()->is('admin/additional_page*') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plus-circle"></i>
                        <span><?php echo e(trans('admin/main.additional_pages_title')); ?></span></a>
                    <ul class="dropdown-menu">

                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_contact_us')): ?>
                            <li class="<?php echo e(request()->is('admin/additional_page/contact_us') ? 'active' : ''); ?>">
                                <a class="nav-link"
                                    href="/admin/additional_page/contact_us"><?php echo e(trans('admin/main.contact_us')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_footer')): ?>
                            <li class="<?php echo e(request()->is('admin/additional_page/footer') ? 'active' : ''); ?>">
                                <a class="nav-link" href="/admin/additional_page/footer"><?php echo e(trans('admin/main.footer')); ?></a>
                            </li>
                        <?php endif; ?>

                        
                    </ul>
                </li>
            <?php endif; ?>
            
            
            
            
            
            

            
            
            
            
            
            
            

            
            

            
            
            
            
            

            
            <?php if(
                $authUser->can('admin_discount_codes') or
                    $authUser->can('admin_product_discount') or
                    $authUser->can('admin_feature_webinars') or
                    $authUser->can('admin_promotion') or
                    $authUser->can('admin_advertising') or
                    $authUser->can('admin_newsletters_lists')): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.marketing')); ?></li>
            <?php endif; ?>
            
            
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_newsletters_lists')): ?>
                <li class="nav-item <?php echo e(request()->is('admin/newsletters*') ? 'active' : ''); ?>">
                    <a href="/admin/newsletters" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <span><?php echo e(trans('admin/main.newsletters')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            
            
            


            <li>
                <a class="nav-link" href="/admin/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
        <br><br><br>
    </aside>
</div>
<?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>