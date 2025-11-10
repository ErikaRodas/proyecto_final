<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ExtracurricularesController extends BaseController
{
    public function index()
    {
        $extracurricularModel = model('ExtracurricularModel');
        $data['extracurriculares'] = $extracurricularModel->findAll();
        return view('extracurriculares', $data);
    }
    public function store()
    {
        // Lógica para almacenar una nueva actividad extracurricular
        $estudiante_id = $this->request->getPost('estudiante_id');
        $nombre_actividad = $this->request->getPost('nombre_actividad');

        $extracurricularModel = model('ExtracurricularModel');
        $extracurricularModel->insert([
            'estudiante_id' => $estudiante_id,
            'nombre_actividad' => $nombre_actividad,
        ]);


        return redirect()->to('/extracurriculares');
    }

    public function update()
    {
        // Lógica para actualizar una actividad extracurricular existente
        $id = $this->request->getPost('id');
        $estudiante_id = $this->request->getPost('estudiante_id');
        $nombre_actividad = $this->request->getPost('nombre_actividad');

        $extracurricularModel = model('ExtracurricularModel');
        $extracurricularModel->update($id, [
            'estudiante_id' => $estudiante_id,
            'nombre_actividad' => $nombre_actividad,
        ]);

        return redirect()->to('/extracurriculares');
    }

    public function delete($id)
    {
        $extracurricularModel = model('ExtracurricularModel');
        $extracurricularModel->delete($id);

        return redirect()->to('/extracurriculares');
    }

    public function search()
    {
        $query = $this->request->getGet('query');

        $extracurricularModel = model('ExtracurricularModel');
        $data['extracurriculares'] = $extracurricularModel
            ->like('nombre_actividad', $query)
            ->orLike('estudiante_id', $query)
            ->findAll();

        return view('extracurriculares', $data);
    }
}