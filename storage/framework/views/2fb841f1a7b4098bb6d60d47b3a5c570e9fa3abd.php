<!-- Modal -->
<div class="d-none" id="webinarAddChapModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25">Tạo Mới chương</h3>
    <form action="/admin/files/store_chap" method="post">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
            <input type="text" name="title" class="form-control" placeholder="Tối đa 150 ký tự"/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveChap" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/vnedumall.com/public_html/resources/views/admin/webinars/modals/chap.blade.php ENDPATH**/ ?>