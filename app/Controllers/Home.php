<?php

namespace App\Controllers;
use App\Models\datakriteria_model;
use App\Models\dataalternatif_model;
use App\Models\datakonversi_model;
use App\Models\datanormalisasi_model;
use App\Models\databobot_model;
use App\Models\datahasil_model;
use App\Models\datarangking_model;

class Home extends BaseController
{
     
    public function index()
    {
         echo View('admin_header');
         echo View('admin_nav');
         echo View ('home'); 
         echo View('admin_footer');
    }

    // Simpan
    public function simpanA()
    {
        $polisi_id = $this->request->getPost('polisi_id');  
        $nama = $this->request->getPost('nama');  

        // Validasi data
        if (empty($polisi_id) || empty($nama)) {
            return redirect()->back()->with('error', 'Semua field harus diisi!');
        }

        $data = [
            'polisi_id' => $polisi_id,
            'nama' => $nama,
        ];

        $mb = new dataalternatif_model();
        $tabelalternatif = "alternatif";  
        $simpan = $mb->saveA($tabelalternatif, $data);

        if ($simpan) {
            return redirect()->to('/Home/viewalternatif')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function simpanK()
    {
        $kriteria_id = $this->request->getPost('kriteria_id');  
        $nama = $this->request->getPost('nama');
        $bobot = $this->request->getPost('bobot');
        $tipe = $this->request->getPost('tipe');

        // Validasi data
        if (empty($kriteria_id) || empty($nama)) {
            return redirect()->back()->with('error', 'Semua field harus diisi!');
        }

        // Cek validitas bobot dan tipe jika diperlukan
        if (empty($bobot) || empty($tipe)) {
            return redirect()->back()->with('error', 'Bobot dan Tipe harus diisi!');
        }

        $data = [
            'kriteria_id' => $kriteria_id,
            'nama' => $nama,
            'bobot' => $bobot,
            'tipe' => $tipe,
        ];

        $mb = new datakriteria_model();
    
        // Pastikan menggunakan metode saveA dari model jika Anda sudah mendefinisikan metode ini
        $simpan = $mb->saveA('kriteria', $data);  // Gunakan saveA dengan nama tabel dan data

        if ($simpan) {
            return redirect()->to('/Home/viewkriteria')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function simpanKv()
    {
        $id = $this->request->getPost('id');  
        $polisi_id = $this->request->getPost('polisi_id');
        $kriteria_id = $this->request->getPost('kriteria_id');
        $nilai = $this->request->getPost('nilai');

        // Validasi data
        if (empty($id) || empty($polisi_id)) {
            return redirect()->back()->with('error', 'Semua field harus diisi!');
        }

        // Cek validitas bobot dan tipe jika diperlukan
        if (empty($kriteria_id) || empty($nilai)) {
            return redirect()->back()->with('error', 'Bobot dan Tipe harus diisi!');
        }

        $data = [
            'id' => $id,
            'polisi_id' => $polisi_id,
            'kriteria_id' => $kriteria_id,
            'nilai' => $nilai,
        ];

        $mb = new datakonversi_model();
    
        // Pastikan menggunakan metode saveA dari model jika Anda sudah mendefinisikan metode ini
        $simpan = $mb->saveA('konversi_data', $data);  // Gunakan saveA dengan nama tabel dan data

        if ($simpan) {
            return redirect()->to('/Home/viewkonversi')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }
    
    public function viewalternatif()
    {
        $mb = new dataalternatif_model();
        $datamb = $mb->tampilAlternatif();
        $data = array('dataMb'=> $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('viewalternatif',$data); 
        echo View('admin_footer');
    }
    public function formedit($id)
    {
        $mb = new dataalternatif_model();
        $datamb = $mb->getsupplier($id);  
        $data = ['datamb' => $datamb];

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('formedit',$data); 
        echo View('admin_footer');
    }

    public function update_data($id)
    {
        $polisi_id = $this->request->getPost('polisi_id');
        $nama = $this->request->getPost('nama'); 
    
        $data = [
            'polisi_id' => $polisi_id,
            'nama' => $nama,
        ];
    
        $where = ['polisi_id' => $id];
    
        $mb = new dataalternatif_model();
        $tabelalternatif = "alternatif";
        $simpan = $mb->prosesEditA($tabelalternatif, $data, $where);
    
        return redirect()->to(site_url('/Home/viewalternatif'));
    }

    public function updateKriteria($id)
    {
        $kriteria_id = $this->request->getPost('kriteria_id');
        $nama = $this->request->getPost('nama');
        $bobot = $this->request->getPost('bobot'); 
        $tipe = $this->request->getPost('tipe'); 
    
        $data = [
            'kriteria_id' => $kriteria_id,
            'nama' => $nama,
            'bobot' => $bobot,
            'tipe' => $tipe,
        ];
    
        $where = ['kriteria_id' => $id];
    
        $mb = new datakriteria_model();
        $tabelkriteria = "kriteria";
        $simpan = $mb->prosesEditA($tabelkriteria, $data, $where);
    
        return redirect()->to(site_url('/Home/viewkriteria'));
    }
    
    public function updateKonversi($id)
    {
        $id = $this->request->getPost('id');
        $polisi_id = $this->request->getPost('polisi_id'); 
        $kriteria_id = $this->request->getPost('kriteria_id'); 
        $nilai = $this->request->getPost('nilai'); 
    
        $data = [
            'id' => $id,
            'polisi_id' => $polisi_id,
            'kriteria_id' => $kriteria_id,
            'nilai' => $nilai,
        ];
    
        $where = ['id' => $id];
    
        $mb = new datakonversi_model();
        $tabelkonversi = "konversi_data";
        $simpan = $mb->prosesEditA($tabelkonversi, $data, $where);
    
        return redirect()->to(site_url('/Home/viewkonversi'));
    }

    public function delete($id)
    {
        $mb = new dataalternatif_model();
        $mb->hapusA($id);  // Panggil fungsi hapus
        return redirect()->to(site_url('/Home/viewalternatif'));
    }

    public function deleteKriteria($id)
    {
        $mb = new datakriteria_model();
        $mb->hapusA($id);  // Panggil fungsi hapus
        return redirect()->to(site_url('/Home/viewkriteria'));
    }

    public function deleteKonversi($id)
    {
        $mb = new datakonversi_model();
        $mb->hapusA($id);  // Panggil fungsi hapus
        return redirect()->to(site_url('/Home/viewkonversi'));
    }

    public function forminputmhs(){

        echo view('admin_header');
        echo view('admin_nav');
        echo view('tambah_data');
        echo view('admin_footer'); 
    }

    public function formEditKriteria($id){

        $mb = new datakriteria_model();
        $datamb = $mb->getkriteria($id);  
        $data = ['datamb' => $datamb];

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('edit_kriteria',$data); 
        echo View('admin_footer'); 
    }

    public function formEditKonversi($id){

        $mb = new datakonversi_model();
        $datamb = $mb->getkonversi($id);  
        $data = ['datamb' => $datamb];

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('edit_konversi',$data); 
        echo View('admin_footer'); 
    }

    public function updateAlternatif(){

        echo view('admin_header');
        echo view('admin_nav');
        echo view('update_alternatif');
        echo view('admin_footer'); 
    }

    public function viewkonversi()
    {
        $mb = new datakonversi_model();
        $datamb = $mb->tampilkonversi();
        $data = array('dataMb'=> $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('view_konversi',$data); 
        echo View('admin_footer');
    }

    public function viewkriteria()
    {
        $mb = new datakriteria_model();
        $datamb = $mb->tampilkriteria();
        $data = array('dataMb'=> $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('viewkriteria',$data); 
        echo View('admin_footer');
    }

    public function tambahKriteria()
    {
        echo View('admin_header');
        echo View('admin_nav');
        echo View('tambah_kriteria'); // Form untuk tambah data kriteria
        echo View('admin_footer');
    }

    // View
    public function tambahKonversi()
    {
        echo View('admin_header');
        echo View('admin_nav');
        echo View('tambah_konversi'); // Form untuk tambah data kriteria
        echo View('admin_footer');
    }


    public function viewnormalisasi()
    {
        $mb = new datanormalisasi_model();
        $datamb = $mb->tampilnormalisasi();
        $data = array('dataMb'=> $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('viewnormalisasi',$data); 
        echo View('admin_footer');
    }
    
    public function viewbobot()
    {
        $mb = new databobot_model();
        $datamb = $mb->tampilbobot();
        $data = array('dataMb'=> $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('viewbobot',$data); 
        echo View('admin_footer');
    }

    public function viewhasil()
    {
        $mb = new datahasil_model();
        $datamb = $mb->tampilhasil();
        $data = array('dataMb'=> $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('viewhasil',$data); 
        echo View('admin_footer');
    }

    public function viewrangking()
    {
        $mb = new datarangking_model();
        $datamb = $mb->tampilranking();
        $data = array('dataMb'=> $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View ('viewrangking',$data); 
        echo View('admin_footer');
    }

}