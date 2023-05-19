<?php

namespace App\Controllers;

use App\Models\RolesModel;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $session;
    protected $UsersModel;
    protected $RolesModel;

    public function __construct()
    {
        $this->RolesModel = new RolesModel();
        $this->UsersModel = new UsersModel();
        $this->session = \Config\Services::session();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        // dd($users);
        return view('users/index', [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
            'users' => $this->RolesModel->join('users', 'roles.id=users.role_id')->paginate(6, 'users'),
            'pager' => $this->RolesModel->pager
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
        $user = $this->UsersModel->where('email', $this->session->get('email'))->first();
        return view('users/add', [
            'title' => 'Markas Masakan | Tambah data',
            'user' => $user,
        ]);
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
        $store = [
            'role_id' => $this->request->getPost('role'),
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password'))
        ];
        if (!$validate) {
            return redirect()->to(previous_url())->with('errors', $this->validator->listErrors())->withInput();
        }
        $this->UsersModel->insert($store);
        return redirect()->to('/user')->with('success', 'Berhasil membuat user!');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $selected_user = $this->UsersModel->find($id);
        $user = $this->UsersModel->where('email', $this->session->get('email'))->first();
        return view('users/edit', [
            'title' => 'Markas Masakan | Edit Data',
            'user' => $user,
            'selected_user' => $selected_user,
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $validate = $this->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);
        $update = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role_id' => $this->request->getPost('role'),
            'updated_at' => date('Y-m-d H:i:sa')
        ];
        if (!$validate) {
            redirect()->to(previous_url())->with('errors', $this->validator->listErrors())->withInput();
        }
        $this->UsersModel->update($id, $update);
        return redirect()->to('/user')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->UsersModel->delete($id);
        $this->session->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->to('/user');
    }
}
