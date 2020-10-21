<?php

namespace App\Controllers;

use App\Models\PaketModel;

//use CodeIgniter\RESTful\ResourceController;

class Paket extends BaseController
{
    function index()
    {
        // deklarasi model
        $model = new PaketModel();

        // fetching data dan masukkan dalam array
        $data  = [
            'data' => $model->findAll()
        ];

        // ini kepala (header)
        echo view('komponen/kepala');

        // passing data array tadi ke view paket
        echo view('paket', $data);

        // ini kaki (kaki)
        echo view('komponen/kaki');
    }

    function tambah()
    {
        if (!$this->request->getPost()) {
            echo view('komponen/kepala');
            echo view('paket_form');
            echo view('komponen/kaki');
            return;
        }

        $model = new PaketModel();

        $data = [
            'paketId' => $this->request->getPost('paketid'),
            'nama_paket' => $this->request->getPost('namapaket'),
            'internet' => $this->request->getPost('internet'),
            'useetv' => $this->request->getPost('useetv'),
            'kategori' => $this->request->getPost('kategori'),
            'price' => $this->request->getPost('price'),
            'pajak' => $this->request->getPost('pajak')
        ];

        try {
            $model->insert($data);
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
            echo view('komponen/kepala');
            echo view('paket_form', $data);
            echo view('komponen/kaki');
            return;
        }

        $edit = [
            'paketId' => $this->request->getPost('paketid'),
            'nama_paket' => $this->request->getPost('namapaket'),
            'internet' => $this->request->getPost('internet'),
            'useetv' => $this->request->getPost('useetv'),
            'kategori' => $this->request->getPost('kategori'),
            'price' => $this->request->getPost('price'),
            'pajak' => $this->request->getPost('pajak')
        ];

        try {
            $model->update($id, array_filter($edit));
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
