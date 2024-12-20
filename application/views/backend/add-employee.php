<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Empleado</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Empleado</li>
            </ol>
        </div>
    </div>
    <div class="message"></div>
    <?php $degvalue = $this->employee_model->getdesignation(); ?>
    <?php $depvalue = $this->employee_model->getdepartment(); ?>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a
                        href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class=""
                            aria-hidden="true"></i> Lista de Empleados</a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a
                        href="<?php echo base_url(); ?>employee/Disciplinary" class="text-white"><i class=""
                            aria-hidden="true"></i> Lista Disciplinaria</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Agregar Nuevo
                            Empleado<span class="pull-right "></span></h4>
                    </div>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->upload->display_errors(); ?>
                    <?php echo $this->session->flashdata('formdata'); ?>
                    <?php echo $this->session->flashdata('feedback'); ?>
                    <div class="card-body">

                        <form class="row" method="post" action="Save" enctype="multipart/form-data">
                            <div class="form-group col-md-3 m-t-20">
                                <label>Nombre</label>
                                <input type="text" name="fname" class="form-control form-control-line"
                                    placeholder="Nombre del Empleado" minlength="2" required>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Apellido</label>
                                <input type="text" id="" name="lname" class="form-control form-control-line" value=""
                                    placeholder="Apellido del Empleado" minlength="2" required>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Código de Empleado</label>
                                <input type="text" name="eid" class="form-control form-control-line"
                                    placeholder="Ejemplo: 8820">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Departamento</label>
                                <select name="dept" value="" class="form-control custom-select" required>
                                    <option>Seleccione Departamento</option>
                                    <?Php foreach ($depvalue as $value): ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->dep_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Designar Area</label>
                                <select name="deg" class="form-control custom-select" required>
                                    <option>Seleccione Designación</option>
                                    <?Php foreach ($degvalue as $value): ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->des_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Rol</label>
                                <select name="role" class="form-control custom-select" required>
                                    <option>Seleccione Rol</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="EMPLOYEE">Empleado</option>
                                    <option value="SUPER ADMIN">Super Admin</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Género</label>
                                <select name="gender" class="form-control custom-select" required>
                                    <option>Seleccione Género</option>
                                    <option value="MALE">Masculino</option>
                                    <option value="FEMALE">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Grupo Sanguíneo</label>
                                <select name="blood" class="form-control custom-select">
                                    <option>Seleccione Grupo Sanguíneo</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>DNI</label>
                                <input type="text" name="nid" class="form-control" value="" minlength="7"
                                    placeholder="123456789">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Número de Contacto</label>
                                <input type="text" name="contact" class="form-control" value="" placeholder="123456789"
                                    minlength="2" maxlength="20">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" name="dob" id="example-email2" name="example-email"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Fecha de Ingreso</label>
                                <input type="date" name="joindate" id="example-email2" name="example-email"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Fecha de Salida</label>
                                <input type="date" name="leavedate" id="example-email2" name="example-email"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Usuario</label>
                                <input type="text" name="username" class="form-control form-control-line" value=""
                                    placeholder="Usuario">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Correo Electrónico</label>
                                <input type="email" id="example-email2" name="email" class="form-control"
                                    placeholder="email@mail.com" minlength="7">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Imagen</label>
                                <input type="file" name="image_url" class="form-control" value="">
                            </div>
                            <div class="form-actions col-md-12">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('backend/footer'); ?>