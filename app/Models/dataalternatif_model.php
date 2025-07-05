<?php 
namespace App\Models;
use CodeIgniter\Model;

class dataalternatif_model extends Model
{
    
    protected $table = 'alternatif';          // Nama tabel
    
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function saveMhs($tabel,$data)
    {
        $this->db->table($tabel)->insert($data);
        return true;
    }
    function tampilAlternatif()
    {
        $dataquery=$this->db->query("select * from alternatif");
        return $dataquery->getResult();
    }
    public function getsupplier($id)
    {
        $dataquery=$this->db->query("select * from alternatif where polisi_id =".$id);
        return $dataquery->getRow();
    }
    function prosesEditA($table, $data, $where)
    {
        $this->db->table($table)->update($data,$where);
        return true;
    }
    // Menghapus data dari tabel alternatif berdasarkan supplier_id
    function hapusA($id)
    {
        $dataquery = $this->db->query("DELETE FROM alternatif WHERE polisi_id = " . $id);
        return true;
    }
    public function saveA($table, $data)
    {   
        // Validasi data sebelum disimpan
        if (empty($data['polisi_id']) || empty($data['nama'])) {
        return false;  // Mengembalikan false jika ada data yang kosong
        }

        return $this->db->table($table)->insert($data);
    }
    
}