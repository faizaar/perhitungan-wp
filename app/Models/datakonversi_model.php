<?php 
namespace App\Models;
use CodeIgniter\Model;

class datakonversi_model extends Model
{
    protected $table = 'konversi_data';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilkonversi()
    {
        $dataquery=$this->db->query("select * from konversi_data");
        return $dataquery->getResult();
    }

    public function saveA($table, $data)
    {   
        // Validasi data sebelum disimpan
        if (empty($data['id']) || empty($data['polisi_id']) || empty($data['kriteria_id']) || empty($data['nilai'])) {
        return false;  // Mengembalikan false jika ada data yang kosong
        }

        return $this->db->table($table)->insert($data);
    }

    function hapusA($id)
    {
        $dataquery = $this->db->query("DELETE FROM konversi_data WHERE id = " . $id);
        return true;
    }

    public function getkonversi($id)
    {
        $dataquery=$this->db->query("select * from konversi_data where id =".$id);
        return $dataquery->getRow();
    }

    function prosesEditA($table, $data, $where)
    {
        $this->db->table($table)->update($data,$where);
        return true;
    }

}