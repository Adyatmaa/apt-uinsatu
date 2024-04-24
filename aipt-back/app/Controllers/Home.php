<?php

namespace App\Controllers;

use App\Models\MProdi;
use App\Models\MFakultas;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use function PHPUnit\Framework\returnSelf;

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

    public function insertPrd()
    {
        $prodi = new MProdi();
        $table = 'm_prodi';
        if ($this->request->getMethod() == "POST") {
            $rules = $this->validate([
                'filename' => 'uploaded[filename]|max_size[filename,500]|ext_in[filename,csv,xlsx]',
            ]);
            if ($rules == true) {
                $filename = $this->request->getFile('filename');
                $name = $filename->getName();
                $tmpname = $filename->getTempName();
                $arr_file = explode(".", $name);
                $extension = end($arr_file);
                if ('csv' == $extension) {
                    $reader = new Csv();
                } else {
                    $reader = new Xlsx();
                }
                $spreadsheet = $reader->load($tmpname);
                $sheet = $spreadsheet->getActiveSheet()->toArray();
                if (!empty($sheet)) {
                    for ($i = 1; $i < count($sheet); $i++) {
                        $nama_prodi = $sheet[$i][0];
                        $id_jenjang = $sheet[$i][1];
                        $id_fakultas = $sheet[$i][2];
                        $sk_pendirian = $sheet[$i][3];
                        $id_akreditasi = $sheet[$i][4];
                        $bukti_akreditasi = $sheet[$i][5];

                        $data = [
                            'nama_prodi' => $nama_prodi,
                            'id_jenjang' => $id_jenjang,
                            'id_fakultas' => $id_fakultas,
                            'sk_pendirian' => $sk_pendirian,
                            'id_akreditasi' => $id_akreditasi,
                            'bukti_akreditasi' => $bukti_akreditasi
                        ];
                        $prodi->insertPrd($table, $data);

                        // return redirect()->to(site_url('Home/inputPrd'));
                    }
                } else {
                    return redirect()->to(site_url('Home/inputPrd'));
                }
                return redirect()->to(site_url('Home/inputPrd'));
            }
            return redirect()->to(site_url('Home/inputPrd'));
        }
    }
}
