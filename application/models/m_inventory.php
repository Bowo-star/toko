<?php if ( ! defined('BASEPATH')) exit('no direct script access allowed');

class M_inventory extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}  
		
		//cek user login
		public function prosesLogin($user,$pass){
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get('admin')->row();
		}

		//tabel bahanbaku-----------------------------------------------------------------------------------------------------------------
		public function tampildatabahanbaku($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_bahanbaku($data)
		{
		$insert = $this->db->insert('bahanbaku',$data);
		return $data;
		}

		public function delete_bahanbaku($kode){        
		$this->db->where('id_bb', $kode); 
		$this->db->delete('bahanbaku');   
		}

		function select_by_kode($kode)
		{        
		$this->db->select('*'); 
		$this->db->from('bahanbaku'); 
		$this->db->where('id_bb', $kode);
		return $this->db->get();
    	}

    	public function update_bahanbaku($kode, $data)
		{         
		$this->db->where('id_bb', $kode); 
		$this->db->update('bahanbaku', $data); 
		}

		//tabel  user-------------------------------------------------------------------------------------------------------------
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




		//tabel kepala gudang -------------------------------------------------------------------------------------------------------------
	
		public function persetujuan($id_pengadaanbb, $data)
		{         
		$this->db->where('id_pengadaanbb', $id_pengadaanbb); 
		$this->db->update('pengadaan_bb', $data); 
		}


		//pengadaan bahan baku
		public function tampilpengadaanbb($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_pengadaanbb($data)
		{
		$insert = $this->db->insert('pengadaan_bb',$data);
		return $data;
		}

		public function delete_pengadaanbb($id_pengadaanbb){        
		$this->db->where('id_pengadaanbb', $id_pengadaanbb); 
		$this->db->delete('pengadaan_bb');   
		}

		function select_by_id_pengadaanbb($id_pengadaanbb)
		{        
		$this->db->select('*'); 
		$this->db->from('pengadaan_bb'); 
		$this->db->where('id_pengadaanbb', $id_pengadaanbb);
		return $this->db->get();
    	}

    	public function update_pengadanbb($id_pengadaanbb, $data)
		{         
		$this->db->where('id_pengadaanbb', $id_pengadaanbb); 
		$this->db->update('pengadaan_bb', $data); 
		}

		//pengiriman bahan baku--------------------------------------------------------------------------------------------------------------
		public function tampilpengirimanbb($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_pengirimanbb($data)
		{
		$insert = $this->db->insert('pengiriman_bb',$data);
		return $data;
		}

		public function delete_pengirimanbb($id_pengiriman){        
		$this->db->where('id_pengiriman', $id_pengiriman); 
		$this->db->delete('pengiriman_bb');   
		}

		function select_by_id_pengiriman($id_pengiriman)
		{        
		$this->db->select('*'); 
		$this->db->from('pengiriman_bb'); 
		$this->db->where('id_pengiriman', $id_pengiriman);
		return $this->db->get();
    	}

    	public function update_pengiriman($id_pengiriman, $data)
		{         
		$this->db->where('id_pengiriman', $id_pengiriman); 
		$this->db->update('pengiriman_bb', $data); 
		}

		//pembelian (kelola supplier)----------------------------------------------------------------------------------------------------
		public function tampildatasupplier($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_supplier($data)
		{
		$insert = $this->db->insert('supplier',$data);
		return $data;
		}

		public function delete_supplier($id_supplier){        
		$this->db->where('id_supplier', $id_supplier); 
		$this->db->delete('supplier');   
		}

		function select_by_id_supplier($id_supplier)
		{        
		$this->db->select('*'); 
		$this->db->from('supplier'); 
		$this->db->where('id_supplier', $id_supplier);
		return $this->db->get();
    	}

    	public function update_supplier($id_supplier, $data)
		{         
		
		$this->db->where('id_supplier', $id_supplier); 
		$this->db->update('supplier', $data); 	
		}

		//pembelian (kelola pemesanan)---------------------------------------------------------------------------------------------------
		public function tampildatapemesanan($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_pemesanan($data)
		{
		$insert = $this->db->insert('pemesanan',$data);
		return $data;
		}

		public function delete_pemesanan($id_pemesanan){        
		$this->db->where('id_pemesanan', $id_pemesanan); 
		$this->db->delete('pemesanan');   
		}

		public function buat_kode_pemesanan()
     	{
       
              $tgl=date('dmY'); 
              $jam=time('');
              
              $kodetampil = "P".$jam.$tgl;  //format kode
              return $kodetampil;  
        }

		//supplier (kelola produk)--------------------------------------------------------------------------------------------------------
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

		public function delete_produk($id_produk){        
		$this->db->where('id_produk', $id_produk); 
		$this->db->delete('produk');   
		}

		function select_by_id_produk($id_produk)
		{        
		$this->db->select('*'); 
		$this->db->from('produk'); 
		$this->db->where('id_produk', $id_produk);
		return $this->db->get();
    	}

    	public function update_produk($id_produk, $data)
		{         
		
		$this->db->where('id_produk', $id_produk); 
		$this->db->update('produk', $data); 	
		}

		//supplier (update pemesanan)-----------------------------------------------------------------------------------------------------
		function select_by_id_pemesanan($id_pemesanan)
		{        
		$this->db->select('*'); 
		$this->db->from('pemesanan'); 
		$this->db->where('id_pemesanan', $id_pemesanan);
		return $this->db->get();
    	}

    	public function update_pemesanan($id_pemesanan, $data)
		{         
		
		$this->db->where('id_pemesanan', $id_pemesanan); 
		$this->db->update('pemesanan', $data); 	
		}

		//marketing (kelola wo)-----------------------------------------------------------------------------------------------------------
		public function tampildatawo($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_wo($data)
		{
		$insert = $this->db->insert('wo',$data);
		return $data;
		}

		function select_by_id_wo($id_wo)
		{        
		$this->db->select('*'); 
		$this->db->from('wo'); 
		$this->db->where('id_wo', $id_wo);
		return $this->db->get();
    	}

		public function delete_wo($id_wo){        
		$this->db->where('id_wo', $id_wo); 
		$this->db->delete('wo');   
		}

		//produksi (kelola produksi)-----------------------------------------------------------------------------------------------------
		public function tampildataproduksi($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function tampildataproduksi2()
		{

		$data = $this->db->query('SELECT * FROM produksi WHERE status="Disetujui"');
		return $data->result_array();
		}

		public function insert_produksi($data)
		{
		$insert = $this->db->insert('produksi',$data);
		return $data;
		}

		public function delete_produksi($id_produksi){        
		$this->db->where('id_produksi', $id_produksi); 
		$this->db->delete('produksi');   
		}

		function select_by_id_produksi($id_produksi)
		{        
		$this->db->select('*'); 
		$this->db->from('produksi'); 
		$this->db->where('id_produksi', $id_produksi);
		return $this->db->get();
    	}

    	public function update_produksi($id_produksi, $data)
		{         
		
		$this->db->where('id_produksi', $id_produksi); 
		$this->db->update('produksi', $data); 	
		}

		

		//produksi(kelola permintaanbb)--------------------------------------------------------------------------------------------------
		public function tampildatapermintaan($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_permintaan($data)
		{
		$insert = $this->db->insert('permintaan_bb',$data);
		return $data;
		}

		public function delete_permintaan($id_permintaan){        
		$this->db->where('id_permintaan', $id_permintaan); 
		$this->db->delete('permintaan_bb');   
		}

		function select_by_id_permintaan($id_permintaan)
		{        
		$this->db->select('*'); 
		$this->db->from('permintaan_bb'); 
		$this->db->where('id_permintaan', $id_permintaan);
		return $this->db->get();
    	}

    	public function update_permintaan($id_permintaan, $data)
		{         
		
		$this->db->where('id_permintaan', $id_permintaan); 
		$this->db->update('permintaan_bb', $data); 	
		}

		//gudang jadi-------------------------------------------------------------------------------------------------------------------
		public function tampilpengirimanproduksi($table)
		{
		$data = $this->db->get($table);
		return $data->result_array();
		}

		public function insert_pengirimanproduksi($data)
		{
		$insert = $this->db->insert('hasil_produksi',$data);
		return $data;
		}

		public function delete_pengirimanproduksi($id_pengiriman){        
		$this->db->where('id_pengiriman', $id_pengiriman); 
		$this->db->delete('hasil_produksi');   
		}


		//kode otomatis
		public function buat_kode()
        {
        $this->db->select('RIGHT(produksi.id_produksi,2) as id_produksi', FALSE);
          $this->db->order_by('id_produksi','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('produksi');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_produksi) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $tgl=date('Hms'); 
              $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
              $kodetampil = "1".$tgl.$batas;  //format kode
              return $kodetampil;  
        
    }

    	//laporan produksi
    	public function tanggal($tanggal){
		$sql = "SELECT * FROM produksi WHERE substring(tgl_produksi,1,7) = '$tanggal'";
		$result = $this->db->query($sql);
		return $result->result_array();
		}

    	public function jumlah(){
		$sql = "SELECT sum(jumlah) as jumlah FROM produksi";
		$result = $this->db->query($sql);
		return $result->row()->jumlah;
		}

		public function jumlah_jenis1(){
		$sql = "SELECT count(jenis_wo) as jenis_wo FROM produksi WHERE jenis_wo='stethoscope' ";
		$result = $this->db->query($sql);
		return $result->row()->jenis_wo;
		}

		public function jumlah_jenis2(){
		$sql = "SELECT count(jenis_wo) as jenis_wo FROM produksi WHERE jenis_wo='Sphygmomanometer' ";
		$result = $this->db->query($sql);
		return $result->row()->jenis_wo;
		}

    }

