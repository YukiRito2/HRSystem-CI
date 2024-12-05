<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-clipboard"></i> Tablero de Avisos</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Tablero de Avisos</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    <a data-toggle="modal" data-target="#noticemodel" data-whatever="@getbootstrap" class="text-white">
                        <i aria-hidden="true"></i> Agregar Aviso
                    </a>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> Aviso</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Título</th>
                                        <th>Archivo</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notice as $value): ?>
                                    <tr>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->title; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>assets/images/notice/<?php echo $value->file_url; ?>"
                                                target="_blank">
                                                <?php echo $value->file_url; ?>
                                            </a>
                                        </td>
                                        <td><?php echo $value->date; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contenido del modal de ejemplo -->
        <div class="modal fade" id="noticemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tablero de Avisos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" method="post" action="Published_Notice" id="btnSubmit"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Título del Aviso</label>
                                <textarea class="form-control" name="title" id="message-text1" required minlength="25"
                                    maxlength="150"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Documento</label>
                                <label for="recipient-name1" class="control-label">Título</label>
                                <input type="file" name="file_url" class="form-control" id="recipient-name1" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Fecha de Publicación</label>
                                <input type="date" name="nodate" class="form-control" id="recipient-name1" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
    </div>
</div>
<?php $this->load->view('backend/footer'); ?>