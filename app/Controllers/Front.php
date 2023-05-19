<?php

namespace App\Controllers;

use App\Database\Migrations\Ingredients;
use App\Models\IngredientsModel;
use App\Models\ProceduresModel;
use App\Models\RecipesModel;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class Front extends ResourceController
{
    protected $UsersModel;
    protected $session;
    protected $RecipesModel;
    protected $IngredientsModel;
    protected $ProceduresModel;

    public function __construct()
    {
        $this->ProceduresModel = new ProceduresModel();
        $this->IngredientsModel = new IngredientsModel();
        $this->session = \Config\Services::session();
        $this->RecipesModel = new RecipesModel();
        $this->UsersModel = new UsersModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $query = $this->request->getVar('query');
        if ($query) {
            $recipes = $this->RecipesModel->search($query);
        } else {
            $recipes = $this->RecipesModel;
        }
        $data = [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
            'recipes' => $recipes->paginate(6, 'recipes'),
            'pager' => $this->RecipesModel->pager
        ];
        return view('front/index', $data);
    }

    public function about()
    {
        return view('front/about', [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first()
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('front/detail', [
            'title' => 'Markas Masakan',
            'user' => $this->UsersModel->where('email', $this->session->get('email'))->first(),
            'recipe' => $this->RecipesModel->join('users', 'recipes.user_id=users.id')->find($id),
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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
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
