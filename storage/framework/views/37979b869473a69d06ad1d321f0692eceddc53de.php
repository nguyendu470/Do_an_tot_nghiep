<!-- Modal -->
<div class="d-none" id="webinarImportTestLessonModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25">Import bài giảng</h3>
    <form action="/admin/test-lesson/import" method="post" enctype="multipart/form-data">
        <input type="hidden" name="webinar_id" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">
        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
        <div class="form-group">
            <label class="input-label">Chọn file excel:</label>
            <input type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveImportText" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/admin/webinars/modals/importText.blade.php ENDPATH**/ ?>