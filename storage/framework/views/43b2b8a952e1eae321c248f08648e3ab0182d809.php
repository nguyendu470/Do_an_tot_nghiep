<div class="tab-pane mt-3 fade" id="video_and_image_section" role="tabpanel" aria-labelledby="video_and_image_section-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="/admin/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="home_video_or_image_box">
                <input type="hidden" name="page" value="personalization">

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.link')); ?></label>
                    <input type="text" name="value[link]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['link'])) ? $itemValue['link'] : old('link')); ?>" class="form-control "/>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.title')); ?></label>
                    <input type="text" name="value[title]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['title'])) ? $itemValue['title'] : old('title')); ?>" class="form-control "/>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('public.description')); ?></label>
                    <textarea type="text" name="value[description]" rows="5" class="form-control "><?php echo e((!empty($itemValue) and !empty($itemValue['description'])) ? $itemValue['description'] : old('description')); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('admin/main.background')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="background" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="value[background]" id="background" value="<?php echo e((!empty($itemValue) and !empty($itemValue['background'])) ? $itemValue['background'] : old('background')); ?>" class="form-control"/>
                    </div>
                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/admin/settings/personalization/home_video_or_image_box.blade.php ENDPATH**/ ?>