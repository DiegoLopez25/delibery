<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;

class Usuario extends ResourceController
{
    public function __construct()
    {
        $this->model = $this->setModel(new UsuarioModel());
    }

    public function index()
    {
        $usuario = $this->model->findAll();
        return $this->respond($usuario);
    } 


}
