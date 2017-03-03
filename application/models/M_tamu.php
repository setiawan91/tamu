<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_tamu extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    var $table_name = 'tamu';

	
    public function getById($id) {
         $query = $this->db->where('id',$id)->get('tamu');
        if ($query->num_rows() > 0) {
            $result = $query->row_object();
            $query->free_result();
            return $result;
        }
		return false;
    }
	
	public function get() {
      
        $query = $this->db->order_by('id','desc')->get('tamu');
        if ($query->num_rows() > 0) {
            $result = $query->result_object();
            $query->free_result();
            return $result;
        }
		return false;
    }
	

	
	function get_count()
    {
        $query = $this->db->get($this->table_name);
        return $query->num_rows();
    }
	
	function getkodeunik() { 
        $q = $this->db->query("SELECT MAX(RIGHT(kode,4)) AS idmax FROM tamu");
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%05s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "0001";
        }
        $kar = "ID"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   } 
	

    function insert($data) {

    	$qry   = "INSERT INTO tamu(nama,email,telp,alamat,kode) VALUES ( ";           
        $qry  .= "'".$data['nama']."','".$data['email']."',";
        $qry  .= "'".$data['telp']."','".$data['alamat']."','".$data['kode']."')";      
           
            $query = $this->db->query($qry);
            if($query){
                return true;
            }else{
                return false;
            }
		// if($this->db->insert($this->table_name, $par)){
		// 	return true;
	 //   }else{
		// 	return false;
	 //   }
    }


    function update($data, $id) {
        $this->db->where('id', $id);
		if( $this->db->update($this->table_name, $data)){
			return true;
		}else{
			return false;
		}
    }
	
	
    function delete($id) {
		$this->db->where('id', $id);
		if( $this->db->delete($this->table_name) ){
			return true;
		}else{
			return false;
		}
    }

	
	
}

