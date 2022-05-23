

<?php $__env->startSection('content'); ?>
<div class="
card card-docs mb-2">

    <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
        <h2 class="mb-3"> <?php echo app('translator')->get('Traslate'); ?></h2>
        <form class="form-horizontal" action="<?php echo e(route('languages.key_value_store','en')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($language); ?>">
            <table class="table table-striped table-bordered zero-configuration" id="kt_datatable">

            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Key')); ?></th>
                    <th><?php echo e(__('Value')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                ?>
                <?php $__currentLoopData = openJSONFile('en'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i); ?></td>
                        <td class="key"><?php echo e($key); ?></td>
                        <td>
                            <input type="text" class="form-control value" style="width:100%" name="key[<?php echo e($key); ?>]" <?php if(isset(openJSONFile($language)[$key])): ?>
                                value="<?php echo e(openJSONFile($language)[$key]); ?>"
                            <?php endif; ?>>
                        </td>
                    </tr>
                    <?php
                        $i++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
 
        </table>
        <div class="panel-footer text-right">
            <button type="button" class="btn btn-warning" onclick="copyTranslation()"><?php echo e(__('Copy Translations')); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
        </div>
    </form>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('table').DataTable();
} );
    function copyTranslation() {
        $('#kt_datatable > tbody  > tr').each(function (index, tr) {
            $(tr).find('.value').val($(tr).find('.key').text());
        });
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/language_view_en.blade.php ENDPATH**/ ?>