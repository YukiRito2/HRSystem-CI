<!-- contenido modal de ejemplo -->
<div class="modal fade" id="logisticmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Asignar Soporte Logístico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="Add_Logistic" id="logisModalform" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Lista de Proyectos</label>
                        <select class="form-control custom-select col-md-8" data-placeholder="Elegir una Categoría"
                            tabindex="1" name="proid">
                            <option value="<?php echo $details->id; ?>"><?php echo $details->pro_name; ?></option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Fecha del Proyecto</label>
                        <input type="text" value="<?php echo $details->pro_start_date; ?>" name="prostart"
                            class="form-control col-md-4" id="recipient-name1" readonly>
                        <input type="text" value="<?php echo $details->pro_end_date; ?>" name="proend"
                            class="form-control col-md-4" id="recipient-name1" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Lista de Tareas</label>
                        <select class="form-control custom-select taskclass col-md-3"
                            data-placeholder="Elegir una Categoría" tabindex="1" name="taskid" id="taskval" required>
                            <option value="">Seleccionar Aquí</option>
                            <?php foreach ($tasklist as $value): ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->task_title ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="control-label col-md-2">Asignar a</label>
                        <select class="select2 form-control custom-select col-md-4"
                            data-placeholder="Elegir una Categoría" style="width:25%" tabindex="1" name="teamhead">
                            <option value="">Seleccionar Aquí</option>
                            <?php foreach ($proemployee as $value): ?>
                            <option value="<?php echo $value->em_id; ?>">
                                <?php echo $value->first_name . ' ' . $value->last_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Fecha de Inicio</label>
                        <input type="text" name="startdate" class="form-control col-md-3 mydatetimepickerFull"
                            id="recipient-name1">
                        <label class="control-label col-md-2">Fecha de Fin</label>
                        <input type="text" name="enddate" class="form-control col-md-3 mydatetimepickerFull"
                            id="recipient-name1">
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="control-label col-md-3">Comentarios</label>
                        <textarea class="form-control col-md-8" name="remarks" id="message-text1" minlength="10"
                            maxlength="1400" rows="4"></textarea>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Soporte Logístico</label>
                        <select class="select2 form-control custom-select col-md-4 assetsstock"
                            data-placeholder="Elegir una Categoría" style="width:35%" tabindex="1" name="logistic">
                            <option value="">Seleccionar Aquí</option>
                            <?php foreach ($assets as $value): ?>
                            <option value="<?php echo $value->ass_id; ?>"><?php echo $value->ass_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div style="color:red" class="qty col-md-1"></div>
                        <input type="number" name="qty" id="qty" class="form-control col-md-3" id="recipient-name1"
                            placeholder="Cantidad" max="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> disabled
                        <?php } ?> class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- contenido modal de ejemplo -->
<div class="modal fade" id="tasksmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Agregar Tareas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="Add_Tasks" id="tasksModalform" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Lista de Proyectos</label>
                        <select class="form-control custom-select col-md-8 proid"
                            data-placeholder="Elegir una Categoría" tabindex="1" name="projectid">
                            <option value="<?php echo $details->id; ?>"><?php echo $details->pro_name; ?></option>

                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Fecha del Proyecto</label>
                        <input type="text" value="<?php echo $details->pro_start_date; ?>" name="prostart"
                            class="form-control col-md-4" id="recipient-name1" readonly>
                        <input type="text" value="<?php echo $details->pro_end_date; ?>" name="proend"
                            class="form-control col-md-4" id="recipient-name1" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Asignar a</label>
                        <select class="select2 form-control custom-select col-md-3"
                            data-placeholder="Elegir una Categoría" style="width:25%" tabindex="1" name="teamhead">
                            <option value="">Seleccionar Aquí</option>
                            <?php foreach ($employee as $value): ?>
                            <option value="<?php echo $value->em_id; ?>">
                                <?php echo $value->first_name . ' ' . $value->last_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="control-label col-md-2">Colaboradores</label>
                        <select class="select2 form-control select2-multiple col-md-3"
                            data-placeholder="Elegir una Categoría" multiple="multiple" style="width:25%" tabindex="1"
                            name="assignto[]">
                            <option value="">Seleccionar Aquí</option>
                            <?php foreach ($employee as $value): ?>
                            <option value="<?php echo $value->em_id; ?>">
                                <?php echo $value->first_name . ' ' . $value->last_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Título de la Tarea</label>
                        <input type="text" name="tasktitle" class="form-control col-md-8" id="recipient-name1"
                            minlength="8" maxlength="250" placeholder="Título de la tarea...">
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Fecha de Inicio</label>
                        <input type="text" name="startdate" class="form-control col-md-3 mydatepicker"
                            id="recipient-name1">
                        <label class="control-label col-md-2">Fecha de Fin</label>
                        <input type="text" name="enddate" class="form-control col-md-3 mydatepicker"
                            id="recipient-name1">
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="control-label col-md-3">Detalles</label>
                        <textarea class="form-control col-md-8" name="details" id="message-text1" minlength="10"
                            maxlength="1400" rows="5"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Estado de la Tarea</label>
                        <select class="form-control custom-select col-md-3" data-placeholder="Elegir una Categoría"
                            tabindex="1" name="taskstatus">
                            <option value="">Seleccionar Aquí</option>
                            <option value="1">Completa</option>
                            <option value="2">En Progreso</option>
                            <option value="3">Cancelada</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Tipo de Tarea</label>
                        <select class="form-control custom-select col-md-3" data-placeholder="Elegir una Categoría"
                            tabindex="1" name="tasktype">
                            <option value="">Seleccionar Aquí</option>
                            <option value="1">Oficina</option>
                            <option value="2">Sitio</option>
                            <option value="3">Administración</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> disabled
                        <?php } ?> class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- contenido del modal de ejemplo -->
<div class="modal fade" id="fieldmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Tareas de Campo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="Add_Field_Tasks" id="tasksModalform" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Lista de Proyectos</label>
                        <select class="form-control custom-select col-md-6 proid"
                            data-placeholder="Elegir una Categoría" tabindex="1" name="projectid">
                            <option value="<?php echo $details->id; ?>"><?php echo $details->pro_name; ?></option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Fecha del Proyecto</label>
                        <input type="text" value="<?php echo $details->pro_start_date; ?>" name="prostart"
                            class="form-control col-md-4" id="recipient-name1" readonly>
                        <input type="text" value="<?php echo $details->pro_end_date; ?>" name="proend"
                            class="form-control col-md-4" id="recipient-name1" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Asignar a</label>
                        <select class="select2 form-control custom-select col-md-3"
                            data-placeholder="Elegir una Categoría" style="width:25%" tabindex="1" name="teamhead">
                            <option value="">Seleccionar Aquí</option>
                            <?php foreach ($employee as $value): ?>
                            <option value="<?php echo $value->em_id; ?>"><?php echo $value->first_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="control-label col-md-2">Colaboradores</label>
                        <select class="select2 form-control select2-multiple col-md-3"
                            data-placeholder="Elegir una Categoría" multiple="multiple" style="width:25%" tabindex="1"
                            name="assignto[]">
                            <option value="">Seleccionar Aquí</option>
                            <?php foreach ($employee as $value): ?>
                            <option value="<?php echo $value->em_id; ?>"><?php echo $value->first_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Título de la Tarea</label>
                        <input type="text" name="tasktitle" class="form-control col-md-8" id="recipient-name1"
                            minlength="8" maxlength="250">
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Fecha de Inicio</label>
                        <input type="text" name="startdate" class="form-control col-md-3 mydatepicker"
                            id="recipient-name1">
                        <label class="control-label col-md-1">Fecha de Fin</label>
                        <input type="text" name="enddate" class="form-control col-md-3 mydatepicker"
                            id="recipient-name1">
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="control-label col-md-3">Detalles</label>
                        <textarea class="form-control col-md-8" name="details" id="message-text1" minlength="10"
                            maxlength="1400" rows="4"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Estado: </label>
                        <input name="status" type="radio" id="radio_7" data-value="complete" class="type"
                            value="complete">
                        <label for="radio_7">Completa</label>
                        <input name="status" type="radio" id="radio_5" data-value="running" class="type"
                            value="running">
                        <label for="radio_5">En Progreso</label>
                        <input name="status" type="radio" id="radio_6" data-value="cancel" class="type" value="cancel">
                        <label for="radio_6">Cancelada</label>
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="control-label col-md-3">Ubicación</label>
                        <textarea class="form-control col-md-8" name="location" id="message-text1" minlength="10"
                            maxlength="1400" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="form-control" id="recipient-name1">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> disabled
                        <?php } ?> class="btn btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--                                    <script>
                                        $(document).ready(function () {
                                            $('#tasksModalform input').on('change', function(e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var duration = $('input[name=type]:checked', '#tasksModalform').attr('data-value');
                                                if(duration =='Field'){
                                                    console.log(duration);
                                                    $('#location').show();
                                                } 
                                                else if(duration =='Office'){
                                                    console.log(duration);
                                                  $('#location').hide();  
                                                }
                                            });
                                        });                                                          
                                    </script> -->
<script type="text/javascript">
$(document).ready(function() {
    $(".taskclass").change(function(e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = +this.value;
        //console.log(this.value);
        $("#assignval").change();
        //$('#salaryform').trigger("reset");
        $.ajax({
            url: '<?php echo base_url(); ?>logistice/GetAssignforlogistic?id=' + this.value,
            method: 'GET',
            data: 'data'
        }).done(function(response) {
            console.log(response);
            // Populate the form fields with the data returned from server
            $('#assignval').html(response);
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(".assetsstock").change(function(e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = +this.value;
        //console.log(this.value);
        //"#taskval option:selected" ).text();
        $("#qty").change();
        //$('#salaryform').trigger("reset");
        $.ajax({
            url: '<?php echo base_url(); ?>logistice/GetInstock?id=' + this.value,
            method: 'GET',
            data: 'data',
        }).done(function(response) {
            console.log(response);
            // Populate the form fields with the data returned from server
            $('.qty').html(response);
            $('#tasksModalform').find('[name="qty"]').attr("max", response);
        });
    });
});
</script>
<!--<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".proid").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).val();
                                                console.log(iid);
                                                $('#tasksModalform').trigger("reset");
                                                $('#tasksmodel').modal('show');
                                                $.ajax({
                                                    url: 'projectbyId?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#tasksModalform').find('[name="prostart"]').val(response.provalue.pro_start_date).end();
                                                    $('#tasksModalform').find('[name="proend"]').val(response.provalue.pro_end_date).end();
												});
                                            });
                                        });
</script>  -->