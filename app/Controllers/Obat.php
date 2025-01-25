<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Obat extends BaseController
{
    public function index()
    {
        $obatModel = new ObatModel();
        $data['obat'] = $obatModel->findAll();
        return view('obat/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post') {
            $obatModel = new ObatModel();
            $obatModel->save($this->request->getPost());
            return redirect()->to('/obat');
        }
        return view('obat/create');
    }

    public function edit($id)
    {
        $obatModel = new ObatModel();
        $data['obat'] = $obatModel->find($id);
        return view('obat/edit', $data);
    }

    public function delete($id)
    {
        $obatModel = new ObatModel();
        $obatModel->delete($id);
        return redirect()->to('/obat');
    }
}
