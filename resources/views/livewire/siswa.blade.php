<div>
    <h2 class="h2 mb-4">Manajemen Data Siswa</h2>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <button wire:click="create()" class="btn btn-primary">
            Tambah Siswa Baru
        </button>

        <div class="col-md-4">
            <label for="filter_kelas_id" class="form-label visually-hidden">Filter Kelas:</label>
            <select id="filter_kelas_id" class="form-control" wire:model.live="filter_kelas_id">
                <option value="">-- Tampilkan Semua Kelas --</option>
                @foreach($kelas_list as $kelas)
                    <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if($isOpen)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $id_siswa ? 'Edit Data Siswa' : 'Tambah Data Siswa' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label">Nama Siswa:</label>
                                <input type="text" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" wire:model.defer="nama_siswa" placeholder="Nama Lengkap Siswa">
                                @error('nama_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS:</label>
                                <input type="text" id="nis" class="form-control @error('nis') is-invalid @enderror" wire:model.defer="nis" placeholder="Nomor Induk Siswa">
                                @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_kelas" class="form-label">Kelas:</label>
                                <select id="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" wire:model.defer="id_kelas">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach($kelas_list as $kelas)
                                        <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @error('id_kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($daftarSiswa as $siswa)
                    <tr>
                        <td>{{ $siswa->id_siswa }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama_siswa }}</td>
                        <td>{{ $siswa->kelas->nama_kelas ?? 'Belum Ada Kelas' }}</td>
                        <td>
                            <button wire:click="edit({{ $siswa->id_siswa }})" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $siswa->id_siswa }})" class="btn btn-sm btn-danger" onclick="confirm('Apakah Anda yakin ingin menghapus siswa ini?') || event.stopImmediatePropagation()">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data siswa yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $daftarSiswa->links('pagination::bootstrap-5') }}
    </div>
</div>