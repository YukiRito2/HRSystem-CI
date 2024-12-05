<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Tipos de Licencia</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Licencia</li>
            </ol>
        </div>
    </div>
    <!-- Contenedor fluid -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Hoja de Licencias</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID Empleado</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Duración</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($embalance as $value): ?>
                                    <tr>
                                        <td><?php echo $value->emp_id; ?></td>
                                        <td><mark><?php echo $value->first_name . ' ' . $value->last_name ?></mark></td>
                                        <td><mark><?php echo $value->name ?></mark></td>
                                        <td><?php echo $value->day ?></td>
                                        <td><?php echo $value->hour ?></td>
                                        <td><?php echo $value->dateyear ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('backend/footer'); ?>