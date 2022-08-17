<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Dashboard
    public function get_wishlistPengguna($user_id)
    {
        // $this->db->select('a.*, b.nama, b.no_telp, b.profil, d.sayur, d.gambar, d.harga, c.jumlah');
        // $this->db->from('tb_keranjang a');
        // $this->db->join('tb_user b', 'a.user_id = b.user_id', 'left');
        // $this->db->join('tb_keranjang_barang c', 'a.id = c.wishlist_id', 'left');
        // $this->db->join('tb_sayur d', 'c.sayur_id = d.id', 'left');
        // $this->db->where([ 'a.is_deleted' => 0, 'a.user_id' => $user_id]);
        // $this->db->order_by('a.created_at DESC');
        
        $this->db->select('a.*, b.nama, b.no_telp, b.profil, a.status');
        $this->db->from('tb_keranjang a');
        $this->db->join('tb_user b', 'a.user_id = b.user_id', 'left');
        $this->db->where([ 'a.is_deleted' => 0, 'a.user_id' => $user_id]);
        $this->db->order_by('a.created_at DESC');

        $wishlist = $this->db->get()->result();

        if(empty($wishlist)){
            return $wishlist;
        }else{
            $arrSayur = [];
            foreach($wishlist as $key => $val):

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

    function tambah_checkout($bukti){
        $this->db->trans_strict(false);

        $id = $this->input->post('id');
        $metode = $this->input->post('metode');
        $catatan = $this->input->post('catatan');

        $data = [
            'catatan' => $catatan,
            'metode' => $metode,
            'status' => 2,
            'bukti_bayar' => $bukti,
            'created_at' => time()
        ];
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->update('tb_keranjang', $data);
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
}
