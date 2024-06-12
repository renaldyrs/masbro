<?php

namespace App\Http\Controllers\Api;

use App\Models\Jenis;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class pesanan extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new Jenis();
        $data = $model->find(id);

        return $this->respond($data);
    }    
}