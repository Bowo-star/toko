<?php if ( ! defined('BASEPATH')) exit('no direct script access allowed');

class M_toko extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}  
		
//cek user login---------------------------------------------------------------------------------------------
		public function prosesLogin($user,$pass){
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get('admin')->row();
		}

//tabel produk-------------------------------------------------------------------------------------------------
		public function tampildataproduk($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_produk($data)
		{
		$insert = $this->db->insert('produk',$data);
		return $data;
		}

		public function delete_produk($kode){        
		$this->db->where('id_produk', $kode); 
		$this->db->delete('produk');   
		}

		function select_by_kode($kode)
		{        
		$this->db->select('*'); 
		$this->db->from('produk'); 
		$this->db->where('id_produk', $kode);
		return $this->db->get();
    	}

    	public function update_produk($kode, $data)
		{         
		$this->db->where('id_produk', $kode); 
		$this->db->update('produk', $data); 
		}

//tabel  user------------------------------------------------------------------------------------------------
		public function tampildatauser($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_user($data)
		{
		$insert = $this->db->insert('admin',$data);
		return $data;
		}

		public function delete_user($nik){        
		$this->db->where('nik', $nik); 
		$this->db->delete('admin');   
		}

		function select_by_nik($nik)
		{        
		$this->db->select('*'); 
		$this->db->from('admin'); 
		$this->db->where('nik', $nik);
		return $this->db->get();
    	}

    	public function update_user($nik, $data)
		{         
		
		$this->db->where('nik', $nik); 
		$this->db->update('admin', $data); 	
		}

//pembelian-----------------------------------------------------------------------------------------
		public function tampildatapembelian($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_pembelian($data)
		{
		$insert = $this->db->insert('pembelian',$data);
		return $data;
		}

		public function delete_pembelian($id_pembelian){        
		$this->db->where('id_pembelian', $id_pembelian); 
		$this->db->delete('pembelian');   
		}

		function select_by_id_pembelian($id_pembelian){        
		$this->db->select('*'); 
		$this->db->from('pembelian'); 
		$this->db->where('id_pembelian', $id_pembelian);
		return $this->db->get();
    	}

    	public function update_pembelian($id_pembelian, $data)
		{         
		$this->db->where('id_pembelian', $id_pembelian); 
		$this->db->update('pembelian', $data); 
		}

		//pembelian member ============================================================================
		public function tampildatapembelianmember($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_pembelianmember($data)
		{
		$insert = $this->db->insert('pembelianmember',$data);
		return $data;
		}

		public function delete_pembelianmember($id_pembelianm){        
		$this->db->where('id_pembelianm', $id_pembelianm); 
		$this->db->delete('pembelianmember');   
		}

		function select_by_id_pembelianmember($id_pembelianm){        
		$this->db->select('*'); 
		$this->db->from('pembelianmember'); 
		$this->db->where('id_pembelianm', $id_pembelianm);
		return $this->db->get();
    	}

    	public function update_pembelianmember($id_pembelianm, $data)
		{         
		$this->db->where('id_pembelianm', $id_pembelianm); 
		$this->db->update('pembelianmember', $data); 
		}   		





		//kode otomatis
		public function buat_kode()
        {
        $this->db->select('RIGHT(produk.id_produk,2) as id_produk', FALSE);
          $this->db->order_by('id_produk','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('produk');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_produk) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $tgl=date('Hms'); 
              $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
              $kodetampil = "1".$tgl.$batas;  //format kode
              return $kodetampil;  
        
   		}

   	
   		//laporan pembelian ===========================================================================
    	public function tanggal($tanggal){
		$sql = "SELECT * FROM pembelian WHERE substring(tanggal,1,7) = '$tanggal'";
		$result = $this->db->query($sql);
		return $result->result_array();
		}

    	public function jumlah(){
		$sql = "SELECT sum(jumlah) as jumlah FROM pembelian";
		$result = $this->db->query($sql);
		return $result->row()->jumlah;
		}

		public function jumlah_jenis1(){
		$sql = "SELECT count(nama_barang) as nama_barang FROM pembelian WHERE nama_barang='Jam Analog' ";
		$result = $this->db->query($sql);
		return $result->row()->nama_barang;
		}

		public function jumlah_jenis2(){
		$sql = "SELECT count(nama_barang) as nama_barang FROM pembelian WHERE nama_barang='Jam Digital' ";
		$result = $this->db->query($sql);
		return $result->row()->nama_barang;
		}
	}
?>