<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-map-o" style="color:#1976d2"></i> Designación</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Designación</li>
            </ol>
        </div>
    </div>
    <div class="message"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <?php if (isset($editdesignation)) { ?>
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Editar Designación</h4>
                    </div>

                    <?php echo validation_errors(); ?>
                    <?php echo $this->upload->display_errors(); ?>
                    <?php echo $this->session->flashdata('feedback'); ?>


                    <div class="card-body">
                        <form method="post" action="<?php echo base_url(); ?>organization/Update_des"
                            enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Nombre de la Designación</label>
                                            <input type="text" name="designation" id="firstName"
                                                value="<?php echo $editdesignation->des_name; ?>" class="form-control"
                                                placeholder="">
                                            <input type="hidden" name="id" value="<?php echo $editdesignation->id; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } else { ?>

                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Agregar Designación</h4>
                    </div>

                    <?php echo validation_errors(); ?>
                    <?php echo $this->upload->display_errors(); ?>
                    <?php echo $this->session->flashdata('feedback'); ?>


                    <div class="card-body">
                        <form method="post" action="Save_des" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Nombre de la Designación</label>
                                            <input type="text" name="designation" id="firstName" value=""
                                                class="form-control" placeholder="" minlength="3" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="col-7">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Lista de Designaciones</h4>
                    </div>
                    <div><?php echo $this->session->flashdata('delsuccess'); ?></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>Designación</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($designation as $value) { ?>
                                    <tr>
                                        <td><?php echo $value->des_name; ?></td>
                                        <td class="jsgrid-align-center">
                                            <a href="<?php echo base_url(); ?>organization/Edit_des/<?php echo $value->id ?>"
                                                title="Editar"
                                                class="btn btn-sm btn-primary waves-effect waves-light"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                            <a onclick="return confirm('¿Estás seguro de eliminar estos datos?')"
                                                href="<?php echo base_url(); ?>organization/des_delete/<?php echo $value->id; ?>"
                                                title="Eliminar"
                                                class="btn btn-sm btn-danger waves-effect waves-light"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('backend/footer'); ?>