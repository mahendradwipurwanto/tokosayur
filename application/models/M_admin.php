<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Dashboard
    function get_statistik(){

        $pengguna = $this->db->get_where('tb_auth', ['role' => 2, 'is_deleted' => 0])->num_rows();
        $sayur = $this->db->get_where('tb_sayur', ['is_deleted' => 0])->num_rows();
        $wishlist = $this->db->get_where('tb_keranjang', ['is_deleted' => 0])->num_rows();
        $pengunjung = $this->db->get('tb_pengunjung')->num_rows();

        $arrStatistik['pengguna'] = $pengguna;
        $arrStatistik['sayur'] = $sayur;
        $arrStatistik['wishlist'] = $wishlist;
        $arrStatistik['pengunjung'] = $pengunjung;

        return $arrStatistik;
    }

    function get_wishlist(){
        // $this->db->select('a.*, b.nama, b.no_telp, b.profil, c.sayur, c.gambar, c.harga');
        // $this->db->from('tb_keranjang a');
        // $this->db->join('tb_user b', 'a.user_id = b.user_id', 'left');
        // $this->db->join('tb_sayur c', 'a.sayur_id = c.id', 'left');
        // $this->db->where('a.is_deleted', 0);
        // $this->db->order_by('a.created_at DESC');

        // return $this->db->get()->result();
        
        $this->db->select('a.*, b.nama, b.no_telp, b.profil, a.status, a.metode, a.bukti_bayar');
        $this->db->from('tb_keranjang a');
        $this->db->join('tb_user b', 'a.user_id = b.user_id', 'left');
        $this->db->where([ 'a.is_deleted' => 0]);
        $this->db->order_by('a.created_at DESC');

        $wishlist = $this->db->get()->result();

        if (empty($wishlist)) {
            return $wishlist;
        } else {
            $arrSayur = [];
            foreach ($wishlist as $key => $val):

            $this->db->select('a.wishlist_id, a.sayur_id, a.jumlah, b.sayur, b.gambar');
            $this->db->from('tb_keranjang_barang a');
            $this->db->join('tb_sayur b', 'a.sayur_id = id', 'left');
            $this->db->where('a.wishlist_id', $val->id);
            $detailWishlist = $this->db->get()->result();

            $arrSayur[$key]['id'] = $val->id;
            $arrSayur[$key]['user_id'] = $val->user_id;
            $arrSayur[$key]['nama'] = $val->nama;
            $arrSayur[$key]['profil'] = $val->profil;
            $arrSayur[$key]['status'] = $val->status;
            $arrSayur[$key]['metode'] = $val->metode;
            $arrSayur[$key]['bukti_bayar'] = $val->bukti_bayar;
            $arrSayur[$key]['catatan'] = $val->catatan;
            $arrSayur[$key]['created_at'] = $val->created_at;
            $arrSayur[$key]['keranjang'] = $detailWishlist;
            endforeach;

            return $arrSayur;
        }

    }

    // Pengguna
    function get_pengguna(){
        $this->db->select('*');
        $this->db->from('tb_auth a');
        $this->db->join('tb_user b', 'a.user_id = b.user_id');
        $this->db->where(['a.is_deleted' => 0, 'role' => 2]);
        $this->db->order_by('a.created_at DESC');

        return $this->db->get()->result();
    }

    // Sayur
    function get_sayur(){
        return $this->db->get_where('tb_sayur', ['is_deleted' => 0])->result();    
    }

    function tambah_sayur($gambar){
        $sayur = $this->input->post('sayur');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'sayur' => $sayur,
            'gambar' => $gambar == null ? 'assets/images/placeholder.png' : $gambar,
            'harga' => $harga,
            'stok' => $stok,
            'keterangan' => $keterangan
        ];

        $this->db->insert('tb_sayur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function edit_sayur($gambar){
        $id = $this->input->post('id');

        $sayur = $this->input->post('sayur');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $keterangan = $this->input->post('keterangan');
        if($gambar == null){
            $data = [
                'sayur' => $sayur,
                'harga' => str_replace('.', '', $harga),
                'stok' => $stok,
                'keterangan' => $keterangan
            ];
        }else{
            $data = [
                'sayur' => $sayur,
                'gambar' => $gambar == null ? 'assets/images/placeholder.png' : $gambar,
                'harga' => str_replace('.', '', $harga),
                'stok' => $stok,
                'keterangan' => $keterangan
            ];
        }

        $this->db->where('id', $id);
        $this->db->update('tb_sayur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function hapus_sayur(){
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_sayur', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function verifikasi_pembayaran($id){

        $this->db->where('id', $id);
        $this->db->update('tb_keranjang', ['status' => 3]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
