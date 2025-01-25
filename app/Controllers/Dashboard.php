<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $obatModel = new ObatModel();
        $data['obat'] = $obatModel->findAll();
        return view('dashboard/index', $data);
    }
    public function upload()
{
    $file = $this->request->getFile('image');

    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('uploads', $newName);
        echo "File berhasil diupload: " . $newName;
    } else {
        echo "Upload gagal!";
    }
}

}
