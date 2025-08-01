<div>
    <h2 class="h2 mb-4">Manajemen Data Guru</h2>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button wire:click="create()" class="btn btn-primary mb-3">
        Tambah Guru Baru
    </button>

    @if($isOpen)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $id_guru ? 'Edit Data Guru' : 'Tambah Data Guru' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_guru" class="form-label">Nama Guru:</label>
                                <input type="text" id="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" wire:model.defer="nama_guru" placeholder="Nama Lengkap Guru">
                                @error('nama_guru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP:</label>
                                <input type="number" id="nip" class="form-control @error('nip') is-invalid @enderror" wire:model.defer="nip" placeholder="Nomor Induk Pegawai">
                                @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                    <th>Nama Guru</th>
                    <th>NIP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($daftarGuru as $guru)
                    <tr>
                        <td>{{ $guru->id_guru }}</td>
                        <td>{{ $guru->nama_guru }}</td>
                        <td>{{ $guru->nip }}</td>
                        <td>
                            <button wire:click="edit({{ $guru->id_guru }})" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $guru->id_guru }})" class="btn btn-sm btn-danger" onclick="confirm('Apakah Anda yakin ingin menghapus guru ini?') || event.stopImmediatePropagation()">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data guru yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $daftarGuru->links('pagination::bootstrap-5') }}
    </div>
</div>