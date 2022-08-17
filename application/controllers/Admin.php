<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_admin']);

        // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap login ke akun anda untuk melanjutkan");
            redirect('login');
        }

        if ($this->session->userdata('role') == 2) {
            $this->session->set_flashdata('warning', "Kamu tidak memiliki akses");
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['statistik'] = $this->M_admin->get_statistik();

        $data['wishlist'] = $this->M_admin->get_wishlist();

        $this->templatefront->view('admin/dashboard', $data);
    }

    public function data_pengguna()
    {
        $data['pengguna'] = $this->M_admin->get_pengguna();
        $this->templatefront->view('admin/pengguna', $data);
    }

    public function kelola_sayur()
    {
        $data['sayur'] = $this->M_admin->get_sayur();
        $this->templatefront->view('admin/sayur', $data);
    }

    function tambah_sayur(){
        if (isset($_FILES['image'])) {
            $path = "berkas/sayur/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            // ej($upload);
            if ($upload == true) {
                if ($this->M_admin->tambah_sayur($upload['filename']) == true) {

                    $subject = "Sayur baru telah ditambahkan !";
                    $message = "Hai, sayur baru telah ditambahkan {$this->input->post('sayur')} dengan harga satuan Rp.{$this->input->post('harga')}, yuk cek ke toko kami untuk lebih detail !";

                    kirimBulkEmail($subject, $message);

                    $this->session->set_flashdata('notif_success', 'Berhasil menambahkan data sayur');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('notif_warning', 'terjadi kesalahan, saat mencoba menambahkan data sayur. Coba lagi nanti !');
                    redirect(site_url('admin/kelola-sayur'));
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect(site_url('admin/kelola-sayur'));
            }
        } else {
            if ($this->M_admin->tambah_sayur(null) == true) {
                $this->session->set_flashdata('notif_success', 'Berhasil menambahkan data sayur');
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('notif_warning', 'terjadi kesalahan, saat mencoba menambahkan data sayur. Coba lagi nanti !');
                redirect(site_url('admin/kelola-sayur'));
            }
        }
    }

    function edit_sayur(){
        if (isset($_FILES['image'])) {
            $path = "berkas/sayur/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            // ej($upload);
            if ($upload == true) {
                if ($this->M_admin->edit_sayur($upload['filename']) == true) {

                    $this->session->set_flashdata('notif_success', 'Berhasil mengubah data sayur');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('notif_warning', 'terjadi kesalahan, saat mencoba mengubah data sayur. Coba lagi nanti !');
                    redirect(site_url('admin/kelola-sayur'));
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect(site_url('admin/kelola-sayur'));
            }
        } else {
            if ($this->M_admin->edit_sayur(null) == true) {
                $this->session->set_flashdata('notif_success', 'Berhasil menambahkan data sayur');
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('notif_warning', 'terjadi kesalahan, saat mencoba mengubah data sayur. Coba lagi nanti !');
                redirect(site_url('admin/kelola-sayur'));
            }

        }
    }

    function hapus_sayur(){
        if ($this->M_admin->hapus_sayur() == true) {
            $this->session->set_flashdata('notif_success', 'Berhasil menghapus data sayur');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('notif_warning', 'terjadi kesalahan, saat mencoba menghapus data sayur. Coba lagi nanti !');
            redirect(site_url('admin/kelola-sayur'));
        }
    }

    function verifikasi_pembayaran($id){
        if ($this->M_admin->verifikasi_pembayaran($id) == true) {
            $this->session->set_flashdata('notif_success', 'Berhasil memverifikasi data transaksi');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan, saat memverifikasi data transaksi!');
            redirect(site_url('admin'));
        }
    }
}
