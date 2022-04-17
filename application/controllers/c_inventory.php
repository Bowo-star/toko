<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_inventory extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_inventory'); //memasukkan file model m_login.php ke dalam controller
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

	
	public function ceklogin()
    {
            $user = $this->input->post('username',true);
            $pass = $this->input->post('password',true);
            $cek = $this->m_inventory->proseslogin($user,$pass);
            $hasil = count($cek);
            if($hasil > 0){
                $pelogin = $this->db->get_where('admin',array('username'=>$user,'password' =>$pass))->row();
                $level = $pelogin->level;
                $data = array('level' => $level);
                $this->session->set_userdata($data);
                if($level == 'admin'){
                    redirect('c_inventory/dashboardadmin');
                }elseif($level == 'petugas gudang'){
                    redirect('c_inventory/dashboardpetugas');
                }elseif($level == 'kepala gudang'){
                    redirect('c_inventory/dashboardkepala');
                }elseif($level == 'bagian pembelian'){
                    redirect('c_inventory/dashboardpembelian');
                }elseif($level == 'supplier'){
                    redirect('c_inventory/dashboardsupplier');
                }elseif($level == 'bagian marketing'){
                    redirect('c_inventory/dashboardmarketing');
                }elseif($level == 'petugas produksi'){
                    redirect('c_inventory/dashboardproduksi');
                }elseif($level == 'spv. produksi'){
                    redirect('c_inventory/dashboardspv');
                }elseif($level == 'bagian gudang jadi'){
                    redirect('c_inventory/dashboardgudangjadi');
                }
            }else{
                echo'<script>window.alert("Username / Password Salah")</script>';
                echo'<script>window.location=("index")</script>';
            }
    }

    public function do_logout(){
        $this->session->sess_destroy();
        redirect('c_inventory','refresh');
    }


    public function index(){
        $this->load->view('v_login');
    }

    public function dashboardadmin(){
        $this->load->view('v_dashboardadmin');
    }

    public function dashboardpetugas(){
        $this->load->view('v_dashboardpetugas');
    }

    public function dashboardkepala(){
        $this->load->view('v_dashboardkepala');
    }

    public function dashboardpembelian(){
        $this->load->view('v_dashboardpembelian');
    }

     public function dashboardsupplier(){
        $this->load->view('v_dashboardsupplier');
    }
     
    public function dashboardmarketing(){
        $this->load->view('v_dashboardmarketing');
    }

    public function dashboardproduksi(){
        $this->load->view('v_dashboardproduksi');
    }

    public function dashboardspv(){
        $this->load->view('v_dashboardspv');
    }

     public function dashboardgudangjadi(){
        $this->load->view('v_dashboardgudangjadi');
    }

 

     //laporan==================================================================================================
     public function laporan(){
        $this->load->view('laporan/v_laporan');
    }

    public function detailpengirimanbb(){
      $this->data['pengiriman_bb'] = $this->m_inventory->tampilpengirimanbb('pengiriman_bb');
        $this->load->view('laporan/detail_pengirimanbb', $this->data);
    }

    public function detailpermintaanbb(){
      $this->data['permintaan_bb'] = $this->m_inventory->tampildatapermintaan('permintaan_bb');
        $this->load->view('laporan/detail_permintaanbb', $this->data);
    }

     public function detailpengirimanproduksi(){
      $this->data['hasil_produksi'] = $this->m_inventory->tampilpengirimanproduksi('hasil_produksi');
        $this->load->view('laporan/detail_pengirimanproduksi', $this->data);
    }

     public function laporanproduksi(){
      $this->data['produksi'] = $this->m_inventory->tampildataproduksi('produksi');
      $this->data['sum_jumlah'] = $this->m_inventory->jumlah();
      $this->data['jumlah_jenis1'] = $this->m_inventory->jumlah_jenis1();
        $this->data['jumlah_jenis2'] = $this->m_inventory->jumlah_jenis2();
        $this->load->view('laporan/laporan_produksi', $this->data);
    }

    public function laporanbulan(){
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');

      $where=$tahun."/".$bulan;

      $this->data['produksi'] = $this->m_inventory->tanggal($where);
       $this->data['sum_jumlah'] = $this->m_inventory->jumlah();
      $this->data['jumlah_jenis1'] = $this->m_inventory->jumlah_jenis1();
        $this->data['jumlah_jenis2'] = $this->m_inventory->jumlah_jenis2();
      $this->load->view('laporan/laporan_produksi', $this->data);
    }

    //data user ------------------------------------------------------------------------------------------------------------------
     public function tampiluser()
    {
        $this->data['admin'] = $this->m_inventory->tampildatauser('admin');
        $this->load->view('user/v_data_user', $this->data);
    }

     public function tambah_user(){
        $this->load->view('user/v_tambah_user');
    }

    public function input_user()
    {   
        $nik = $_POST['nik'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['jabatan'];
        
            $data = array ('nik' => $nik, 'username' => $username, 'password' => $password, 'level' => $level);
            $insert = $this->m_inventory->insert_user($data);
        if($insert > 0){
            redirect('c_inventory/tampiluser');
        }else{
            echo "gagal input";
        }
    }

     public function hapus_user($nik)
    {   
        $this->m_inventory->delete_user($nik);
            redirect('c_inventory/tampiluser');


    }

     public function ubah_user($nik)
    {
        $data['admin'] = $this->m_inventory->select_by_nik($nik)->row();
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
             
        $this->m_inventory->update_user($nik, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampiluser")</script>';   
    }


    //petugas gudang (data bahanbaku) ------------------------------------------------------------------------------------------------------
    public function tampilbahanbaku()
    {
        $this->data['bahanbaku'] = $this->m_inventory->tampildatabahanbaku('bahanbaku');
        $this->load->view('bahanbaku/v_data_bahanbaku', $this->data);
    }

    public function tambah_bahanbaku(){
        $this->load->view('bahanbaku/v_tambah_bahanbaku');
    }

    public function input_bahanbaku()
    {   
        $kode = $_POST['idbb'];
        $nama = $_POST['namabb'];
        $kategori = $_POST['kategori'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $exp = $_POST['exp'];
        
            $data = array ('id_bb' => $kode, 'nama' => $nama, 'kategori' => $kategori, 'stok' => $stok, 'satuan' => $satuan, 'harga_beli' => $harga, 'expired' => $exp);
            $insert = $this->m_inventory->insert_bahanbaku($data);
        if($insert > 0){
            redirect('c_inventory/tampilbahanbaku');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_bahanbaku($kode)
    {   
        $this->m_inventory->delete_bahanbaku($kode);
            redirect('c_inventory/tampilbahanbaku');

    }

    public function ubah_bahanbaku($kode)
    {
        $data['bahanbaku'] = $this->m_inventory->select_by_kode($kode)->row();
        $this->load->view('bahanbaku/v_edit_bahanbaku', $data);   
    }

    public function proses_edit_bahanbaku()
    {          
        $data['nama'] = $this->input->post('namabb');
        $data['kategori'] = $this->input->post('kategori');
        $data['stok'] = $this->input->post('stok');  
        $data['satuan'] = $this->input->post('satuan');
        $data['harga_beli'] = $this->input->post('harga');  
        $data['expired'] = $this->input->post('exp');          
        $kode=$this->input->post('idbb');   
             
        $this->m_inventory->update_bahanbaku($kode, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampilbahanbaku")</script>';   
    }


    // petugas gudang (pengadaan bb)-----------------------------------------------------------------------------------------
    public function tampilpengadaanbb()
    {
        $this->data['pengadaan_bb'] = $this->m_inventory->tampilpengadaanbb('pengadaan_bb');
        $this->load->view('pengadaanbb/v_data_pengadaanbb', $this->data);
    }

    public function tambah_pengadaanbb(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->data['bahanbaku'] = $this->m_inventory->tampildatabahanbaku('bahanbaku');
        $this->load->view('pengadaanbb/v_tambah_pengadaanbb', $this->data);
    }

    public function input_pengadaanbb()
    {   
        $id_pengadaanbb = $_POST['id_pengadaanbb'];
        $id_bb = $_POST['id_bb'];

        //ambil data bahanbaku di database
        $bahanbaku=$this->m_inventory->select_by_kode($id_bb)->row();
        $nama = $bahanbaku->nama;
        
        $jumlah = $_POST['jumlah'];
        $status = $_POST['status'];
        
            $data = array ('id_pengadaanbb' => $id_pengadaanbb, 'id_bb' => $id_bb, 'nama_bb' => $nama, 'jumlah' => $jumlah, 'status' => $status);
            $insert = $this->m_inventory->insert_pengadaanbb($data);
        if($insert > 0){
            redirect('c_inventory/tampilpengadaanbb');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_pengadaanbb($id_pengadaanbb)
    {   
        $this->m_inventory->delete_pengadaanbb($id_pengadaanbb);
            redirect('c_inventory/tampilpengadaanbb');
    }

     public function cekbb($kode){
         $bahanbaku=$this->m_inventory->select_by_kode($kode)->row();
         echo json_encode($bahanbaku);
     }



    //petugas gudang  (pengiriman bahan baku)----------------------------------------------------------------------------------------------
     public function tampilpengirimanbb()
    {
        $this->data['permintaan_bb'] = $this->m_inventory->tampildatapermintaan('permintaan_bb');
        $this->data['pengiriman_bb'] = $this->m_inventory->tampilpengirimanbb('pengiriman_bb');
        $this->load->view('pengirimanbb/v_data_pengiriman', $this->data);
    }

    public function tambah_pengirimanbb(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->data['bahanbaku'] = $this->m_inventory->tampildatabahanbaku('bahanbaku');
        $this->data['permintaan_bb'] = $this->m_inventory->tampildatapermintaan('permintaan_bb');
        $this->load->view('pengirimanbb/v_tambah_pengiriman', $this->data);
    }

    public function input_pengirimanbb()
    {   
        $id_pengiriman = $_POST['id_pengiriman'];
        $id_permintaan = $_POST['id_permintaan'];

        //ambil data permintaan di database
        $permintaan_bb=$this->m_inventory->select_by_id_permintaan($id_permintaan)->row();
        $jenis_produksi = $permintaan_bb->jenis_produksi;
        $nama_bb = $permintaan_bb->nama_bb;
        $jumlah = $permintaan_bb->jumlah;
        $tgl_permintaan = $permintaan_bb->tgl_permintaan;
        
        $id_bb = $_POST['id_bb'];
        $tgl_pengiriman = $_POST['tgl_pengiriman'];
        $status_pengiriman = $_POST['status_pengiriman'];
        $status = $_POST['status'];
        $stok = $_POST['stok'];

          if ($jumlah > $stok) {
            echo'<script>window.alert("stok bahan baku yang anda ambil kurang")</script>';
            echo'<script>window.location=("tambah_pengirimanbb")</script>';   
        }else{
        
            $data = array ('id_pengiriman' => $id_pengiriman, 'id_permintaan' => $id_permintaan, 'jenis_produksi' => $jenis_produksi, 'id_bb' => $id_bb, 'nama_bb' => $nama_bb, 'jumlah' => $jumlah, 'tgl_permintaan' => $tgl_permintaan, 'tgl_pengiriman' => $tgl_pengiriman, 'status_pengiriman' => $status_pengiriman, 'status' => $status);
            $insert = $this->m_inventory->insert_pengirimanbb($data);
        if($insert > 0){
            redirect('c_inventory/tampilpengirimanbb');
        }else{
            echo "gagal input";
        }
    }
    }

    public function hapus_pengirimanbb($id_pengiriman)
    {   
        $this->m_inventory->delete_pengirimanbb($id_pengiriman);
            redirect('c_inventory/tampilpengirimanbb');
    }

    public function updatepengiriman($id_pengiriman)
    {
        $data['pengiriman_bb'] = $this->m_inventory->select_by_id_pengiriman($id_pengiriman)->row();
        $this->load->view('pengirimanbb/update_pengirimanbb', $data); 
    }

    public function update_proses_pengiriman()
    {          
        $data['id_permintaan'] = $this->input->post('id_permintaan');
        $data['jenis_produksi'] = $this->input->post('jenis_produksi');  
        $data['id_bb'] = $this->input->post('id_bb');
        $data['nama_bb'] = $this->input->post('nama_bb');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['tgl_permintaan'] = $this->input->post('tgl_permintaan');
        $data['tgl_pengiriman'] = $this->input->post('tgl_pengiriman');
        $data['status_pengiriman'] = $this->input->post('status_pengiriman');
        $data['status'] = $this->input->post('status');
        $id_pengiriman=$this->input->post('id_pengiriman');  
             
        $this->m_inventory->update_pengiriman($id_pengiriman, $data);        
            echo'<script>window.alert("Berhasil diupdate")</script>';
            echo'<script>window.location=("tampilpengirimanbb")</script>';   
    }  


     public function cek_permintaan($id_permintaan){
         $permintaan_bb=$this->m_inventory->select_by_id_permintaan($id_permintaan)->row();
         echo json_encode($permintaan_bb);
     }


    //kepala gudang -----------------------------------------------------------------------------------------------------------
    public function tampilbarangkepala()
    {
        $this->data['bahanbaku'] = $this->m_inventory->tampildatabahanbaku('bahanbaku');
        $this->data['pengadaan_bb'] = $this->m_inventory->tampilpengadaanbb('pengadaan_bb');
        $this->load->view('pengadaanbb/v_data_pengadaanbbkepala', $this->data);
    }

    public function tampilpengirimankepala()
    {
        $this->data['pengiriman_bb'] = $this->m_inventory->tampilpengirimanbb('pengiriman_bb');
        $this->load->view('pengirimanbb/v_data_pengirimankepala', $this->data);
    }



   public function persetujuan($id_pengadaanbb)
    {
        $data['pengadaan_bb'] = $this->m_inventory->select_by_id_pengadaanbb($id_pengadaanbb)->row();
        $this->load->view('kepalagudang/v_edit_persetujuan', $data);   
    }


    public function proses_persetujuan()
    {          
        $data['nama_bb'] = $this->input->post('nama_bb');
        $data['jumlah'] = $this->input->post('jumlah');  
        $data['status'] = $this->input->post('status');
        $id_pengadaanbb=$this->input->post('id_pengadaanbb');  
             
        $this->m_inventory->persetujuan($id_pengadaanbb, $data);        
            echo'<script>window.alert("Berhasil diupdate")</script>';
            echo'<script>window.location=("tampilbarangkepala")</script>';   
    }

    public function pengiriman($id_pengiriman)
    {
        $data['pengiriman_bb'] = $this->m_inventory->select_by_id_pengiriman($id_pengiriman)->row();
        $this->load->view('kepalagudang/v_edit_pengiriman', $data); 
    }

    public function proses_pengiriman()
    {          
        $data['id_permintaan'] = $this->input->post('id_permintaan');
        $data['jenis_produksi'] = $this->input->post('jenis_produksi');  
        $data['id_bb'] = $this->input->post('id_bb');
        $data['nama_bb'] = $this->input->post('nama_bb');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['tgl_permintaan'] = $this->input->post('tgl_permintaan');
        $data['tgl_pengiriman'] = $this->input->post('tgl_pengiriman');
        $data['status'] = $this->input->post('status');
        $id_pengiriman=$this->input->post('id_pengiriman');  
             
        $this->m_inventory->update_pengiriman($id_pengiriman, $data);        
            echo'<script>window.alert("Berhasil diupdate")</script>';
            echo'<script>window.location=("tampilpengirimankepala")</script>';   
    }

    //pembelian (kelola Supplier)-----------------------------------------------------------------------------------------------
    public function tampilsupplier()
    {
        $this->data['supplier'] = $this->m_inventory->tampildatasupplier('supplier');
        $this->load->view('pembelian/supplier/v_data_supplier', $this->data);
    }

    public function tambah_supplier(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->load->view('pembelian/supplier/v_tambah_supplier');
    }

    public function input_supplier()
    {   
        $id_supplier = $_POST['id_supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $no_telp = $_POST['no_telp'];
        $tgl_bergabung = $_POST['tgl_bergabung'];
        
            $data = array ('id_supplier' => $id_supplier, 'nama_supplier' => $nama_supplier, 'alamat' => $alamat, 'email' => $email, 'no_telp' => $no_telp, 'tgl_bergabung' => $tgl_bergabung);
            $insert = $this->m_inventory->insert_supplier($data);
        if($insert > 0){
            redirect('c_inventory/tampilsupplier');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_supplier($id_supplier)
    {   
        $this->m_inventory->delete_supplier($id_supplier);
            redirect('c_inventory/tampilsupplier');
    }

    public function ubah_supplier($id_supplier)
    {
        $data['supplier'] = $this->m_inventory->select_by_id_supplier($id_supplier)->row();
        $this->load->view('pembelian/supplier/v_edit_supplier', $data);   
    }

    public function proses_edit_supplier()
    {          
        $data['nama_supplier'] = $this->input->post('nama_supplier');
        $data['alamat'] = $this->input->post('alamat');
        $data['email'] = $this->input->post('email');  
        $data['no_telp'] = $this->input->post('no_telp');
        $data['tgl_bergabung'] = $this->input->post('tgl_bergabung');          
        $id_supplier=$this->input->post('id_supplier');   
             
        $this->m_inventory->update_supplier($id_supplier, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampilsupplier")</script>';   
    }

    //pembelian (kelola pemesanan)------------------------------------------------------------------------------------------------
     public function tampilpemesanan()
    {
        $this->data['pemesanan'] = $this->m_inventory->tampildatapemesanan('pemesanan');
        $this->data['pengadaan_bb'] = $this->m_inventory->tampilpengadaanbb('pengadaan_bb');
        $this->load->view('pembelian/pemesanan/v_data_pemesanan', $this->data);
    }


    public function tambah_pemesanan(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->data['pengadaan_bb'] = $this->m_inventory->tampilpengadaanbb('pengadaan_bb');
        $this->load->view('pembelian/pemesanan/v_tambah_pemesanan', $this->data);

    }

    public function input_pemesanan()
    {   
        $id_pemesanan = $_POST['id_pemesanan'];
        $id_pengadaanbb = $_POST['id_pengadaanbb'];
        
        //ambil data pengadaan_bb di database
        $pengadaanbb=$this->m_inventory->select_by_id_pengadaanbb($id_pengadaanbb)->row();
        $id_bb = $pengadaanbb->id_bb;
        $nama_bb = $pengadaanbb->nama_bb;
        $jumlah = $pengadaanbb->jumlah;
       
        $tgl_pemesanan = $_POST['tgl_pemesanan'];
        $tgl_diterima = $_POST['tgl_diterima'];
        $status_pemesanan = $_POST['status_pemesanan'];
        
            $data = array ('id_pemesanan' => $id_pemesanan, 'id_pengadaanbb' => $id_pengadaanbb, 'id_bb' => $id_bb, 'nama_bb' => $nama_bb, 'jumlah' => $jumlah, 'tgl_pemesanan' => $tgl_pemesanan, 'tgl_diterima' => $tgl_diterima, 'status_pemesanan' => $status_pemesanan);
            $insert = $this->m_inventory->insert_pemesanan($data);
        if($insert > 0){
            redirect('c_inventory/tampilpemesanan');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_pemesanan($id_pemesanan)
    {   
        $this->m_inventory->delete_pemesanan($id_pemesanan);
            redirect('c_inventory/tampilpemesanan');
    }

     public function cek_pengadaan($id_pengadaanbb){
         $pengadaanbb=$this->m_inventory->select_by_id_pengadaanbb($id_pengadaanbb)->row();
         echo json_encode($pengadaanbb);
     }

    
    //supplier (kelola produk)---------------------------------------------------------------------------------------------------------
    public function tampilproduk()
    {
        $this->data['produk'] = $this->m_inventory->tampildataproduk('produk');
        $this->load->view('supplier/v_data_produk', $this->data);
    }

    public function tambah_produk(){
     
        $this->data['supplier'] = $this->m_inventory->tampildatasupplier('supplier');
        $this->load->view('supplier/v_tambah_produk', $this->data);
    }

    public function input_produk(){   
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $id_supplier = $_POST['id_supplier'];

        //ambil data pengadaan_bb di database
        $supplier=$this->m_inventory->select_by_id_supplier($id_supplier)->row();
        $nama_supplier = $supplier->nama_supplier;

        $merek = $_POST['merek'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        
            $data = array ('id_produk' => $id_produk, 'nama_produk' => $nama_produk, 'id_supplier' => $id_supplier, 'nama_supplier' => $nama_supplier, 'merek' => $merek, 'stok' => $stok, 'harga' => $harga, 'deskripsi' => $deskripsi);
            $insert = $this->m_inventory->insert_produk($data);
        if($insert > 0){
            redirect('c_inventory/tampilproduk');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_produk($id_produk)
    {   
        $this->m_inventory->delete_produk($id_produk);
            redirect('c_inventory/tampilproduk');
    }

    public function ubah_produk($id_produk)
    {
        $data['produk'] = $this->m_inventory->select_by_id_produk($id_produk)->row();
        $this->load->view('supplier/v_edit_produk', $data);   
    }

    public function proses_edit_produk()
    {          
        $data['nama_produk'] = $this->input->post('nama_produk');
        $data['id_supplier'] = $this->input->post('id_supplier');
        $data['nama_supplier'] = $this->input->post('nama_supplier');
        $data['merek'] = $this->input->post('merek');
        $data['stok'] = $this->input->post('stok');  
        $data['harga'] = $this->input->post('harga');
        $data['deskripsi'] = $this->input->post('deskripsi');          
        $id_produk=$this->input->post('id_produk');   
             
        $this->m_inventory->update_produk($id_produk, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampilproduk")</script>';   
    }


     public function cek_supplier($id_supplier){
         $supplier=$this->m_inventory->select_by_id_supplier($id_supplier)->row();
         echo json_encode($supplier);
     }


    //supplier (update pemesanan)------------------------------------------------------------------------------------------------------
     public function tampilupdatepemesanan()
    {
        $this->data['pemesanan'] = $this->m_inventory->tampildatapemesanan('pemesanan');
        $this->load->view('supplier/v_data_update_pemesanan', $this->data);
    }

    public function ubah_pemesanan($id_pemesanan)
    {
        $data['pemesanan'] = $this->m_inventory->select_by_id_pemesanan($id_pemesanan)->row();
        $this->load->view('supplier/v_update_pemesanan', $data);   
    }

    public function proses_edit_pemesanan()
    {          
        $data['id_pengadaanbb'] = $this->input->post('id_pengadaanbb');
        $data['nama_bb'] = $this->input->post('nama_bb');
        $data['jumlah'] = $this->input->post('jumlah');  
        $data['tgl_pemesanan'] = $this->input->post('tgl_pemesanan');
        $data['tgl_diterima'] = $this->input->post('tgl_terima');   
        $data['status_pemesanan'] = $this->input->post('status_pemesanan');          
        $id_pemesanan=$this->input->post('id_pemesanan');   
             
        $this->m_inventory->update_pemesanan($id_pemesanan, $data);        
            echo'<script>window.alert("Berhasil Terubah")</script>';
            echo'<script>window.location=("tampilupdatepemesanan")</script>';   
    }

    //marketing (kelola wo)---------------------------------------------------------------------------------------------------------------
     public function tampilwo()
    {
        $this->data['wo'] = $this->m_inventory->tampildatawo('wo');
        $this->load->view('marketing/v_data_wo', $this->data);
    }


    public function tambah_wo(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->load->view('marketing/v_tambah_wo');
    }

    public function input_wo()
    {   
        $id_wo = $_POST['id_wo'];
        $tanggal = $_POST['tanggal'];
        $jenis_wo = $_POST['jenis_wo'];
        $jumlah = $_POST['jumlah'];
        $nama_costumer = $_POST['nama_costumer'];
        $nama_perusahaan = $_POST['nama_perusahaan'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $no_telepon = $_POST['no_telepon'];

            $data = array ('id_wo' => $id_wo, 'tanggal' => $tanggal, 'jenis_wo' => $jenis_wo, 'jumlah' => $jumlah, 'nama_costumer' => $nama_costumer, 'nama_perusahaan' => $nama_perusahaan, 'alamat' => $alamat, 'kota' => $kota, 'no_telepon' => $no_telepon);
            $insert = $this->m_inventory->insert_wo($data);
        if($insert > 0){
            redirect('c_inventory/tampilwo');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_wo($id_wo)
    {   
        $this->m_inventory->delete_wo($id_wo);
            redirect('c_inventory/tampilwo');
    }

    //produksi (kelola produksi)---------------------------------------------------------------------------------------------------------
     public function tampilproduksi()
    {
        $this->data['wo'] = $this->m_inventory->tampildatawo('wo');
        $this->data['produksi'] = $this->m_inventory->tampildataproduksi('produksi');
        $this->load->view('produksi/produksi/v_data_produksi', $this->data);
    }

    public function tambah_produksi(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->data['cekwo'] = $this->m_inventory->tampildatawo('wo');
        $this->load->view('produksi/produksi/v_tambah_produksi',$this->data);
    }

    public function input_produksi(){   
        $id_produksi = $_POST['id_produksi'];
        $id_wo = $_POST['id_wo'];

        //ambil data wo di database
        $wo=$this->m_inventory->select_by_id_wo($id_wo)->row();
        $jenis_wo = $wo->jenis_wo;
        $jumlah = $wo->jumlah;

        $tgl_produksi = $_POST['tgl_produksi'];
        $tgl_selesai = $_POST['tgl_selesai'];
        $status = $_POST['status'];
        
        
            $data = array ('id_produksi' => $id_produksi, 'id_wo' => $id_wo, 'jenis_wo' => $jenis_wo, 'jumlah' => $jumlah, 'tgl_produksi' => $tgl_produksi, 'tgl_selesai' => $tgl_selesai, 'status' => $status);
            $insert = $this->m_inventory->insert_produksi($data);
        if($insert > 0){
            redirect('c_inventory/tampilproduksi');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_produksi($id_produksi)
    {   
        $this->m_inventory->delete_produksi($id_produksi);
            redirect('c_inventory/tampilproduksi');
    }

    public function ubah_selesai($id_produksi)
    {
        $data['produksi'] = $this->m_inventory->select_by_id_produksi($id_produksi)->row();
        $this->load->view('produksi/produksi/update_selesai', $data);   
    }

    public function proses_edit_selesai()
    {          
        $data['id_wo'] = $this->input->post('id_wo');
        $data['jenis_wo'] = $this->input->post('jenis_wo');  
        $data['jumlah'] = $this->input->post('jumlah');
        $data['tgl_produksi'] = $this->input->post('tgl_produksi');  
        $data['tgl_selesai'] = $this->input->post('tgl_selesai');  
        $data['status'] = $this->input->post('status');          
        $id_produksi=$this->input->post('id_produksi');   
             
        $this->m_inventory->update_produksi($id_produksi, $data);        
            echo'<script>window.alert("Berhasil Terupdate")</script>';
            echo'<script>window.location=("tampilproduksi")</script>';   
    }

    public function cekwo($id_wo){
         $wo=$this->m_inventory->select_by_id_wo($id_wo)->row();
         echo json_encode($wo);
     }

  
     //produksi(kelola permintaan)---------------------------------------------------------------------------------------------------------
    public function tampilpermintaanbb()
    {
        $this->data['permintaan_bb'] = $this->m_inventory->tampildatapermintaan('permintaan_bb');
        $this->data['produksi'] = $this->m_inventory->tampildataproduksi2();
        $this->load->view('produksi/permintaan/v_data_permintaan', $this->data);
    }

    public function tambah_permintaanbb(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->data['produksi'] = $this->m_inventory->tampildataproduksi('produksi');
        $this->load->view('produksi/permintaan/v_tambah_permintaan', $this->data);
    }

    public function input_permintaanbb(){   
        $id_permintaan = $_POST['id_permintaan'];
        $id_produksi = $_POST['id_produksi'];

        //ambil data produksi di database
        $produksi=$this->m_inventory->select_by_id_produksi($id_produksi)->row();
        $jenis_produksi = $produksi->jenis_wo;
        $jumlah = $produksi->jumlah;

        $jumlah_bb = $_POST['jumlah_bb'];
        $nama_bb = $_POST['nama_bb'];
        $tgl_permintaan = $_POST['tgl_permintaan'];
       
        
        
            $data = array ('id_permintaan' => $id_permintaan, 'id_produksi' => $id_produksi, 'jenis_produksi' => $jenis_produksi, 'nama_bb' => $nama_bb, 'jumlah' => $jumlah_bb, 'tgl_permintaan' => $tgl_permintaan);
            $insert = $this->m_inventory->insert_permintaan($data);
        if($insert > 0){
            redirect('c_inventory/tampilpermintaanbb');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_permintaanbb($id_permintaan)
    {   
        $this->m_inventory->delete_permintaan($id_permintaan);
            redirect('c_inventory/tampilpermintaanbb');
    }


     public function cek_produksi($id_produksi){
         $produksi=$this->m_inventory->select_by_id_produksi($id_produksi)->row();
         echo json_encode($produksi);
     }

     //spv. produksi----------------------------------------------------------------------------------------------------------------
      public function tampilproduksispv()
    {
       
        $this->data['produksi'] = $this->m_inventory->tampildataproduksi('produksi');
        $this->data['sum_jumlah'] = $this->m_inventory->jumlah();
        $this->data['jumlah_jenis1'] = $this->m_inventory->jumlah_jenis1();
        $this->data['jumlah_jenis2'] = $this->m_inventory->jumlah_jenis2();
        $this->load->view('produksi/produksi/v_data_produksi_spv', $this->data);
    }

    public function ubah_produksi($id_produksi)
    {
        $data['produksi'] = $this->m_inventory->select_by_id_produksi($id_produksi)->row();
        $this->load->view('produksi/produksi/update_produksi', $data);   
    }

    public function proses_edit_produksi()
    {          
        $data['id_wo'] = $this->input->post('id_wo');
        $data['jenis_wo'] = $this->input->post('jenis_wo');  
        $data['jumlah'] = $this->input->post('jumlah');
        $data['tgl_produksi'] = $this->input->post('tgl_produksi');  
        $data['status'] = $this->input->post('status');          
        $id_produksi=$this->input->post('id_produksi');   
             
        $this->m_inventory->update_produksi($id_produksi, $data);        
            echo'<script>window.alert("Berhasil Terupdate")</script>';
            echo'<script>window.location=("tampilproduksispv")</script>';   
    }

    //gudang jadi--------------------------------------------------------------------------------------------------------------------
    public function tampilhasilproduksi(){
        $this->data['hasil_produksi'] = $this->m_inventory->tampilpengirimanproduksi('hasil_produksi');
        $this->data['produksi'] = $this->m_inventory->tampildataproduksi2();
        $this->load->view('gudangjadi/v_data_hasilproduksi', $this->data);
    }

    public function tambah_hasilproduksi(){
        $data['buat_kode'] =$this->m_inventory->buat_kode();
        $this->data['produksi'] = $this->m_inventory->tampildataproduksi('produksi');
        $this->load->view('gudangjadi/v_tambah_hasilproduksi', $this->data);
    }

    public function input_hasilproduksi(){   
        $id_pengiriman = $_POST['id_pengiriman'];
        $id_produksi = $_POST['id_produksi'];

        //ambil data produksi di database
        $produksi=$this->m_inventory->select_by_id_produksi($id_produksi)->row();
        $jenis_produksi = $produksi->jenis_wo;
        $jumlah = $produksi->jumlah;
        $tgl_produksi = $produksi->tgl_produksi;
        $tgl_selesai = $produksi->tgl_selesai;

        
        $tgl_pengiriman = $_POST['tgl_pengiriman'];
        
        
            $data = array ('id_pengiriman' => $id_pengiriman, 'id_produksi' => $id_produksi, 'jenis_produksi' => $jenis_produksi, 'jumlah' => $jumlah, 'tgl_produksi' => $tgl_produksi, 'tgl_selesai' => $tgl_selesai, 'tgl_pengiriman' => $tgl_pengiriman);
            $insert = $this->m_inventory->insert_pengirimanproduksi($data);
        if($insert > 0){
            redirect('c_inventory/tampilhasilproduksi');
        }else{
            echo "gagal input";
        }
    }

    public function hapus_hasilproduksi($id_pengiriman)
    {   
        $this->m_inventory->delete_pengirimanproduksi($id_pengiriman);
            redirect('c_inventory/tampilhasilproduksi');
    }

     public function tampilproduksigudangjadi(){
        $this->data['produksi'] = $this->m_inventory->tampildataproduksi2();
        $this->load->view('gudangjadi/v_data_produksi_gudangjadi', $this->data);
    }
}
    