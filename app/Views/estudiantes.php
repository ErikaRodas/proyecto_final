<form action="<?= base_url('agregar_estudiante'); ?>" method="post">
    <label for="txt_carne_alumno">Carné del alumno</label>
    <input type="number" name="txt_carne_alumno" id="txt_carne_alumno" class="form-control">

    <label for="txt_nombre">Nombre</label>
    <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">

    <label for="txt_apellido">Apellido</label>
    <input type="text" name="txt_apellido" id="txt_apellido" class="form-control">

    <label for="txt_direccion">Dirección</label>
    <input type="text" name="txt_direccion" id="txt_direccion" class="form-control">

    <label for="txt_telefono">Teléfono</label>
    <input type="number" name="txt_telefono" id="txt_telefono" class="form-control">

    <label for="txt_email">Email</label>
    <input type="email" name="txt_email" id="txt_email" class="form-control">

    <label for="txt_fechanacimiento">Fecha de nacimiento</label>
    <input type="date" name="txt_fechanacimiento" id="txt_fechanacimiento" class="form-control">

    <label for="txt_codigo_grado">Código del grado</label>
    <input type="number" name="txt_codigo_grado" id="txt_codigo_grado" class="form-control">

    <button type="submit" class="btn btn-primary mt-3">Agregar</button>
</form>
