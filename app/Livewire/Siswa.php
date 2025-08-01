<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use Livewire\WithPagination;

class Siswa extends Component
{
    use WithPagination;
    protected static $layout = 'layouts.app';
    public $nama_siswa;
    public $nis;
    public $id_kelas;
    public $id_siswa;
    public $kelas_list;
    public $filter_kelas_id;
    public $isOpen = false;

    protected $rules = [
        'nama_siswa' => 'required|min:3',
        'nis' => 'required|unique:siswa,nis',
        'id_kelas' => 'required|exists:kelas,id_kelas',
    ];


    public function mount()
    {
        $this->kelas_list = KelasModel::orderBy('nama_kelas')->get();
    }


    public function render()
    {
        $daftarSiswa = SiswaModel::orderBy('nama_siswa')
            ->with('kelas');


        if ($this->filter_kelas_id) {
            $daftarSiswa->where('id_kelas', $this->filter_kelas_id);
        }


        return view('livewire.siswa', [
            'daftarSiswa' => $daftarSiswa->paginate(10),
        ]);
    }
    public function updatedFilterKelasId()
    {
        $this->resetPage();
    }


    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        SiswaModel::updateOrCreate(['id_siswa' => $this->id_siswa], [
            'nama_siswa' => $this->nama_siswa,
            'nis' => $this->nis,
            'id_kelas' => $this->id_kelas,
        ]);

        session()->flash(
            'message',
            $this->id_siswa ? 'Data Siswa berhasil diperbarui.' : 'Data Siswa berhasil ditambahkan.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id_siswa)
    {
        $siswa = SiswaModel::findOrFail($id_siswa);
        $this->id_siswa = $id_siswa;
        $this->nama_siswa = $siswa->nama_siswa;
        $this->nis = $siswa->nis;
        $this->id_kelas = $siswa->id_kelas;

        $this->openModal();
    }

    public function delete($id_siswa)
    {
        SiswaModel::find($id_siswa)->delete();
        session()->flash('message', 'Data Siswa berhasil dihapus.');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetValidation();
    }

    private function resetInputFields()
    {
        $this->nama_siswa = '';
        $this->nis = '';
        $this->id_kelas = '';
        $this->id_siswa = '';
    }
}
