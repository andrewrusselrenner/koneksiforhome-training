<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    function index()
    {
        // deklarasi model
        $model = new PelangganModel();

        // fetching data dan masukkan dalam array
        $data  = [
            'data' => $model->findAll()
        ];

        // ini kepala (header)
        echo view('komponen/kepala');

        // passing data array tadi ke view pelanggan
        echo view('pelanggan', $data);

        // ini kaki (kaki)
        echo view('komponen/kaki');
    }

    function tambah()
    {
        $model = new PelangganModel();

        if (!$this->request->getPost()) {
            echo view('komponen/kepala');
            echo view('pelanggan_form');
            echo view('komponen/kaki');
            return;
        }

        $data = [
            'pelangganId' => $this->request->getPost('pelangganid'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jeniskelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'telpon' => $this->request->getPost('telpon')
        ];

        try {
            $model->insert(array_filter($data));
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

        $edit = [
            'pelangganId' => $this->request->getPost('pelangganid'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jeniskelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'telpon' => $this->request->getPost('telpon')
        ];

        try {
            $model->update($id, array_filter($edit));
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
