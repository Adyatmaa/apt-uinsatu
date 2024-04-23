<?php

namespace App\Controllers;

use App\Models\MFakultas;

class Home extends BaseController
{
    public function index()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('welcome_message');
        echo view('admin_footer');
    }

    public function inputAkre()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('admin_inputAkre');
        echo view('admin_footer');
    }
    public function inputFak()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('admin_inputFak');
        echo view('admin_footer');
    }
    public function inputPrd()
    {
        $fakultas = new MFakultas();
        $dataf = $fakultas->viewFak();
        $data2 = array('faculty' => $dataf);

        echo view('admin_header');
        echo view('admin_nav');
        echo view('admin_inputPrd', $data2);
        echo view('admin_footer');
    }
    public function inputMhs()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('admin_inputMhs');
        echo view('admin_footer');
    }
    public function inputTendik()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('admin_inputTendik');
        echo view('admin_footer');
    }

    public function viewFak()
    {
        $fakultas = new MFakultas();
        $dataf = $fakultas->viewFak();
        $data2 = array('faculty' => $dataf);

        echo view('admin_header');
        echo view('admin_nav');
        echo view('admin_view_Fak', $data2);
        echo view('admin_footer');
    }

    public function insertFak()
    {
        $nama_fakultas = $this->request->getPost('nama_fakultas');
        $created_by = $this->request->getPost('created_by');
        $created_date = date('Y-m-d H:i:s');

        $data = [
            'nama_fakultas' => $nama_fakultas,
            'created_by' => $created_by,
            'created_date' => $created_date,
            'updated_by' => null,
            'updated_date' => null
        ];

        $fakultas = new MFakultas();
        $table = 'm_fakultas';
        $fakultas->insertFak($table, $data);
        return redirect()->to(site_url('Home/inputFak'));
    }
}
