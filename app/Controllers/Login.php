<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
    protected $UsersModel;
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->UsersModel = new UsersModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('auth/login', [
            'title' => 'Login',
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validate = $this->validate([
            'username' => 'required',
            'password' => 'required|min_length[6]'
        ]);
        if (!$validate) {
            $this->session->setFlashdata("errors", $this->validator->listErrors());
            return redirect()->to('/login')->withInput();
        }
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $this->UsersModel->where('username', $username)->first();
        if (!$user) {
            $this->session->setFlashdata('errors', 'User tidak ditemukan!');
            return redirect()->to('/login');
        }
        if (md5($password) != $user['password']) {
            $this->session->setFlashdata('errors', 'Credentials is Invalid!');
            return redirect()->to('/login');
        }
        if ($user['role_id'] == 1) {
            $this->session->setFlashdata('success', "Selamat datang " . $user['nama']);
            $this->session->set([
                'id' => $user['id'],
                'nama' => $user['nama'],
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ]);
            return redirect()->to('/user');
        }
        $this->session->setFlashdata('success', "Selamat datang " . $user['nama']);
        $this->session->set([
            'id' => $user['id'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role_id' => $user['role_id']
        ]);
        return redirect()->to('/front');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->session->destroy();
        $this->session->setFlashdata('success', 'Berhasil logout!');
        return redirect()->to('/login');
    }
}
