<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Asistencia</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Asistencia</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a
                        href="<?php echo base_url(); ?>attendance/Attendance" class="text-white"><i class=""
                            aria-hidden="true"></i> Lista de Asistencia</a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a
                        href="<?php echo base_url(); ?>leave/Application" class="text-white"><i class=""
                            aria-hidden="true"></i> Solicitud de Permiso</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Asistencia</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="Add_Attendance" id="holidayform" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Empleado</label>
                                    <select class="form-control custom-select" data-placeholder="Elija una Categoría"
                                        tabindex="1" name="emid" required>

                                        <?php if (!empty($attval->em_code)) { ?>
                                        <option value="<?php echo $attval->em_code ?>">
                                            <?php echo $attval->first_name . ' ' . $attval->last_name ?></option>
                                        <?php } else { ?>
                                        <option value="#">Seleccione Aquí</option>
                                        <?php foreach ($employee as $value): ?>
                                        <option value="<?php echo $value->em_code ?>">
                                            <?php echo $value->first_name . ' ' . $value->last_name ?></option>
                                        <?php endforeach; ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label>Seleccione Fecha: </label>
                                <div id="" class="input-group date">
                                    <input name="attdate" class="form-control mydatetimepickerFull" value="<?php if (!empty($attval->atten_date)) {
                                                                                                                $old_date_timestamp = strtotime($attval->atten_date);
                                                                                                                $new_date = date('Y-m-d', $old_date_timestamp);
                                                                                                                echo $new_date;
                                                                                                            } ?>"
                                        required>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                                <div class="form-group">
                                    <label class="m-t-20">Hora de Entrada</label>
                                    <input class="form-control" name="signin" id="single-input" value="<?php if (!empty($attval->signin_time)) {
                                                                                                            echo  $attval->signin_time;
                                                                                                        } ?>"
                                        placeholder="Ahora" required>
                                </div>
                                <div class="form-group">
                                    <label class="m-t-20">Hora de Salida</label>
                                    <div class="input-group clockpicker">
                                        <input type="text" name="signout" class="form-control" value="<?php if (!empty($attval->signout_time)) {
                                                                                                            echo  $attval->signout_time;
                                                                                                        } ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Lugar</label>
                                    <select class="form-control custom-select" data-placeholder="" tabindex="1"
                                        name="place" required>
                                        <option value="office" <?php if (isset($attval->place) && $attval->place == "office") {
                                                                    echo "selected";
                                                                } ?>>Oficina</option>
                                        <option value="field" <?php if (isset($attval->place) && $attval->place == "field") {
                                                                    echo "selected";
                                                                } ?>>Campo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?php if (!empty($attval->id)) {
                                                                            echo  $attval->id;
                                                                        } ?>" class="form-control"
                                    id="recipient-name1">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" id="attendanceUpdate" class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="holysmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Vacaciones</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="Add_Holidays" id="holidayform" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label">Nombre de Vacaciones</label>
                                <input type="text" name="holiname" class="form-control" id="recipient-name1"
                                    minlength="4" maxlength="25" value="" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Fecha de Inicio de Vacaciones</label>
                                <input type="date" name="startdate" class="form-control" id="recipient-name1" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Fecha de Fin de Vacaciones</label>
                                <input type="date" name="enddate" class="form-control" id="recipient-name1" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Número de Días</label>
                                <input type="number" name="nofdate" class="form-control" id="recipient-name1" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Año</label>
                                <textarea class="form-control" name="year" id="message-text1"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".holiday").click(function(e) {
                e.preventDefault(e);
                // Obtener el ID del registro a través del atributo  
                var iid = $(this).attr('data-id');
                $('#holidayform').trigger("reset");
                $('#holysmodel').modal('show');
                $.ajax({
                    url: 'Holidaybyib?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function(response) {
                    console.log(response);
                    // Rellenar los campos del formulario con los datos devueltos del servidor
                    $('#holidayform').find('[name="id"]').val(response.holidayvalue.id).end();
                    $('#holidayform').find('[name="holiname"]').val(response.holidayvalue
                        .holiday_name).end();
                    $('#holidayform').find('[name="startdate"]').val(response.holidayvalue
                        .from_date).end();
                    $('#holidayform').find('[name="enddate"]').val(response.holidayvalue
                        .to_date).end();
                    $('#holidayform').find('[name="nofdate"]').val(response.holidayvalue
                        .number_of_days).end();
                    $('#holidayform').find('[name="year"]').val(response.holidayvalue.year)
                    .end();
                });
            });
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".holidelet").click(function(e) {
                e.preventDefault(e);
                // Obtener el ID del registro a través del atributo  
                var iid = $(this).attr('data-id');
                $.ajax({
                    url: 'HOLIvalueDelet?id=' + iid,
                    method: 'GET',
                    data: 'data',
                }).done(function(response) {
                    console.log(response);
                    $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                    window.setTimeout(function() {
                        location.reload()
                    }, 2000)
                });
            });
            $("#attendanceUpdate").on("click", function() {
                window.setTimeout(function() {
                    location.reload()
                }, 1000);
            });
        });
        </script>
        <?php $this->load->view('backend/footer'); ?>