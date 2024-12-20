<?php
$this->load->view('backend/header');
?>
<?php
$this->load->view('backend/sidebar');
?>
<div class="page-wrapper">
    <div class="message">
    </div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-money"></i> Vista de Nómina
            </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Inicio
                    </a>
                </li>
                <li class="breadcrumb-item active">Vista de Nómina
                </li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-bars">
                    </i>
                    <a href="<?php
                    echo base_url();
                    ?>Payroll/Salary_Type" class="text-white">
                        <i class="" aria-hidden="true">
                        </i> Tipos de Sueldo
                    </a>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> Lista de Nómina Mensual
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="" id="salaryform" class="form-material row">
                                            <div class="form-group col-md-4">
                                                <select class="form-control custom-select"
                                                    data-placeholder="Elige una categoría" tabindex="1" id="depid"
                                                    name="depid" style="margin-top: 21px;" required>
                                                    <option value="#">Departamento
                                                    </option>
                                                    <?php foreach ($department as $value): ?>
                                                    <option value="<?php echo $value->id; ?>">
                                                        <?php echo $value->dep_name; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class='input-group date' id=''>
                                                            <input type='text' name="datetime"
                                                                class="form-control mydatetimepicker"
                                                                placeholder="Mes" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button style="float:left;margin-top:23px" type="submit" id="BtnSubmit"
                                                    class="btn btn-success">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>PIN
                                        </th>
                                        <th>Nombre completo
                                        </th>
                                        <th>Sueldo total
                                        </th>
                                        <th>Acción
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="payroll">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
    // Populate the payroll table to generate the payroll for each individual
    $("#BtnSubmit").on("click", function(event) {
        event.preventDefault();
        var depid = $('#depid').val();
        var datetime = $('.mydatetimepicker').val();

        $.ajax({
            url: "load_employee_by_deptID_for_pay?date_time=" + datetime + "&dep_id=" + depid,
            type: "GET",
            dataType: '',
            data: 'data',
            success: function(response) {
                // console.log(response);
                $('.payroll').html(response);
            },
            error: function(response) {

            }
        });
    });
    </script>

    <div class="modal fade" id="generatePayrollModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Arreglo Salarial
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <form method="post" action="pay_salary_add_record" id="generatePayrollForm"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Empleado</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" data-placeholder="Elige una categoría"
                                    id="emid" tabindex="1" name="emid" id="OnEmValue" required>
                                    <option value="#">Selecciona Aquí
                                    </option>
                                    <?php foreach ($employee as $value): ?>
                                    <option value="<?php echo $value->em_id; ?>">
                                        <?php echo $value->first_name . ' ' . $value->last_name; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-left col-md-3">Mes
                            </label>
                            <div class="col-md-9">
                                <input type="hidden" name="year">
                                <select class="form-control custom-select" data-placeholder="Elige un mes" tabindex="1"
                                    name="month" id="salaryMonth" required>
                                    <option value="#">Selecciona Aquí
                                    </option>
                                    <option value="1">Enero
                                    </option>
                                    <option value="2">Febrero
                                    </option>
                                    <option value="3">Marzo
                                    </option>
                                    <option value="4">Abril
                                    </option>
                                    <option value="5">Mayo
                                    </option>
                                    <option value="6">Junio
                                    </option>
                                    <option value="7">Julio
                                    </option>
                                    <option value="8">Agosto
                                    </option>
                                    <option value="9">Septiembre
                                    </option>
                                    <option value="10">Octubre
                                    </option>
                                    <option value="11">Noviembre
                                    </option>
                                    <option value="12">Diciembre
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row well">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Salario Básico
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="basic" class="form-control" id="" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Horas trabajadas
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="month_work_hours" class="form-control thour" value=""
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Horas trabajadas
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="hours_worked" class="form-control hours_worked" id=""
                                            value="">
                                        <span>Trabajo sin pago:</span><span class="wpay"></span> <span>hrs</span>
                                    </div>
                                </div>
                                <div class="form-group row" style="display:none">
                                    <label class="control-label text-left col-md-5">
                                    </label>
                                    <div class="col-md-7">
                                        <input type="hidden" name="hrate" class="form-control hrate" id="hrate"
                                            value=''>
                                    </div>
                                </div>
                                <div class="form-group row" id="addition">
                                    <label class="control-label text-left col-md-5">Adición
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="addition" class="form-control" id="" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Fecha de pago
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="paydate" class="form-control mydatetimepickerFull"
                                            id="" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row" id="diduction">
                                    <label class="control-label text-left col-md-5">Deducción
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="diduction" class="form-control diduction" id=""
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" id="loan">
                                    <label class="control-label text-left col-md-5">Préstamo
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="loan" class="form-control loan" id="" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Salario Final
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="total_paid" class="form-control total_paid" id=""
                                            value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-left col-md-5">Estado
                                    </label>
                                    <div class="col-md-7">
                                        <input name="status" type="radio" id="radio_1" data-value="Pagado"
                                            class="duration" value="Pagado" checked="checked">
                                        <label for="radio_1">Pagado</label>
                                        <input name="status" type="radio" id="radio_2" data-value="En Proceso"
                                            class="type" value="En Proceso">
                                        <label for="radio_2">En Proceso</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: 25px;">
                            <label class="control-label text-left col-md-3">Tipo de Pago</label><br>
                            <div class="col-md-9">
                                <input name="paid_type" type="radio" id="radio_3" data-value="Efectivo" class=""
                                    value="Efectivo" checked="checked">
                                <label for="radio_3" style="margin-left: 30px">Efectivo</label>
                                <input name="paid_type" type="radio" id="radio_4" data-value="Banco" class="type"
                                    value="Banco">
                                <label for="radio_4" style="margin-left: 130px">Banco</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="action" value="add" class="form-control" id="formAction">
                        <input type="hidden" name="loan_id" value="" class="form-control" id="loanID">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar
                        </button>
                        <button type="submit" class="btn btn-success">Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('keyup', '.hours_worked', function() {
            var finalsalary = 0;
            //var total;  
            var deduction = 0;
            var rows = this.closest('#generatePayrollForm div');

            var hrate = parseFloat($('.hrate').val());
            var final = parseFloat($('.total_paid').val());
            var loan = parseFloat($('.loan').val());
            var hwork = parseFloat($('.hours_worked').val());
            var thour = parseFloat($('.thour').val());

            finalsalary = (hwork * hrate) - loan;
            $(".total_paid").val(finalsalary.toFixed(2));
            var total = thour - hwork;
            var deduction = (total * hrate) + loan;
            $(".diduction").val(deduction.toFixed(2));
            $(".wpay").html(total.toFixed(2));

            console.log(loan);
            // var returnval;
            //returnval = payval - payableval;
            /*            if(returnval<=0){
                              $(".due").val(Math.abs(returnval).toFixed(2));
                          }else if(returnval > 0){
                             $(".due").val(''); 
                          }
                          $(".return").val(returnval.toFixed(2));*/

        });
    });
    </script>
    <script type="text/javascript">
    // Populate salary data on generate salary click
    $(document).ready(function() {

        $(document).on('click', ".salaryGenerateModal", function(e) {
            e.preventDefault(e);

            $('#generatePayrollModal').modal('show');

            var emid = $(this).data('id');
            var month = $(this).data('month');
            var year = $(this).data('year');
            var has_loan = $(this).data('has_loan');

            console.log(has_loan);

            $('#generatePayrollForm').find('[name="emid"]').val(emid).attr('readonly', true).end();
            $('#generatePayrollForm').find('[name="month"]').val(Math.abs(month)).attr('readonly', true)
                .end();

            $.ajax({
                url: 'generate_payroll_for_each_employee?month=' + month + '&year=' + year +
                    '&employeeID=' + emid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function(response) {
                console.log(response);

                if (response.addition == 0) {
                    $('#generatePayrollForm').find('[id="addition"]').val('').hide().end();
                }
                if (response.diduction == 0) {
                    $('#generatePayrollForm').find('[id="diduction"]').val('').hide().end();
                }
                if (response.loan == 0) {
                    $('#generatePayrollForm').find('[id="loan"]').val('').hide().end();
                }

                $('#generatePayrollForm').find('[name="basic"]').val(response.basic_salary)
                    .attr('readonly', true).end();
                $('#generatePayrollForm').find('[name="month_work_hours"]').val(response
                    .total_work_hours).attr('readonly', true).end();
                $('#generatePayrollForm').find('[name="hours_worked"]').val(response
                    .employee_actually_worked) /*.attr('readonly', true)*/ .end();
                $('#generatePayrollForm').find('[name="addition"]').val(response.addition)
            .end();
                $('#generatePayrollForm').find('[name="diduction"]').val(response.diduction)
                    .end();
                $('#generatePayrollForm').find('[class="wpay"]').html(response.wpay).end();
                $('#generatePayrollForm').find('[name="loan"]').val(response.loan_amount).prop(
                    'readonly', true).end();
                $('#generatePayrollForm').find('[name="loan_id"]').val(response.loan_id).end();
                $('#generatePayrollForm').find('[name="total_paid"]').val(response.final_salary)
                    .end();
                $('#generatePayrollForm').find('[name="year"]').val(year).end();
                $('#generatePayrollForm').find('[name="hrate"]').val(response.rate).end();
            });
        });
    });
    </script>
    <?php
  $this->load->view('backend/footer');
  ?>