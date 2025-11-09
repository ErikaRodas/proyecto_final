public function index(): string
{
    $estudiantes = new EstudiantesModel();
    $datos['datos'] = $estudiantes->findAll();
    return view('estudiantes', $datos);
}

public function agregarEstudiante()
{
    $estudiantes = new EstudiantesModel();
    $datos = [
        'carne_alumno' => $this->request->getPost('txt_carne_alumno'),
        'nombre' => $this->request->getPost('txt_nombre'),
        'apellido' => $this->request->getPost('txt_apellido'),
        'direccion' => $this->request->getPost('txt_direccion'),
        'telefono' => $this->request->getPost('txt_telefono'),
        'email' => $this->request->getPost('txt_email'),
        'fechanacimiento' => $this->request->getPost('txt_fechanacimiento'),
        'codigo_grado' => $this->request->getPost('txt_codigo_grado')
    ];
    $estudiantes->insert($datos);
    return $this->index();
}
