<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        // Memuat library helper form dan url
        helper(['form', 'url']);
        // Memuat library session
        $this->session = \Config\Services::session();
    }

    public function register()
    {
        // Tampilkan halaman register
        if ($this->request->getMethod() === 'get') {
            return view('auth/register');
        }
        
        // Proses registrasi
        $rules = [
            'nama'      => 'required|min_length[3]|max_length[100]',
            'email'     => 'required|valid_email|is_unique[users.email]',
            'password'  => 'required|min_length[8]',
            'no_telp'   => 'required|numeric|min_length[10]',
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'nama'      => $this->request->getPost('nama'),
                'email'     => $this->request->getPost('email'),
                'password'  => $this->request->getPost('password'),
                'no_telp'   => $this->request->getPost('no_telp'),
            ];
            $model->save($data);

            $this->session->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
            return redirect()->to('/login');
        } else {
            // Jika validasi gagal, tampilkan kembali form dengan pesan error
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }
    }

    public function login()
    {
        // Tampilkan halaman login
        if ($this->request->getMethod() === 'get') {
            return view('auth/login');
        }

        // Proses login
        $rules = [
            'email'     => 'required|valid_email',
            'password'  => 'required|min_length[8]',
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $user = $model->where('email', $this->request->getPost('email'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Set session data
                $this->session->set([
                    'user_id'       => $user['id'],
                    'nama'          => $user['nama'],
                    'email'         => $user['email'],
                    'isLoggedIn'    => true,
                ]);
                return redirect()->to('/dashboard');
            } else {
                $this->session->setFlashdata('error', 'Email atau Password salah.');
                return redirect()->to('/login');
            }
        } else {
            // Jika validasi gagal
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        }
    }
    
    public function dashboard()
    {
        // Cek jika user belum login, redirect ke halaman login
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('dashboard');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}