// ... (código HTML/Bootstrap inicial) ...

<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="bi bi-cloud-arrow-up-fill"> Agregar estudiante</i>
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?= base_url('agregar_estudiante'); ?>" method="post">
                    <button type="submit" class="form-control btn btn-primary mt-3">Agregar</button>
                </form>
            </div>
            </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tbody>
                    <?php foreach ($datos as $estudiante): ?>
                        <tr>
                            <th><?= $estudiante['carne_alumno'];?></th>
                            <td><?= $estudiante['nombre']; ?></td>
                            <td>
                                </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

// ... (código de scripts finales) ...