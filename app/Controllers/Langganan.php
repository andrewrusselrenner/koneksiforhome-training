<?php

namespace App\Controllers;

use App\Models\LanggananModel;
use App\Models\PaketModel;
use App\Models\PelangganModel;

//use CodeIgniter\RESTful\ResourceController;

class Langganan extends BaseController
{
    private function langgananFields()
    {
        $data = [
            'langgananId' => $this->request->getPost('langgananid'),
            'pelangganId' => $this->request->getPost('pelangganid'),
            'paketId' => $this->request->getPost('paketid'),
            'tanggal' => $this->request->getPost('tanggal')
        ];

        return $data;
    }

    function index()
    {
        // deklarasi model
        $model = new LanggananModel();

        // fetching data dan masukkan dalam array
        $data  = [
            'data' => $model->join('pelanggan', 'pelanggan.pelangganId = langganan.pelangganId')->join('paket', 'paket.paketId = langganan.paketId')->findAll()
        ];

        return komponen_view('langganan', $data);
    }

    function tambah()
    {
        $model          = new LanggananModel();
        $pelangganmodel = new PelangganModel();
        $paketmodel     = new PaketModel();

        $dataview = [
            'pelanggan' => $pelangganmodel->findAll(),
            'paket' => $paketmodel->findAll()
        ];

        if (!$this->request->getPost()) {
            return komponen_view('langganan_form', $dataview);
        }

        try {
            $model->insert($this->langgananFields());
            return redirect()->to('/langganan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function edit($id)
    {
        $model          = new LanggananModel();
        $pelangganmodel = new PelangganModel();
        $paketmodel     = new PaketModel();
        $ambil          = $model->join('pelanggan', 'pelanggan.pelangganId = langganan.pelangganId')->join('paket', 'paket.paketId = langganan.paketId')->find($id);

        if ($ambil <= 0) {
            return redirect()->back();
        }

        $data = [
            'data' => $ambil,
            'pelanggan' => $pelangganmodel->findAll(),
            'paket' => $paketmodel->findAll()
        ];

        if (!$this->request->getPost()) {
            return komponen_view('langganan_form', $data);
        }

        try {
            $model->update($id, $this->langgananFields());
            return redirect()->to('/langganan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function hapus($id)
    {
        try {
            $model = new LanggananModel();
            $model->delete($id);
            return redirect()->to('/langganan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}