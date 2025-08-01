@extends('layouts.app')

@section('content')
<div class="container-fluid"> 

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Statistik Sekolah</h1>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSiswa }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <a href="{{ route('siswa.index') }}" class="text-primary small">Lihat Semua Siswa &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKelas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <a href="{{ route('kelas.index') }}" class="text-success small">Lihat Semua Kelas &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Guru
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGuru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <a href="{{ route('guru.index') }}" class="text-info small">Lihat Semua Guru &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data Lainnya</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Siswa Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestSiswa as $siswa)
                                    <tr>
                                        <td>{{ $siswa->id_siswa }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama_siswa }}</td>
                                        <td>{{ $siswa->kelas->nama_kelas ?? 'Belum Ada Kelas' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data siswa terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary mt-3">Lihat Semua Siswa &raquo;</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kelas Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestKelas as $kelas)
                                    <tr>
                                        <td>{{ $kelas->id_kelas }}</td>
                                        <td>{{ $kelas->nama_kelas }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Tidak ada data kelas terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-primary mt-3">Lihat Semua Kelas &raquo;</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Guru Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestGuru as $guru)
                                    <tr>
                                        <td>{{ $guru->id_guru }}</td>
                                        <td>{{ $guru->nip }}</td>
                                        <td>{{ $guru->nama_guru }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data guru terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('guru.index') }}" class="btn btn-sm btn-primary mt-3">Lihat Semua Guru &raquo;</a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection