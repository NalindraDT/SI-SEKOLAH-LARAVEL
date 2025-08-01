<div>
    <h2 class="h2 mb-4">Manajemen Data Kelas</h2>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button wire:click="create()" class="btn btn-primary mb-3">
        Tambah Kelas Baru
    </button>

    @if($isOpen)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $id_kelas ? 'Edit Kelas' : 'Tambah Kelas' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_kelas" class="form-label">Nama Kelas:</label>
                                <input type="text" id="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" wire:model.defer="nama_kelas" placeholder="Contoh: X IPA 1">
                                @error('nama_kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
    @endif

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
                @forelse($daftarKelas as $kelas)
                    <tr>
                        <td>{{ $kelas->id_kelas }}</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td>
                            <button wire:click="edit({{ $kelas->id_kelas }})" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $kelas->id_kelas }})" class="btn btn-sm btn-danger" onclick="confirm('Apakah Anda yakin ingin menghapus kelas ini?') || event.stopImmediatePropagation()">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data kelas yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $daftarKelas->links('pagination::bootstrap-5') }}
    </div>
</div>