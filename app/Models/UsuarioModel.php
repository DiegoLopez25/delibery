<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table            = "usuario";
    protected $primaryKey       = "id";
    
    protected $returnType       = "array";
    protected $allowedFields    = ["nombre","apellido","telefono","email","usuario","password","id_estado","id_rol"];

    protected $useTimestamps    =true;

    protected $createdFields    = "created_at";
    protected $updatedFiedls    ="updated_at";
    

    protected $validationRules   =[
        'nombre' => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellido' => 'required|alpha_space|min_length[3]|max_length[75]',
        'telefono' => 'required |min_length[3]|max_length[9]',
        'email' => 'required |valid_email|max_length[100]',
    ];
    protected $validationMessages = [
        "email" => [
            "valid_email" => "Porfavor ingrese un correo valido"
        ] 
    ];
    protected $skipValidation = false;
}