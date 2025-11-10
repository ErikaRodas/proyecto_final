<?php

namespace App\Controllers;
use App\Models\GradosModel;

class GradosController extends BaseController
{
    public function index(): string
    {
        $grados = new GradosModel();
        $datos['datos'] = $grados->findAll();
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
