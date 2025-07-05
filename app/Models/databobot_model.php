<?php 
namespace App\Models;
use CodeIgniter\Model;

class databobot_model extends Model
{
    protected $table = 'v_bobot_preferensi';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilbobot()
    {
        $dataquery=$this->db->query("select * from v_bobot_preferensi");
        return $dataquery->getResult();
    }

}