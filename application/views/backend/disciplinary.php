<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="message"></div>
<div class="page-wrapper">
    <?php
    $allemployees = $this->employee_model->GetAllEmployee();
    ?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-compass" style="color:#1976d2"></i> Disciplinario</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Disciplinario</li>
            </ol>
        </div>
    </div>
    <!-- Container fluid  -->
    <div class="container-fluid">

        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal"
                        data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class=""
                            aria-hidden="true"></i> Agregar Acción Disciplinaria </a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a
                        href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class=""
                            aria-hidden="true"></i> Lista de Empleados</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> Lista de Acciones Disciplinarias</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nombre del Empleado</th>
                                        <th>PIN</th>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($desciplinary as $value): ?>
                                    <tr>
                                        <td><?php echo $value->first_name . ' ' . $value->last_name; ?></td>
                                        <td><?php echo $value->em_code; ?></td>
                                        <td><?php echo substr("$value->title", 0, 15) . '...' ?></td>
                                        <td><?php echo substr("$value->description", 0, 10) . '...' ?> </td>
                                        <td><button
                                                class="btn btn-sm btn-success"><?php echo $value->action; ?></button>
                                        </td>
                                        <td class="jsgrid-align-center">
                                            <a href="#" title="Editar"
                                                class="btn btn-sm btn-primary waves-effect waves-light disiplinary"
                                                data-id="<?php echo $value->id; ?>"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                            <a href="DeletDisiplinary?D=<?php echo $value->id; ?>"
                                                onclick="confirm('¿Estás seguro de eliminar este dato?')"
                                                title="Eliminar"
                                                class="btn btn-sm btn-danger waves-effect waves-light"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- sample modal content -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel1">Aviso Disciplinario</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form method="post" action="add_Desciplinary" id="btnSubmit"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="control-label">Nombre del Empleado</label>
                                                    <select class="form-control custom-select" name="emid"
                                                        data-placeholder="Elegir una Categoría" tabindex="1" value=""
                                                        required>
                                                        <?php foreach ($allemployees as $value): ?>
                                                        <option value="<?php echo $value->em_id ?>">
                                                            <?php echo $value->first_name . ' ' . $value->last_name ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Acción Disciplinaria</label>
                                                    <select class="form-control custom-select"
                                                        data-placeholder="Elegir una Categoría" tabindex="1"
                                                        name="warning" value="">
                                                        <option value="Verbel Warning">Advertencia Verbal</option>
                                                        <option value="Writing Warning">Advertencia Escrita</option>
                                                        <option value="Demotion">Degradación</option>
                                                        <option value="Suspension">Suspensión</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Título</label>
                                                    <input type="text" name="title" value="" class="form-control"
                                                        id="recipient-name1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Detalles</label>
                                                    <textarea class="form-control" value="" name="details"
                                                        id="message-text1" rows="4"></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id" value="">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-success">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".disiplinary").click(function(e) {
                e.preventDefault(e);
                // Obtener el ID del registro a través del atributo
                var iid = $(this).attr('data-id');
                $('#btnSubmit').trigger("reset");
                $('#exampleModal').modal('show');
                $.ajax({
                    url: 'DisiplinaryByID?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function(response) {
                    console.log(response);
                    // Llenar los campos del formulario con los datos devueltos por el servidor
                    $('#btnSubmit').find('[name="id"]').val(response.desipplinary.id).end();
                    $('#btnSubmit').find('[name="emid"]').val(response.desipplinary.em_id)
                .end();
                    $('#btnSubmit').find('[name="warning"]').val(response.desipplinary.action)
                        .end();
                    $('#btnSubmit').find('[name="title"]').val(response.desipplinary.title)
                    .end();
                    $('#btnSubmit').find('[name="details"]').val(response.desipplinary
                        .description).end();
                });
            });
        });
        </script>
        <?php $this->load->view('backend/footer'); ?>