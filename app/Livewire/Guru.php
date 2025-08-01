<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GuruModel;
use Livewire\WithPagination;

class Guru extends Component
{
    use WithPagination;
    protected static $layout = 'layouts.app';

    public $nama_guru;
    public $nip; 
    public $id_guru; 

    
    public $isOpen = false;

    
    protected $rules = [
        'nama_guru' => 'required|min:3',
        'nip' => 'required|unique:guru,nip', 
    ];

    
    public function render()
    {
        return view('livewire.guru', [
            'daftarGuru' => GuruModel::orderBy('nama_guru')->paginate(10),
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

        GuruModel::updateOrCreate(['id_guru' => $this->id_guru], [
            'nama_guru' => $this->nama_guru,
            'nip' => $this->nip,
        ]);

        session()->flash(
            'message',
            $this->id_guru ? 'Guru berhasil diperbarui.' : 'Guru berhasil ditambahkan.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id_guru)
    {
        $guru = GuruModel::findOrFail($id_guru);
        $this->id_guru = $id_guru;
        $this->nama_guru = $guru->nama_guru;
        $this->nip = $guru->nip;

        $this->openModal();
    }

    public function delete($id_guru)
    {
        GuruModel::find($id_guru)->delete();
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
        $this->nama_guru = '';
        $this->nip = '';
        $this->id_guru = '';
    }
}
