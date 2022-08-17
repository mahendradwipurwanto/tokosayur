<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // LOAD MODEL MASUK
        $this->load->model('M_auth');
    }
  
    public function index()
    {
        if ($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in')) {
            $this->session->set_flashdata('warning', 'Berhasil masuk ke akun.');
            redirect(site_url('home'));
        } else {
            $this->templateauth->view('authentication/register');
        }
    }
  
    public function proses_daftar()
    {
        // ambil inputan dari view
        $nama           = htmlspecialchars($this->input->post('nama'));
        $no_telp        = htmlspecialchars($this->input->post('no_telp'));
        $email          = htmlspecialchars($this->input->post('email'));
        $password       = htmlspecialchars($this->input->post('password'));
        $password_conf  = htmlspecialchars($this->input->post('password_conf'));
    
        // cek apakah email telah ada
        if ($this->M_auth->cek_user($email) == false) {
      
            // cek apakah password sama
            if ($password == $password_conf) {
        
                 // ubah inputan view menjadi array
                $data_user = array(
                    'email'     => $email,
                    'aktivasi'  => $this->M_auth->create_kode(),
                    'password'  => password_hash($password, PASSWORD_DEFAULT),
                    'created_at' => time()
                );
        
                // masukkan ke database
                if ($this->M_auth->add_user($data_user) == true) {
                    $subject    = "Selamat bergabung - {$email}";
                    $message    = "Hai, {$nama} selamat bergabung.</br></br></br></br>";
          
                    $this->send_email($email, $subject, $message);

                    $user     = $this->M_auth->get_user($email);
                
                    // simpan data user yang login kedalam session
                    $session_data = array(
                        'user_id'   => $user->user_id,
                        'nama'      => $user->nama,
                        'email'     => $user->email,
                        'no_telp'   => $user->no_telp,
                        'role'      => $user->role,
                        'logged_in' => true,
                    );
          
                    $this->session->set_userdata($session_data);
          
                    $this->session->set_flashdata('success', "Berhasil mendaftaran akun Anda. Harap melanjutkan proses aktivasi!");
                    redirect(site_url('aktivasi-akun'));
                } else {
                    $this->session->set_flashdata('error', "Terjadi kesalahan saat mendaftarkan akun Anda. Harap coba lagi!");
                    redirect(site_url('register'));
                }
            } else {
                $this->session->set_flashdata('warning', "Password yang Anda masukkan tidak sama!");
                redirect(site_url('register'));
            }
        } else {
            $this->session->set_flashdata('warning', "Email atau username telah digunakan !");
            redirect(site_url('register'));
        }
    }

    public function test()
    {
        echo $this->M_auth->create_kode();
    }
    
    // MAILER SENDER
    
    public function send_email($email, $subject, $message)
    {
        $mail = array(
            'to' 			=> $email,
            'subject'		=> $subject,
            'message'		=> $message
        );
        
        if ($this->mailer->send($mail) == true) {
            return true;
        } else {
            return false;
        }
    }
}
