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

    public function create()
    {
        try {
            $usuario = $this->request->getJSON();
            if($this->model->insert($usuario)):
                $usuario->id = $this->model->insertID();
                return $this->respondCreated($usuario);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
            return $this->failServerError("Ha ocurrido un error en el servidor");
        }
    }
}
