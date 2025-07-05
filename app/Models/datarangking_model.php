<?php 
namespace App\Models;
use CodeIgniter\Model;

class datarangking_model extends Model
{
    protected $table = 'v_ranking_wp';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilranking()
    {
        $dataquery=$this->db->query("select * from v_ranking_wp");
        return $dataquery->getResult();
    }

}