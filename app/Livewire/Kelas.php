<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KelasModel;
use Livewire\WithPagination;

class Kelas extends Component
{
    use WithPagination;
    protected static $layout = 'layouts.app';
    public $nama_kelas;
    public $id_kelas;
    public $isOpen = false;

    protected $rules = [

        'nama_kelas' => 'required|min:3|unique:kelas,nama_kelas',
    ];

    public function render()
    {

        return view('livewire.kelas', [
            'daftarKelas' => KelasModel::orderBy('nama_kelas')->paginate(10),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        KelasModel::updateOrCreate(['id_kelas' => $this->id_kelas], [
            'nama_kelas' => $this->nama_kelas,
        ]);

        session()->flash(
            'message',
            $this->id_kelas ? 'Kelas berhasil diperbarui.' : 'Kelas berhasil ditambahkan.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id_kelas)
    {
        $kelasModel = KelasModel::findOrFail($id_kelas);
        $this->id_kelas = $id_kelas;
        $this->nama_kelas = $kelasModel->nama_kelas;
        $this->openModal();
    }

    public function delete($id_kelas)
    {

        KelasModel::find($id_kelas)->delete();
        session()->flash('message', 'Kelas berhasil dihapus.');
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
        $this->nama_kelas = '';
        $this->id_kelas = '';
    }
}
