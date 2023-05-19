<?php

namespace App\Controllers;

use App\Models\IngredientsModel;
use App\Models\ProceduresModel;
use App\Models\RecipesModel;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class Recipe extends ResourceController
{
    protected $RecipesModel;
    protected $UsersModel;
    protected $session;
    protected $IngredientsModel;
    protected $ProceduresModel;

    public function __construct()
    {
        helper(['form']);
        $this->ProceduresModel = new ProceduresModel();
        $this->IngredientsModel = new IngredientsModel();
        $this->RecipesModel = new RecipesModel();
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
        return view('recipes/index', [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
            'recipes' => $this->UsersModel->join('recipes', 'recipes.user_id = users.id')->paginate(6, 'recipes'),
            'pager' => $this->UsersModel->pager
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('recipes/detail', [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
            'recipe' => $this->RecipesModel->where('id', $id)->first(),
            'ingredients' => $this->IngredientsModel->where('recipe_id', $id)->findAll(),
            'procedures' => $this->ProceduresModel->where('recipe_id', $id)->findAll(),
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('recipes/add', [
            'title' => 'Markas Masakan | Tambah Data',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
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
            'judul' => 'required',
            'content' => 'required',
            'durasi' => 'required',
        ]);
        if (!$validate) {
            return redirect()->to(previous_url())->with('errors', $this->validator->listErrors())->withInput();
        }

        $fileName = "";
        $imageFile = $this->request->getFile('photo');
        if ($imageFile) {
            $fileName = $imageFile->getRandomName();
            $imageFile->move('upload', $fileName);
        }
        $store = [
            'user_id' => $this->session->get('id'),
            'judul' => $this->request->getPost('judul'),
            'content' => $this->request->getPost('content'),
            'durasi' => $this->request->getPost('durasi'),
            'kesulitan' => $this->request->getPost('kesulitan'),
            'photo' => $fileName
        ];
        $this->RecipesModel->insert($store);
        return redirect()->to('/recipe')->with('success', 'Berhasil membuat data masakan!');
    }

    // Ingredients
    public function recipeIngredients($id = null)
    {
        return view('recipes/ingredients', [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
            'recipe' => $this->RecipesModel->where('id', $id)->first(),
            'ingredients' => $this->IngredientsModel->where('recipe_id', $id)->findAll()
        ]);
    }

    public function StoreRecipeIngredients($id = null)
    {
        $validate = $this->validate([
            'bahan' => 'required'
        ]);
        if (!$validate) {
            return redirect()->to(previous_url())->with('errors', $this->validator->listErrors())->withInput();
        }
        $data = [
            'recipe_id' => $id,
            'bahan' => $this->request->getPost('bahan'),
        ];
        $this->IngredientsModel->insert($data);
        return redirect()->to("/ingredients/$id")->with('success', 'Berhasil menambahkan bahan!');
    }

    public function DeleteRecipeIngredients($id = null)
    {
        $this->IngredientsModel->delete($id);
        return redirect()->to(previous_url())->with('success', 'Berhasil menghapus bahan!');
    }

    // Procedures
    public function recipeProcedures($id = null)
    {
        return view('recipes/procedures', [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
            'recipe' => $this->RecipesModel->where('id', $id)->first(),
            'procedures' => $this->ProceduresModel->where('recipe_id', $id)->findAll()
        ]);
    }

    public function StoreRecipeProcedures($id = null)
    {
        $validate = $this->validate([
            'prosedur' => 'required',
            'desc' => 'required'
        ]);
        if (!$validate) {
            return redirect()->to(previous_url())->with('errors', $this->validator->listErrors())->withInput();
        }
        $data = [
            'recipe_id' => $id,
            'prosedur' => $this->request->getPost('prosedur'),
            'desc' => $this->request->getPost('desc')
        ];
        $this->ProceduresModel->insert($data);
        return redirect()->to(previous_url())->with('success', 'Berhasil menambahkan bahan!');
    }

    public function DeleteRecipeProcedures($id = null)
    {
        $this->ProceduresModel->delete($id);
        return redirect()->to(previous_url())->with('success', 'Berhasil menghapus bahan!');
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
        $this->RecipesModel->delete($id);
        return redirect()->to('/recipe')->with('success', 'Berhasil menghapus data!');
    }
}
