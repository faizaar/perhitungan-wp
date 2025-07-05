<?php 
namespace App\Models;
use CodeIgniter\Model;

class datakriteria_model extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id';  // Sesuaikan dengan primary key di tabel Anda
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilkriteria()
    {
        $dataquery=$this->db->query("select * from kriteria");
        return $dataquery->getResult();
    }

    public function getKriteriaById($id)
    {
        $dataquery = $this->db->query("SELECT * FROM kriteria WHERE criteria_id = " . $id);
        return $dataquery->getRow();
    }

    public function saveA($table, $data)
    {   
        // Validasi data sebelum disimpan
        if (empty($data['kriteria_id']) || empty($data['nama']) || empty($data['bobot']) || empty($data['tipe'])) {
        return false;  // Mengembalikan false jika ada data yang kosong
        }

        return $this->db->table($table)->insert($data);
    }

    function hapusA($id)
    {
        $dataquery = $this->db->query("DELETE FROM kriteria WHERE kriteria_id = " . $id);
        return true;
    }

    public function getkriteria($id)
    {
        $dataquery=$this->db->query("select * from kriteria where kriteria_id =".$id);
        return $dataquery->getRow();
    }

    function prosesEditA($table, $data, $where)
    {
        $this->db->table($table)->update($data,$where);
        return true;
    }
    
}