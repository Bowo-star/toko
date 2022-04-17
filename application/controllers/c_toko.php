<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_toko extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_toko'); 
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

	
	public function ceklogin()
    {
            $user = $this->input->post('username',true);
            $pass = $this->input->post('password',true);
            $cek = $this->m_toko->proseslogin($user,$pass);
            $hasil = count($cek);
            if($hasil > 0){
                $pelogin = $this->db->get_where('admin',array('username'=>$user,'password' =>$pass))->row();
                $level = $pelogin->level;
                $data = array('level' => $level);
                $this->session->set_userdata($data);
                if($level == 'admin'){
                    redirect('c_toko/dashboardadmin');
                }elseif($level == 'gudang'){
                    redirect('c_toko/dashboardgudang');
                }elseif($level == 'owner'){
                    redirect('c_toko/dashboardowner');
                }elseif($level == 'customer'){
                    redirect('c_toko/dashboardcustomer');
                }elseif($level == 'member'){
                    redirect('c_toko/dashboardmember');
                }
            }else{
                echo'<script>window.alert("Username / Password Salah")</script>';
                echo'<script>window.location=("index")</script>';
            }
    }

    public function do_logout(){
        $this->session->sess_destroy();
        redirect('c_toko','refresh');
    }


    public function index(){
        $this->load->view('v_login');
    }

    public function dashboardadmin(){
        $this->load->view('v_dashboardadmin');
    }

    public function dashboardgudang(){
        $this->load->view('v_dashboardgudang');
    }

    public function dashboardowner(){
        $this->load->view('v_dashboardowner');
    }

    public function dashboardcustomer(){
        $this->load->view('v_dashboardcustomer');
    }

    public function dashboardmember(){
        $this->load->view('v_dashboardmember');
    }

 

     //laporan==============================================================================================
    public function laporan(){
        $this->load->view('laporan/v_laporan');
    }



     public function laporantransaksi(){
      $this->data['pembelian'] = $this->m_toko->tampildatapembelian('pembelian');
      $this->data['sum_jumlah'] = $this->m_toko->jumlah();
      $this->data['jumlah_jenis1'] = $this->m_toko->jumlah_jenis1();
        $this->data['jumlah_jenis2'] = $this->m_toko->jumlah_jenis2();
        $this->load->view('laporan/laporan_transaksi', $this->data);
    }

    public function laporanbulan(){
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');

      $where=$tahun."/".$bulan;

      $this->data['produksi'] = $this->m_toko->tanggal($where);
       $this->data['sum_jumlah'] = $this->m_toko->jumlah();
      $this->data['jumlah_jenis1'] = $this->m_toko->jumlah_jenis1();
        $this->data['jumlah_jenis2'] = $this->m_toko->jumlah_jenis2();
      $this->load->view('laporan/laporan_produksi', $this->data);
    }

    //data user ------------------------------------------------------------------------------------------------------------------
     public function tampiluser()
    {
        $this->data['admin'] = $this->m_toko->tampildatauser('admin');
        $this->load->view('user/v_data_user', $this->data);
    }

     public function tambah_user(){
        $this->load->view('user/v_tambah_user');
    }

    public function tambah_customer(){
        $this->load->view('user/v_tambah_customer');
    }

    public function input_user()
    {   
        $nik = $_POST['nik'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['jabatan'];
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        
            $data = array ('nik' => $nik, 'username' => $username, 'password' => $password, 'level' => $level, 'nama' => $nama, 'no_telp' => $no_telp, 'alamat' => $alamat);
            $insert = $this->m_toko->insert_user($data);
        if($insert > 0){
            redirect('c_toko/do_logout');
        }else{
            echo "gagal input";
        }
    }

     public function hapus_user($nik)
    {   
        $this->m_toko->delete_user($nik);
            redirect('c_toko/tampiluser');

    }

     public function ubah_user($nik)
    {
        $data['admin'] = $this->m_toko->select_by_nik($nik)->row();
        $this->load->view('user/v_edit_user', $data);   
    }

    public function proses_edit_user()
    {                 
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');  
        $data['level'] = $this->input->post('level');
      //  print_r($data);
    //die();
        $nik=$this->input->post('nik');  
             
        $this->m_toko->update_user($nik, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampiluser")</script>';   
    }


    //petugas gudang (data produk) ------------------------------------------------------------------------------------------------------
    public function tampilproduk()
    {
        $this->data['produk'] = $this->m_toko->tampildataproduk('produk');
        $this->load->view('produk/v_data_produk', $this->data);
    }

    public function tambah_produk(){
        $this->load->view('produk/v_tambah_produk');
    }

    public function input_produk()
    {   
        $kode = $_POST['id_produk'];
        $nama = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];
        
            $data = array ('id_produk' => $kode, 'nama_barang' => $nama, 'harga' => $harga, 'stok' => $stok, 'deskripsi' => $deskripsi);
            $insert = $this->m_toko->insert_produk($data);
        if($insert > 0){
            redirect('c_toko/tampilproduk');
        }else{
            echo "gagal input";
        }
    }


    public function hapus_produk($kode)
    {   
        $this->m_toko->delete_produk($kode);
            redirect('c_toko/tampilproduk');

    }

    public function ubah_produk($kode)
    {
        $data['produk'] = $this->m_toko->select_by_kode($kode)->row();
        $this->load->view('produk/v_edit_produk', $data); 
    }

    public function proses_edit_produk()
    {          
        $data['nama_barang'] = $this->input->post('nama_barang');
        $data['harga'] = $this->input->post('harga');
        $data['stok'] = $this->input->post('stok');  
        $data['deskripsi'] = $this->input->post('deskripsi');       
        $kode=$this->input->post('id_produk');   
             
        $this->m_toko->update_produk($kode, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampilproduk")</script>';   
    }

    //owner ---------------------------------------------------------------------------------------------
    public function tampilprodukowner()
    {
        $this->data['produk'] = $this->m_toko->tampildataproduk('produk');
        $this->load->view('produk/v_data_produkowner', $this->data);
    }

//customer/member----------------------------------------------------------------------------------------
    public function tampilprodukcustomer()
    {
        $this->data['produk'] = $this->m_toko->tampildataproduk('produk');
        $this->data['pembelian'] = $this->m_toko->tampildatapembelian('pembelian');
        $this->load->view('produk/v_data_produkcustomer', $this->data);
    }

//pembelian----------------------------------------------------------------------------------------------

    public function tampilpembelian()
    {
        $this->data['pembelian'] = $this->m_toko->tampildatapembelian('pembelian');
         $this->data['pembelianmember'] = $this->m_toko->tampildatapembelianmember('pembelianmember');
        $this->load->view('user/v_data_pembelian', $this->data);
    }


    public function tambah_pembelian(){
        $data['buat_kode'] =$this->m_toko->buat_kode();
        $this->data['produk'] = $this->m_toko->tampildataproduk('produk');
        $this->load->view('pembelian/v_tambah_pembelian', $this->data);

    }

    public function input_pembelian()
    {   
        $id_pembelian = $_POST['id_pembelian'];
        $nik = $_POST['nik'];
        $nama_customer = $_POST['nama_customer'];
        $alamat = $_POST['alamat'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $kecamatan = $_POST['kecamatan'];
        $kelurahan = $_POST['kelurahan'];
        $no_telp = $_POST['no_telp'];  

        $id_produk = $_POST['id_produk'];
        //ambil data produk di database
        $produk=$this->m_toko->select_by_kode($id_produk)->row();
        $nama_barang = $produk->nama_barang;

        $stok = $_POST['stok'];  
        $jumlah = $_POST['jumlah'];  
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];

         if ($stok < $jumlah) {
            echo'<script>window.alert("stok barang yang anda ambil kurang")</script>';
            echo'<script>window.location=("tambah_pembelian")</script>';   
        }else{

            $data = array ('id_pembelian' => $id_pembelian, 'nik' => $nik, 'nama_customer' => $nama_customer, 'alamat' => $alamat, 'provinsi' => $provinsi, 'kota' => $kota, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'no_telp' => $no_telp, 'id_produk' => $id_produk, 'nama_barang' => $nama_barang, 'jumlah' => $jumlah, 'tanggal' => $tanggal, 'status' => $status);
            $insert = $this->m_toko->insert_pembelian($data);
        if($insert > 0){
            redirect('c_toko/tampilprodukcustomer');
        }else{
            echo "gagal input";
        }
        }
    }

     public function ubah_pembelian($id_pembelian)
    {
        $data['pembelian'] = $this->m_toko->select_by_id_pembelian($id_pembelian)->row();
        $this->load->view('user/v_edit_pembelian', $data); 
    }

     public function proses_edit_pembelian()
    {          
        $data['tanggal'] = $this->input->post('tanggal');    
        $data['status'] = $this->input->post('status');       
        $id_pembelian=$this->input->post('id_pembelian');   
             
        $this->m_toko->update_pembelian($id_pembelian, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampilpembelian")</script>';   
    }


     public function cek_produk($kode){
         $produk=$this->m_toko->select_by_kode($kode)->row();
         echo json_encode($produk);
     }

//pembelianmember ======================================================================================
    public function tampilpembelianmember()
    {
        $this->data['pembelianmember'] = $this->m_toko->tampildatapembelianmember('pembelianmember');
        $this->load->view('produk/v_data_produkmember', $this->data);
    }

    public function tambah_pembelianmember(){
        $data['buat_kode'] =$this->m_toko->buat_kode();
        $this->load->view('pembelian/v_tambah_pembelianmember');

    }

     public function input_pembelianmember(){
        $id_pembelianm = $_POST['id_pembelianm'];
        $nik = $_POST['nik'];
        $nama_member = $_POST['nama_member'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];  
        $nama_produk = $_POST['nama_produk'];  
        $jumlah = $_POST['jumlah']; 
        $deskripsi = $_POST['deskripsi'];  
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];


            $data = array ('id_pembelianm' => $id_pembelianm, 'nik' => $nik, 'nama_member' => $nama_member, 'alamat' => $alamat, 'no_telp' => $no_telp, 'nama_produk' => $nama_produk, 'jumlah' => $jumlah, 'deskripsi' => $deskripsi, 'tanggal' => $tanggal, 'status' => $status);
            $insert = $this->m_toko->insert_pembelianmember($data);
        if($insert > 0){
            redirect('c_toko/tampilprodukcustomer');
        }else{
            echo "gagal input";
        }
    
    }

     public function ubah_pembelianmember($id_pembelianm)
    {
        $data['pembelianmember'] = $this->m_toko->select_by_id_pembelianmember($id_pembelianm)->row();
        $this->load->view('user/v_edit_pembelianmember', $data); 
    }

     public function proses_edit_pembelianmember()
    {          
        $data['tanggal'] = $this->input->post('tanggal');    
        $data['status'] = $this->input->post('status');       
        $id_pembelianm=$this->input->post('id_pembelian');   
             
        $this->m_toko->update_pembelianmember($id_pembelianm, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampilpembelian")</script>';   
    }



}

?>