<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    private function pelangganFields()
    {
        $data = [
            'pelangganId' => $this->request->getPost('pelangganid'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jeniskelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'telpon' => $this->request->getPost('telpon')
        ];

        return $data;
    }

    function index()
    {
        // deklarasi model
        $model = new PelangganModel();

        // fetching data dan masukkan dalam array
        $data  = [
            'data' => $model->findAll()
        ];

        return komponen_view('pelanggan', $data);
    }

    function tambah()
    {
        $model = new PelangganModel();

        if (!$this->request->getPost()) {
            return komponen_view('pelanggan_form');
        }

        try {
            $model->insert(array_filter($this->pelangganFields()));
            return redirect()->to('/pelanggan');
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            return;
        }
    }

    function edit($id)
    {
        $model = new PelangganModel();
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
            echo view('pelanggan_form', $data);
            echo view('komponen/kaki');
            return;
        }

        try {
            $model->update($id, array_filter($this->pelangganFields()));
            return redirect()->to('/pelanggan');
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            return;
        }
    }

    function hapus($id)
    {
        try {
            $model = new PelangganModel();
            $model->delete($id);
            return redirect()->to('/pelanggan');
        } catch (\Throwable $th) {
            throw $th;
            return;
        }
    }
}