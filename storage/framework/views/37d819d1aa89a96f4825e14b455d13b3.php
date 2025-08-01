<div>
    
    <h2 class="h2 mb-4">Manajemen Data Kelas</h2>

    
    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('message')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <button wire:click="create()" class="btn btn-primary mb-3">
        Tambah Kelas Baru
    </button>

    
    <!--[if BLOCK]><![endif]--><?php if($isOpen): ?>
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e($id_kelas ? 'Edit Kelas' : 'Tambah Kelas'); ?></h5>
                        <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_kelas" class="form-label">Nama Kelas:</label>
                                <input type="text" id="nama_kelas" class="form-control <?php $__errorArgs = ['nama_kelas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model.defer="nama_kelas" placeholder="Contoh: X IPA 1">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nama_kelas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal()">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $daftarKelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($kelas->id_kelas); ?></td>
                        <td><?php echo e($kelas->nama_kelas); ?></td>
                        <td>
                            <button wire:click="edit(<?php echo e($kelas->id_kelas); ?>)" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete(<?php echo e($kelas->id_kelas); ?>)" class="btn btn-sm btn-danger" onclick="confirm('Apakah Anda yakin ingin menghapus kelas ini?') || event.stopImmediatePropagation()">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data kelas yang ditemukan.</td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    
    <div class="mt-3">
        <?php echo e($daftarKelas->links('pagination::bootstrap-5')); ?>

    </div>
</div><?php /**PATH C:\laragon\www\sisekolah\resources\views/livewire/kelas.blade.php ENDPATH**/ ?>