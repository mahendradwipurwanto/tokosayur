<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();

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
        $this->load->model(['M_home', 'M_admin', 'M_pengguna']);

        if ($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in')) {
            // OTP REQUIRE
            if (($this->session->userdata('otp') == false || !$this->session->userdata('otp')) && $this->session->userdata('role') == 2) {
                $this->session->set_flashdata('warning', "Harap melakukan proses OTP !");
                redirect(site_url('otp'));
            }
        }
    }

    public function index()
    {
        $data['wishlist'] = $this->M_pengguna->get_wishlistPengguna($this->session->userdata('user_id'));

        $this->templatefront->view('pengguna/dashboard', $data);
    }

    public function tambah_checkout(){
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            
            // send to login first, then continued activities
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
            redirect('login');
        }

        // if ($this->M_home->cek_aktivasi($this->session->userdata('user_id')) == true) {
        //     $this->session->set_flashdata('warning', "Harap melakukan aktivasi akun terlebih dahulu!");
        //     redirect(site_url('aktivasi-akun'));
        // }

        // OTP REQUIRE
        if (($this->session->userdata('otp') == false || !$this->session->userdata('otp')) && $this->session->userdata('role') == 2) {
            $this->session->set_flashdata('warning', "Harap melakukan proses OTP !");
            redirect(site_url('otp'));
        }

        $path = "berkas/pembayaran/";
        $upload = $this->uploader->uploadImage($_FILES['image'], $path);

        if ($this->M_pengguna->tambah_checkout($upload['filename']) == true) {
            // $this->session->unset_userdata('keranjang');
            $this->session->set_flashdata('notif_success', 'Berhasil menambahkan sayur ke checkout anda');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('notif_warning', 'terjadi kesalahan, saat mencoba menambahkan produk ke checkout anda. Coba lagi nanti !');
            redirect($this->agent->referrer());
        }
    }
}