<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function add_pengunjung($device){
        $data = [
            'device' => $device,
            'created_at' => time()
        ];

        $this->db->insert('tb_pengunjung', $data);
    }

    function get_sayurHome($cari = null){
        $this->db->select('a.*');
        $this->db->from('tb_sayur a');
        $this->db->where('a.is_deleted', 0);
        if($cari != null){
            $this->db->like('sayur', $cari);
        }
        $this->db->order_by('a.created_at DESC');

        return $this->db->get()->result();
    }

    function cek_sayur($id){
        $cek = $this->db->get_where('tb_sayur', ['is_deleted' => 0, 'id' => $id])->num_rows();
        if($cek > 0){
            return true;
        }else{
            return false;
        }
    }

    function cek_aktivasi($id_user)
    {
        $query = $this->db->get_where('tb_auth', array('user_id' => $id_user))->row();
        if ($query->status == 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_sayur($id, $jumlah){
        $sayur = $this->db->get_where('tb_sayur', ['id' => $id])->row();

        if(isset($sayur)){
            if($sayur->stok > $jumlah){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function updateJumlahSayur($id, $jumlah){
        $sayur = $this->db->get_where('tb_sayur', ['id' => $id])->row();

        $stok_baru = $sayur->stok-$jumlah;
        $this->db->where('id', $id);
        $this->db->update('tb_sayur', ['stok' => $stok_baru]);
    }


    function tambah_wishlist(){
        $this->db->trans_strict(false);

        $catatan = $this->input->post('catatan');

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'catatan' => $catatan,
            'created_at' => time()
        ];
        $this->db->trans_begin();
        $this->db->insert('tb_keranjang', $data);
        $wish_id = $this->db->insert_id();

        foreach($this->session->userdata('keranjang') as $key => $val):
            $arrDetail = [
                'wishlist_id' => $wish_id,
                'jumlah' => $val['jumlah'],
                'sayur_id' => $val['sayur_id']
            ];

            $this->db->insert('tb_keranjang_barang', $arrDetail);
        endforeach;
        
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
