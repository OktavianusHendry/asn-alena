
<?php $__env->startSection('content'); ?>
    <div id="app">
        <div class="container-xxl flex-grow-1 container-p-y">
            <main class="py-4">
                <div class="d-flex justify-content-between mb-2">
                    <h2 class="fw-bold py-3 mb-1">
                        <b>Data Surat Masuk</b>
                        <span class="text-muted fw-light">/ dari instansi luar</span>
                    </h2>
                </div>
                <div class="card mb-4">
                    <div class="container">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="<?php echo e(route('surat_masuk.create')); ?>">
                                <button type="button" class="btn rounded-pill btn-primary mt-3 align-content-center"><i
                                        class="menu-icon tf-icons bx bxs-plus-circle"></i>Tambah</button>
                            </a>
                        </div>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('surat_masuk.index')); ?>" method="GET" class="mb-3">
                            <div class="form-group d-flex">
                                <input type="text" name="search" value="<?php echo e(request()->input('search')); ?>"
                                    class="form-control" placeholder="Cari asal surat masuk...">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                            <div class="form-group d-flex mt-3">
                                <button type="submit" name="sifat_surat" value="Formal"
                                    class="btn btn-secondary <?php echo e(request()->input('sifat_surat') === 'Formal' ? 'active' : ''); ?>">Formal</button>&nbsp;&nbsp;
                                <button type="submit" name="sifat_surat" value="Bisnis"
                                    class="btn btn-secondary <?php echo e(request()->input('sifat_surat') === 'Bisnis' ? 'active' : ''); ?>">Bisnis</button>&nbsp;&nbsp;
                                <button type="submit" name="sifat_surat" value="Resmi"
                                    class="btn btn-secondary <?php echo e(request()->input('sifat_surat') === 'Resmi' ? 'active' : ''); ?>">Resmi</button>&nbsp;&nbsp;
                                <a href="<?php echo e(route('surat_masuk.index')); ?>" class="btn btn-danger ml-2">
                                    &nbsp;<i class="menu-icon tf-icons bx bx-arrow-back"></i>
                                </a>
                            </div>
                        </form>


                        <?php if($suratMasuks->count() > 0): ?>
                            <div class="table-responsive text-nowrap">
                                <br>
                                <table class="table table-hover align-content-center">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Asal Surat</th>
                                            <th>Sifat Surat</th>
                                            <th>Tindak Lanjut</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-border-bottom-0 align-content-center">
                                        <?php $__currentLoopData = $suratMasuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suratMasuk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e(strlen($suratMasuk->instansi->nama_instansi) > 20 ? substr($suratMasuk->instansi->nama_instansi, 0, 20) . '...' : $suratMasuk->instansi->nama_instansi); ?>

                                                </td>
                                                <td><?php echo e($suratMasuk->sifat_surat); ?></td>
                                                <td><?php echo e($suratMasuk->tindak_lanjut); ?></td>
                                                <td>
                                                    <?php if($suratMasuk->file_surat): ?>
                                                        <!-- Correcting the file link path -->
                                                        <a href="<?php echo e(asset('storage/' . $suratMasuk->file_surat)); ?>"
                                                            target="_blank"
                                                            class="btn btn-success btn-sm">Unduh</a>&nbsp;&nbsp;
                                                    <?php else: ?>
                                                        Tidak ada dokumen
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('surat_masuk.show', $suratMasuk->id_surat_masuk)); ?>"
                                                        class="btn btn-info btn-sm">Detail</a>&nbsp;&nbsp;
                                                    <a href="<?php echo e(route('surat_masuk.edit', $suratMasuk->id_surat_masuk)); ?>"
                                                        class="btn btn-warning btn-sm">&nbsp;<i
                                                            class="menu-icon tf-icons bx bx-edit"></i></a>
                                                    &nbsp;&nbsp;
                                                    <form
                                                        action="<?php echo e(route('surat_masuk.destroy', $suratMasuk->id_surat_masuk)); ?>"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Yakin ingin menghapus?');">
                                                        <input type="hidden" name="_method" value="delete" />
                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm">&nbsp;<i
                                                                class="menu-icon tf-icons bx bx-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center my-4 pagination-wrapper">
                                <?php echo e($suratMasuks->appends(['search' => request()->input('search')])->links('pagination::bootstrap-4')); ?>

                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">
                                Tidak ada data surat masuk ditemukan.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    .pagination-wrapper .pagination {
        display: flex;
        justify-content: center;
        padding: 1rem 0;
    }

    .pagination-wrapper .pagination li {
        margin: 0 0.25rem;
    }

    .pagination-wrapper .pagination li a,
    .pagination-wrapper .pagination li span {
        color: #007bff;
        padding: 0.5rem 0.75rem;
        text-decoration: none;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }

    .pagination-wrapper .pagination li a:hover,
    .pagination-wrapper .pagination li span:hover {
        background-color: #e9ecef;
    }

    .pagination-wrapper .pagination li.active span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination-wrapper .pagination li.disabled span {
        color: #6c757d;
    }
</style>

<?php echo $__env->make(Auth::user()->role_as == '1' ? 'layouts.template' : 'layoutss.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Aplikasi_Manajemen_Kantor_v.1.4\resources\views/surat_masuk/index.blade.php ENDPATH**/ ?>