<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class Register extends ResourceController
{
    protected $session;
    protected $UsersModel;

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
        return view('auth/register', [
            'title' => 'Registrasi'
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
            'nama' => 'required',
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|is_unique[users.email]|valid_email',
            'password' => 'required|min_length[6]',
            'repeat_password' => 'required|matches[password]'
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/register')->withInput();
        }
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $store = [
            'role_id' => 2,
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'password' => md5($password)
        ];
        $this->UsersModel->insert($store);
        $this->session->setFlashdata('success', 'Berhasil membuat user!');
        return redirect()->to('/login');
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
        //
    }
}
