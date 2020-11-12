<?php

namespace App\Controllers;

use App\Models\PaketModel;

//use CodeIgniter\RESTful\ResourceController;

class Paket extends BaseController
{
    private function paketFields()
    {
        $data = [
            'paketId' => $this->request->getPost('paketid'),
            'nama_paket' => $this->request->getPost('namapaket'),
            'internet' => $this->request->getPost('internet'),
            'useetv' => $this->request->getPost('useetv'),
            'kategori' => $this->request->getPost('kategori'),
            'price' => $this->request->getPost('price'),
            'pajak' => $this->request->getPost('pajak')
        ];

        return $data;
    }

    function index()
    {
        // deklarasi model
        $model = new PaketModel();

        // fetching data dan masukkan dalam array
        $data  = [
            'data' => $model->findAll()
        ];

        return komponen_view('paket', $data);
    }

    function tambah()
    {
        if (!$this->request->getPost()) {
            return komponen_view('paket_form');
        }

        $model = new PaketModel();

        try {
            $model->insert($this->paketFields());
            return redirect()->to('/paket');
        } catch (\Throwable $th) {
            throw $th;
            return;
        }
    }

    function edit($id)
    {
        $model = new PaketModel();
        $ambil = $model->find($id);

        if ($ambil <= 0) {
            return redirect()->back();
        }

        $data = [
            'data' => $ambil,
            'edit' => true
        ];

        if (!$this->request->getPost()) {
            return komponen_view('paket_form', $data);
        }

        try {
            $model->update($id, array_filter($this->paketFields()));
            return redirect()->to('/paket');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function hapus($id)
    {
        try {
            $model = new PaketModel();
            $model->delete($id);
            return redirect()->to('/paket');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}