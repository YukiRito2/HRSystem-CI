<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-money"></i> Cuotas de Préstamo</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Cuotas de Préstamo</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal"
                        data-target="#loanmodel" data-whatever="@getbootstrap" class="text-white"><i class=""
                            aria-hidden="true"></i> Añadir Cuota de Préstamo </a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a
                        href="<?php echo base_url(); ?>Loan/installment" class="text-white"><i class=""
                            aria-hidden="true"></i> Lista de Préstamos</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> Cuotas de Préstamo </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="loan123" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Código de Empleado</th>
                                        <th>ID de Préstamo</th>
                                        <th>Número de Préstamo </th>
                                        <th>Monto de Cuota </th>
                                        <!--<th>Monto Pagado</th>-->
                                        <th>Fecha de Aprobación </th>
                                        <th>Receptor </th>
                                        <th>Número de Cuota </th>
                                        <th>Acción </th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Código de Empleado</th>
                                        <th>ID de Préstamo</th>
                                        <th>Número de Préstamo </th>
                                        <th>Monto de Cuota </th>
                                        <th>Monto Pagado</th>
                                        <th>Fecha de Aprobación </th>
                                        <th>Receptor </th>
                                        <th>Número de Cuota </th>
                                        <th>Acción </th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php foreach ($installment as $value): ?>
                                    <tr>
                                        <td><?php echo $value->em_code ?></td>
                                        <td><?php echo $value->loan_id ?></td>
                                        <td><?php echo $value->loan_number ?></td>
                                        <td><?php echo $value->install_amount ?></td>
                                        <!--<td><?php #echo $value->pay_amount 
                                                    ?></td>-->
                                        <td><?php echo date('jS \of F Y', strtotime($value->app_date)); ?></td>
                                        <td><?php echo $value->receiver ?></td>
                                        <td><?php echo $value->install_no ?></td>
                                        <td class="jsgrid-align-center">
                                            <a href="#" title="Editar"
                                                class="btn btn-sm btn-primary waves-effect waves-light installment"
                                                data-id="<?php echo $value->id ?>"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                            <a href="#" title="Eliminar"
                                                class="btn btn-sm btn-danger waves-effect waves-light"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contenido del modal -->
    <div class="modal fade" id="loanmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Añadir Préstamo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form role="form" method="post" action="Add_Loan_Installment" id="loanvalueform"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Asignar A</label>
                            <select class="form-control custom-select" data-placeholder="Seleccionar Categoría"
                                tabindex="1" name="emid" id="employee" required>
                                <option value="">Seleccionar Aquí</option>
                                <?php foreach ($employee as $value): ?>
                                <option value="<?php echo $value->em_id; ?>">
                                    <?php echo $value->first_name . ' ' . $value->last_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Número de Préstamo</label>
                            <input type="text" name="loanno" class="form-control" id="recipient-name1" readonly
                                required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Monto de Cuota</label>
                            <input type="text" name="amount" class="form-control" id="recipient-name1" readonly>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Fecha</label>
                            <input type="text" name="appdate" class="form-control mydatetimepickerFull"
                                id="recipient-name1" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Receptor</label>
                            <input type="text" name="receiver" class="form-control" id="recipient-name1" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label"> Número de Cuota</label>
                            <input type="text" name="installno" class="form-control" id="recipient-name1" readonly
                                required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Notas</label>
                            <textarea class="form-control" name="notes" id="message-text1"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="loanid" value="">
                        <input type="hidden" name="id" value="">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->
</div>

<!-- sample modal content -->
<div class="modal fade" id="loanmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add Loan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" action="Add_Loan_Installment" id="loanvalueform"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Assign To</label>
                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1"
                            name="emid" id="employee" required>
                            <option value="">Select Here</option>
                            <?php foreach ($employee as $value): ?>
                            <option value="<?php echo $value->em_id; ?>">
                                <?php echo $value->first_name . ' ' . $value->last_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Loan Number</label>
                        <input type="text" name="loanno" class="form-control" id="recipient-name1" readonly required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Install Amount</label>
                        <input type="text" name="amount" class="form-control" id="recipient-name1" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Date</label>
                        <input type="text" name="appdate" class="form-control mydatetimepickerFull" id="recipient-name1"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Receiver</label>
                        <input type="text" name="receiver" class="form-control" id="recipient-name1" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label"> Install No</label>
                        <input type="text" name="installno" class="form-control" id="recipient-name1" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label"> Notes</label>
                        <textarea class="form-control" name="notes" id="message-text1"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="loanid" value="">
                    <input type="hidden" name="id" value="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->
<script type="text/javascript">
$(document).ready(function() {
    $(".installment").click(function(e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#loanvalueform').trigger("reset");
        $('#loanmodel').modal('show');
        $.ajax({
            url: 'LoanByID?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function(response) {
            console.log(response);
            // Populate the form fields with the data returned from server
            $('#loanvalueform').find('[name="id"]').val(response.loanvalueinstallment.id).end();
            $('#loanvalueform').find('[name="loanid"]').val(response.loanvalueinstallment
                .loan_id).end();
            $('#loanvalueform').find('[name="emid"]').val(response.loanvalueinstallment.emp_id)
                .end();
            $('#loanvalueform').find('[name="loanno"]').val(response.loanvalueinstallment
                .loan_number).end();
            $('#loanvalueform').find('[name="amount"]').val(response.loanvalueinstallment
                .install_amount).end();
            $('#loanvalueform').find('[name="appdate"]').val(response.loanvalueinstallment
                .app_date).end();
            $('#loanvalueform').find('[name="receiver"]').val(response.loanvalueinstallment
                .receiver).end();
            $('#loanvalueform').find('[name="installno"]').val(response.loanvalueinstallment
                .install_no).end();
            $('#loanvalueform').find('[name="notes"]').val(response.loanvalueinstallment.notes)
                .end();
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#employee").change(function(e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = +this.value;
        //console.log(this.value);
        $("#loanvalueform").change();
        //$('#salaryform').trigger("reset");
        $.ajax({
            url: 'LoanByID?id=' + this.value,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function(response) {
            console.log(response);
            // Populate the form fields with the data returned from server
            if (response.loanvalueem == null) {
                $('#loanvalueform').find('[class="form-control"]').val("", "true").end();
            }
            $('#loanvalueform').find('[name="loanid"]').val(response.loanvalueem.id).end();
            $('#loanvalueform').find('[name="amount"]').val(response.loanvalueem.installment)
                .end();
            $('#loanvalueform').find('[name="loanno"]').val(response.loanvalueem.loan_number)
                .end();
            $('#loanvalueform').find('[name="installno"]').val(response.loanvalueem
                .install_period).end();
        });
    });
});
</script>
<?php $this->load->view('backend/footer'); ?>
<script>
$('#loan123').DataTable({
    "aaSorting": [
        [4, 'desc']
    ],
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
</script>