

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/custom/datatables/datatables.bundle.css')); ?>" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/vendor/costom/datatables/datatables/bundle.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/demo/default/costom/crud/datatables/basic/paginations.js')); ?>" type="text/javascript"></script>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Produksi
                </h3>
                Table Produksi Produk
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="m-portlet akses-list">
            <div class="m-portlet__body">
                <div class="table-responsive">
                    <table class="akses-list table table-bordered datatable"
                        data-url="<?php echo e(route('produksiDataTable')); ?>"
                        data-column="<?php echo e(json_encode($datatable_column)); ?>">
                        <thead>
                            <tr>
                                <th width="20">No</th>
                                <th class="no-sort">Kode Produksi</th>
                                <th class="no-sort">Lokasi</th>
                                <th class="no-sort">Tanggal Mulai</th>
                                <th class="no-sort">Tanggal Selesai</th>
                                <th class="no-sort">Status</th>
                                <th class="no-sort">Publish</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gtn_bootcamp_undiksha_2021\example-app\resources\views/produksi/produksiList.blade.php ENDPATH**/ ?>