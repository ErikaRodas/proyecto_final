<?php

namespace App\Controllers;
use App\Models\GradosModel;

class GradosController extends BaseController
{
    public function index(): string
    {
        $grados = new GradosModel();
        $datos['grados'] = $grados->findAll();
        return view('grados', $datos);
    }

    //create
    public function create()
    {
        $grados = new GradosModel();
        $datos = [
            'codigo_grado' => $this->request->getPost('codigo_grado'),
            'nombre_grado' => $this->request->getPost('nombre_grado')
        ];
        $grados->insert($datos);
        return redirect()->to(base_url('grados'));
    }

    //delete
    public function delete($id)
    {
        $grados = new GradosModel();
        $grados->delete($id);
        return redirect()->to(base_url('grados'));
    }

    //update
    public function update($id)
    {
        $grados = new GradosModel();
        $datos = [
            'nombre_grado' => $this->request->getPost('txt_nombre')
        ];
        $grados->update($id, $datos);
        return redirect()->to(base_url('grados'));
    }

    //search
    public function search()
    {
        $query = $this->request->getGet('query');
        $grados = new GradosModel();
        $datos['grados'] = $grados->like('codigo_grado', $query)->findAll();
        return view('grados', $datos);
    }

    public function agregarGrado()
    {
        $grados = new GradosModel();
        $datos = [
            'codigo_grado' => $this->request->getPost('txt_codigo_grado'),
            'nombre_grado' => $this->request->getPost('txt_nombre')
        ];
        $grados->insert($datos);
        return redirect()->to(base_url('grados'));
    }

    public function eliminarGrado($codigo_grado)
    {
        $grados = new GradosModel();
        $grados->delete($codigo_grado);
        return redirect()->to(base_url('grados'));
    }

    public function buscarGrado($codigo_grado)
    {
        $grados = new GradosModel();
        $datos['datos'] = $grados->where('codigo_grado', $codigo_grado)->first();
        return view('form_editar_grado', $datos);
    }
    
    public function modificarGrado()
    {
        $grados = new GradosModel();
        $datos = [
            'nombre' => $this->request->getPost('txt_nombre'),
        ];
        $codigo = $this->request->getPost('txt_codigo_grado');
        $grados->update($codigo, $datos);
        return redirect()->to(base_url('grados'));
    }
}
