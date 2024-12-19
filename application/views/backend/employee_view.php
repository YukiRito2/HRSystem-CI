    <?php $this->load->view('backend/header'); ?>
    <?php $this->load->view('backend/sidebar'); ?>
    <div class="page-wrapper">
        <div class="message"></div>
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i>
                    <?php echo $basic->first_name . ' ' . $basic->last_name; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
        </div>
        <?php $degvalue = $this->employee_model->getdesignation(); ?>
        <?php $depvalue = $this->employee_model->getdepartment(); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                                    style="font-size: 14px;"> Información Personal </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"
                                    style="font-size: 14px;"> Dirección </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab"
                                    style="font-size: 14px;"> Educación </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#experience" role="tab"
                                    style="font-size: 14px;"> Experiencia </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab"
                                    style="font-size: 14px;"> Cuenta Bancaria </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#document" role="tab"
                                    style="font-size: 14px;"> Documento </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#salary" role="tab"
                                    style="font-size: 14px;"> Salario </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#leave" role="tab"
                                    style="font-size: 14px;"> Permiso </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#social" role="tab"
                                    style="font-size: 14px;"> Redes Sociales </a> </li>
                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password" role="tab"
                                    style="font-size: 14px;"> Cambiar Contraseña </a> </li>
                            <?php } else { ?>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password1" role="tab"
                                    style="font-size: 14px;"> Cambiar Contraseña </a> </li>
                            <?php } ?>
                        </ul>

                        <!-- Tab panes -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <center class="m-t-30">
                                                            <?php if (!empty($basic->em_image)) { ?>
                                                            <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>"
                                                                class="img-circle" width="150" />
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>assets/images/users/user.png"
                                                                class="img-circle" width="150"
                                                                alt="<?php echo $basic->first_name ?>"
                                                                title="<?php echo $basic->first_name ?>" />
                                                            <?php } ?>
                                                            <h4 class="card-title m-t-10">
                                                                <?php echo $basic->first_name . ' ' . $basic->last_name; ?>
                                                            </h4>
                                                            <h6 class="card-subtitle"><?php echo $basic->des_name; ?>
                                                            </h6>
                                                        </center>
                                                    </div>
                                                    <div>
                                                        <hr>
                                                    </div>
                                                    <div class="card-body">
                                                        <small class="text-muted">Dirección de correo electrónico
                                                        </small>
                                                        <h6><?php echo $basic->em_email; ?></h6>
                                                        <small class="text-muted p-t-30 db">Teléfono</small>
                                                        <h6><?php echo $basic->em_phone; ?></h6>
                                                        <small class="text-muted p-t-30 db">Perfil Social</small>
                                                        <br />
                                                        <a class="btn btn-circle btn-secondary"
                                                            href="<?php if (!empty($socialmedia->skype_id)) echo $socialmedia->facebook ?>"
                                                            target="_blank"><i class="fa fa-facebook"></i></a>
                                                        <a class="btn btn-circle btn-secondary"
                                                            href="<?php if (!empty($socialmedia->skype_id)) echo $socialmedia->twitter ?>"
                                                            target="_blank"><i class="fa fa-twitter"></i></a>
                                                        <a class="btn btn-circle btn-secondary"
                                                            href="<?php if (!empty($socialmedia->skype_id)) echo $socialmedia->skype_id ?>"
                                                            target="_blank"><i class="fa fa-skype"></i></a>
                                                        <a class="btn btn-circle btn-secondary"
                                                            href="<?php if (!empty($socialmedia->google_Plus)) echo $socialmedia->google_Plus ?>"
                                                            target="_blank"><i class="fa fa-google"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <form class="row" action="Update" method="post"
                                                    enctype="multipart/form-data">

                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Código de Empleado </label>
                                                        <input type="text"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> class="form-control form-control-line"
                                                            placeholder="ID" name="eid"
                                                            value="<?php echo $basic->em_code; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control form-control-line"
                                                            placeholder="Nombre del Empleado" name="fname"
                                                            value="<?php echo $basic->first_name; ?>"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> minlength="3" required>
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Apellido </label>
                                                        <input type="text" id="" name="lname"
                                                            class="form-control form-control-line"
                                                            value="<?php echo $basic->last_name; ?>"
                                                            placeholder="Apellido del Empleado"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> minlength="3" required>
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Grupo Sanguíneo </label>
                                                        <select name="blood"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?>
                                                            value="<?php echo $basic->em_blood_group; ?>"
                                                            class="form-control custom-select">
                                                            <option value="<?php echo $basic->em_blood_group; ?>">
                                                                <?php echo $basic->em_blood_group; ?></option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Género </label>
                                                        <select name="gender"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> class="form-control custom-select">

                                                            <option value="<?php echo $basic->em_gender; ?>">
                                                                <?php echo $basic->em_gender; ?></option>
                                                            <option value="Male">Masculino</option>
                                                            <option value="Female">Femenino</option>
                                                        </select>
                                                    </div>
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    <?php } else { ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Tipo de Usuario </label>
                                                        <select name="role" class="form-control custom-select" required>
                                                            <option value="<?php echo $basic->em_role; ?>">
                                                                <?php echo $basic->em_role; ?></option>
                                                            <option value="HR">Recursos Humanos</option>
                                                            <option value="EMPLOYEE">Empleado</option>
                                                            <option value="ADMIN">Super Admin</option>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    <?php } else { ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Estado </label>
                                                        <select name="status"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> class="form-control custom-select"
                                                            required>
                                                            <option value="<?php echo $basic->status; ?>">
                                                                <?php echo $basic->status; ?></option>
                                                            <option value="ACTIVE">ACTIVO</option>
                                                            <option value="INACTIVE">INACTIVO</option>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Fecha de Nacimiento </label>
                                                        <input type="date" id="example-email2" name="dob"
                                                            class="form-control" placeholder=""
                                                            value="<?php echo $basic->em_birthday; ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Número de DNI </label>
                                                        <input type="text"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> class="form-control"
                                                            placeholder="Número de NID" name="nid"
                                                            value="<?php echo $basic->em_nid; ?>" minlength="6">
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Número de Contacto </label>
                                                        <input type="text" class="form-control" placeholder=""
                                                            name="contact"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> value="<?php echo $basic->em_phone; ?>"
                                                            minlength="3" maxlength="15" required>
                                                    </div>
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    <?php } else { ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Departamento</label>
                                                        <select name="dept"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>">
                                                                <?php echo $basic->dep_name; ?></option>
                                                            <?Php foreach ($depvalue as $value): ?>
                                                            <option value="<?php echo $value->id ?>">
                                                                <?php echo $value->dep_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    <?php } else { ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Designación </label>
                                                        <select name="deg"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> class="form-control custom-select">
                                                            <option value="<?php echo $basic->id; ?>">
                                                                <?php echo $basic->des_name; ?></option>
                                                            <?Php foreach ($degvalue as $value): ?>
                                                            <option value="<?php echo $value->id ?>">
                                                                <?php echo $value->des_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Fecha de Ingreso </label>
                                                        <input type="date"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> id="example-email2" name="joindate"
                                                            class="form-control"
                                                            value="<?php echo $basic->em_joining_date; ?>"
                                                            placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Fecha de Fin de Contrato</label>
                                                        <input type="date" id="example-email2" name="leavedate"
                                                            class="form-control"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?>
                                                            value="<?php echo $basic->em_contact_end; ?>"
                                                            placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-4 m-t-10">
                                                        <label>Correo Electrónico </label>
                                                        <input type="email" id="example-email2" name="email"
                                                            class="form-control"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> value="<?php echo $basic->em_email; ?>"
                                                            placeholder="email@mail.com" minlength="7" required>
                                                    </div>
                                                    <div class="form-group col-md-12 m-t-10">
                                                        <?php if (!empty($basic->em_image)) { ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>"
                                                            class="img-circle" width="150" />
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/users/user.png"
                                                            class="img-circle" width="150"
                                                            alt="<?php echo $basic->first_name ?>"
                                                            title="<?php echo $basic->first_name ?>" />
                                                        <?php } ?>
                                                        <label>Imagen </label>
                                                        <input type="file"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> class="form-control" name="image_url">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">
                                                            Actualizar</button>
                                                        <button type="reset"
                                                            class="btn btn-default">Restablecer</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--second tab-->
                            <div class="tab-pane" id="profile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Información de Contacto Permanente</h3>
                                        <form class="row" action="Parmanent_Address" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group col-md-12 m-t-5">
                                                <label>Dirección</label>
                                                <textarea name="paraddress"
                                                    value="<?php if (!empty($permanent->address)) echo $permanent->address ?>"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> class="form-control" rows="3" minlength="7"
                                                    required><?php if (!empty($permanent->address)) echo $permanent->address ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Ciudad</label>
                                                <input type="text" name="parcity" class="form-control form-control-line"
                                                    placeholder=""
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?>
                                                    value="<?php if (!empty($permanent->city)) echo $permanent->city ?>"
                                                    minlength="2" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>País</label>
                                                <input type="text" name="parcountry"
                                                    class="form-control form-control-line" placeholder=""
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?>
                                                    value="<?php if (!empty($permanent->country)) echo $permanent->country ?>"
                                                    minlength="2" required>
                                            </div>
                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                            <?php } else { ?>
                                            <div class="form-actions col-md-12">
                                                <input type="hidden" name="emid" value="<?php echo $basic->em_id ?>">
                                                <input type="hidden" name="id"
                                                    value="<?php if (!empty($permanent->id)) echo $permanent->id ?>">
                                                <button type="submit" class="btn btn-success"> <i
                                                        class="fa fa-check"></i>
                                                    Guardar</button>
                                            </div>
                                            <?php } ?>
                                        </form>

                                        <div class="">
                                            <h3 class="col-md-12">Información de Contacto Actual</h3>
                                        </div>
                                        <hr>
                                        <form class="row" action="Present_Address" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group col-md-12 m-t-5">
                                                <label>Dirección</label>
                                                <textarea name="presaddress"
                                                    value="<?php if (!empty($present->address)) echo $present->address ?>"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> class="form-control" rows="3" minlength="7"
                                                    required><?php if (!empty($present->address)) echo $present->address ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Ciudad</label>
                                                <input type="text" name="prescity"
                                                    class="form-control form-control-line"
                                                    value="<?php if (!empty($present->address)) echo $present->city ?>"
                                                    placeholder="Nombre de la ciudad" minlength="2"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>País</label>
                                                <input type="text" name="prescountry"
                                                    class="form-control form-control-line" placeholder=""
                                                    value="<?php if (!empty($present->address)) echo $present->country ?>"
                                                    minlength="2"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> required>
                                            </div>
                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                            <?php } else { ?>
                                            <div class="form-actions col-md-12">
                                                <input type="hidden" name="emid" value="<?php echo $basic->em_id ?>">
                                                <input type="hidden" name="id"
                                                    value="<?php if (!empty($present->id)) echo $present->id ?>">
                                                <button type="submit" class="btn btn-success"> <i
                                                        class="fa fa-check"></i>
                                                    Guardar</button>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="education" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive ">
                                            <table id="example23"
                                                class="display nowrap table table-hover table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Certificado</th>
                                                        <th>Instituto</th>
                                                        <th>Resultado</th>
                                                        <th>Año</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($education as $value): ?>
                                                    <tr>
                                                        <td><?php echo $value->id ?></td>
                                                        <td><?php echo $value->edu_type ?></td>
                                                        <td><?php echo $value->institute ?></td>
                                                        <td><?php echo $value->result ?></td>
                                                        <td><?php echo $value->year ?></td>
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        <?php } else { ?>
                                                        <td class="jsgrid-align-center ">
                                                            <a href="#" title="Editar"
                                                                class="btn btn-sm btn-primary waves-effect waves-light education"
                                                                data-id="<?php echo $value->id ?>"><i
                                                                    class="fa fa-pencil-square-o"></i></a>
                                                            <a onclick="confirm('¿Está seguro de que desea eliminar esto?')"
                                                                href="#" title="Eliminar"
                                                                class="btn btn-sm btn-danger waves-effect waves-light edudelet"
                                                                data-id="<?php echo $value->id ?>"><i
                                                                    class="fa fa-trash-o"></i></a>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form class="row" action="Add_Education" method="post"
                                            enctype="multipart/form-data" id="insert_education">
                                            <span id="error"></span>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Título del Grado</label>
                                                <input type="text" name="name" class="form-control form-control-line"
                                                    placeholder="Título del Grado"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> minlength="1" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Nombre del Instituto</label>
                                                <input type="text" name="institute"
                                                    class="form-control form-control-line"
                                                    placeholder="Nombre del Instituto"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> minlength="3" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Resultado</label>
                                                <input type="text" name="result" class="form-control form-control-line"
                                                    placeholder="Resultado" minlength="2"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Año de Finalización</label>
                                                <input type="text" name="year"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> class="form-control form-control-line"
                                                    placeholder="Año de Finalización">
                                            </div>
                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                            <?php } else { ?>
                                            <div class="form-actions col-md-6">
                                                <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                                <button type="submit" class="btn btn-success"> <i
                                                        class="fa fa-check"></i>
                                                    Guardar</button>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="experience" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive ">
                                            <table id="example23"
                                                class="display nowrap table table-hover table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre de la Empresa</th>
                                                        <th>Posición</th>
                                                        <th>Duración del Trabajo</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($experience as $value): ?>
                                                    <tr>
                                                        <td><?php echo $value->id ?></td>
                                                        <td><?php echo $value->exp_company ?></td>
                                                        <td><?php echo $value->exp_com_position ?></td>
                                                        <td><?php echo $value->exp_workduration ?></td>
                                                        <td class="jsgrid-align-center ">
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            <?php } else { ?>
                                                            <a href="#" title="Editar"
                                                                class="btn btn-sm btn-info waves-effect waves-light experience"
                                                                data-id="<?php echo $value->id ?>"><i
                                                                    class="fa fa-pencil-square-o"></i></a>
                                                            <a onclick="confirm('¿Está seguro de que desea eliminar esto?')"
                                                                href="#" title="Eliminar"
                                                                class="btn btn-sm btn-info waves-effect waves-light deletexp"
                                                                data-id="<?php echo $value->id ?>"><i
                                                                    class="fa fa-trash-o"></i></a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form class="row" action="Add_Experience" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Nombre de la Empresa</label>
                                                <input type="text" name="company_name"
                                                    class="form-control form-control-line company_name"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> placeholder="Nombre de la Empresa" minlength="2"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Posición</label>
                                                <input type="text" name="position_name"
                                                    class="form-control form-control-line position_name"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> placeholder="Posición" minlength="3" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Dirección</label>
                                                <input type="text" name="address"
                                                    class="form-control form-control-line duty" placeholder="Dirección"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> minlength="7" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Duración del Trabajo</label>
                                                <input type="text" name="work_duration"
                                                    class="form-control form-control-line working_period"
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    readonly <?php } ?> placeholder="Duración del Trabajo" required>
                                            </div>
                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                            <?php } else { ?>
                                            <div class="form-actions col-md-12">
                                                <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                                <button type="submit" class="btn btn-success"> <i
                                                        class="fa fa-check"></i>
                                                    Guardar</button>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="bank" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="row" action="Add_bank_info" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Nombre del Titular del Banco</label>
                                                <input type="text" name="holder_name"
                                                    value="<?php if (!empty($bankinfo->holder_name)) echo $bankinfo->holder_name ?>"
                                                    class="form-control form-control-line"
                                                    placeholder="Nombre del Titular del Banco" minlength="5" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Nombre del Banco</label>
                                                <input type="text" name="bank_name"
                                                    value="<?php if (!empty($bankinfo->bank_name)) echo $bankinfo->bank_name ?>"
                                                    class="form-control form-control-line"
                                                    placeholder="Nombre del Banco" minlength="5" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Nombre de la Sucursal</label>
                                                <input type="text" name="branch_name"
                                                    value="<?php if (!empty($bankinfo->branch_name)) echo $bankinfo->branch_name ?>"
                                                    class="form-control form-control-line"
                                                    placeholder="Nombre de la Sucursal">
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Número de Cuenta Bancaria</label>
                                                <input type="text" name="account_number"
                                                    value="<?php if (!empty($bankinfo->account_number)) echo $bankinfo->account_number ?>"
                                                    class="form-control form-control-line" minlength="5" required>
                                            </div>
                                            <div class="form-group col-md-6 m-t-5">
                                                <label>Tipo de Cuenta Bancaria</label>
                                                <input type="text" name="account_type"
                                                    value="<?php if (!empty($bankinfo->account_type)) echo $bankinfo->account_type ?>"
                                                    class="form-control form-control-line"
                                                    placeholder="Tipo de Cuenta Bancaria">
                                            </div>
                                            <div class="form-actions col-md-12">
                                                <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                                <input type="hidden" name="id"
                                                    value="<?php if (!empty($bankinfo->id)) echo $bankinfo->id ?>">
                                                <button type="submit" class="btn btn-success"> <i
                                                        class="fa fa-check"></i>
                                                    Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="document" role="tabpanel">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example23"
                                            class="display nowrap table table-hover table-striped table-bordered"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Título del Archivo</th>
                                                    <th>Archivo</th>
                                                </tr>
                                            </thead>
                                            <!-- <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Título del Archivo</th>
                            <th>Archivo</th>
                        </tr>
                    </tfoot> -->
                                            <tbody>
                                                <?php foreach ($fileinfo as $value): ?>
                                                <tr>
                                                    <td><?php echo $value->id ?></td>
                                                    <td><?php echo $value->file_title ?></td>
                                                    <td><a href="<?php echo base_url(); ?>assets/images/users/<?php echo $value->file_url ?>"
                                                            target="_blank"><?php echo $value->file_url ?></a></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="row" action="Add_File" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-md-6 m-t-5">
                                            <label class="">Título del Archivo</label>
                                            <input type="text" name="title"
                                                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                readonly <?php } ?> class="form-control" required=""
                                                aria-invalid="false" minlength="5" required>
                                        </div>
                                        <div class="form-group col-md-6 m-t-5">
                                            <label class="">Archivo</label>
                                            <input type="file" name="file_url"
                                                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                readonly <?php } ?> class="form-control" required=""
                                                aria-invalid="false" required>
                                        </div>
                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                        <?php } else { ?>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">
                                                <button type="submit" class="btn btn-success">Agregar Archivo</button>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane" id="leave" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title"> Licencia</h4>
                                                <form action="Assign_leave" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="">Tipo de Licencia</label>
                                                        <select name="typeid"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?>
                                                            class="select2 form-control custom-select"
                                                            style="width: 100%" id="" required>
                                                            <option value="">Seleccionar...</option>
                                                            <?php foreach ($leavetypes as $value): ?>
                                                            <option value="<?php echo $value->type_id ?>">
                                                                <?php echo $value->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Día</label>
                                                        <input type="number"
                                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                            readonly <?php } ?> name="noday"
                                                            class="form-control form-control-line noday"
                                                            placeholder="Día de Licencia" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="">Año</label> <select name="year"
                                                            class="select2 form-control custom-select"
                                                            style="width: 100%" id="" required>
                                                            <option value="">Seleccionar...</option>
                                                            <?php
                                                            for ($x = 2016; $x < 3000; $x++) {
                                                                echo '<option value=' . $x . '>' . $x . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                    <?php } else { ?>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="hidden" name="em_id"
                                                                value="<?php echo $basic->em_id; ?>">
                                                            <button type="submit"
                                                                class="btn btn-success">Enviar</button>
                                                        </div>
                                                    </div> <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title"> Licencia/<?php echo date('Y') ?></h4>
                                                <table
                                                    class="display nowrap table table-hover table-striped table-bordered"
                                                    width="50%">
                                                    <thead>
                                                        <tr class="m-t-50">
                                                            <th>Tipo</th>
                                                            <th>Días Disponibles/Día</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($Leaveinfo as $value): ?>
                                                        <tr>
                                                            <td><?php echo $value->name; ?></td>
                                                            <td><?php echo $value->total_day; ?>/<?php echo $value->day; ?>
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
                            <div class="tab-pane" id="password1" role="tabpanel">
                                <div class="card-body">
                                    <form class="row" action="Reset_Password_Hr" method="post"
                                        enctype="multipart/form-data">
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Contraseña</label>
                                            <input type="text" class="form-control" name="new1" value="" required
                                                minlength="6">
                                        </div>
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Confirmar Contraseña</label>
                                            <input type="text" id="" name="new2" class="form-control " required
                                                minlength="6">
                                        </div>
                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                        <?php } else { ?>
                                        <div class="form-actions col-md-12">
                                            <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                            <button type="submit" class="btn btn-success pull-right"> <i
                                                    class="fa fa-check"></i> Guardar</button>
                                        </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane" id="social" role="tabpanel">
                                <div class="card-body">
                                    <form class="row" action="Save_Social" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Facebook</label>
                                            <input type="url" class="form-control"
                                                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                readonly <?php } ?> name="facebook"
                                                value="<?php if (!empty($socialmedia->facebook)) echo $socialmedia->facebook ?>"
                                                placeholder="www.facebook.com">
                                        </div>
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Twitter</label>
                                            <input type="text" class="form-control"
                                                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                readonly <?php } ?> name="twitter"
                                                value="<?php if (!empty($socialmedia->twitter)) echo $socialmedia->twitter ?>">
                                        </div>
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Google +</label>
                                            <input type="text" id="" name="google"
                                                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                readonly <?php } ?> class="form-control "
                                                value="<?php if (!empty($socialmedia->google_plus)) echo $socialmedia->google_plus ?>">
                                        </div>
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Skype</label>
                                            <input type="text" id="" name="skype"
                                                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                readonly <?php } ?> class="form-control "
                                                value="<?php if (!empty($socialmedia->skype_id)) echo $socialmedia->skype_id ?>">
                                        </div>
                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                        <?php } else { ?>
                                        <div class="form-actions col-md-12">
                                            <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                            <input type="hidden" name="id"
                                                value="<?php if (!empty($socialmedia->id)) echo $socialmedia->id ?>">
                                            <button type="submit" class="btn btn-success pull-right"> <i
                                                    class="fa fa-check"></i> Guardar</button>
                                        </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="password" role="tabpanel">
                                <div class="card-body">
                                    <form class="row" action="Reset_Password" method="post"
                                        enctype="multipart/form-data">
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Contraseña Anterior</label>
                                            <input type="text" class="form-control" name="old" value=""
                                                placeholder="contraseña anterior" required minlength="6">
                                        </div>
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Contraseña</label>
                                            <input type="text" class="form-control" name="new1" value="" required
                                                minlength="6">
                                        </div>
                                        <div class="form-group col-md-6 m-t-20">
                                            <label>Confirmar Contraseña</label>
                                            <input type="text" id="" name="new2" class="form-control " required
                                                minlength="6">
                                        </div>
                                        <div class="form-actions col-md-12">
                                            <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
                                            <button type="submit" class="btn btn-success pull-right"> <i
                                                    class="fa fa-check"></i> Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane" id="salary" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Salario Base</h3>
                                        <form action="Add_Salary" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label class="control-label">Tipo de Salario</label>
                                                    <select
                                                        class="form-control <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> readonly <?php } ?> custom-select"
                                                        data-placeholder="Elige una categoría" tabindex="1"
                                                        name="typeid" required>
                                                        <!-- <option selected>Elige un tipo...</option> -->
                                                        <?php if (empty($salaryvalue->salary_type)) { ?>
                                                        <?php } else { ?>
                                                        <option value="<?php echo $salaryvalue->id; ?>">
                                                            <?php echo $salaryvalue->salary_type; ?></option> <?php } ?>
                                                        <?php foreach ($typevalue as $value): ?>
                                                        <option value="<?php echo $value->id; ?>">
                                                            <?php echo $value->salary_type; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Salario Total</label>
                                                    <input type="text" name="total"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?> class="form-control form-control-line total"
                                                        placeholder="Salario Total"
                                                        value="<?php if (!empty($salaryvalue->total)) echo $salaryvalue->total ?>"
                                                        minlength="3" required>
                                                </div>
                                            </div>

                                            <h3 class="card-title">Adiciones</h3>
                                            <div class="row">
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Base</label>
                                                    <input type="text" name="basic"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?> class="form-control form-control-line basic"
                                                        placeholder="Base..."
                                                        value="<?php if (!empty($salaryvalue->basic)) echo $salaryvalue->basic ?>">
                                                </div>
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Alquiler de Casa</label>
                                                    <input type="text" name="houserent"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?>
                                                        class="form-control form-control-line houserent"
                                                        placeholder="Alquiler de Casa..."
                                                        value="<?php if (!empty($salaryvalue->house_rent)) echo $salaryvalue->house_rent ?>">
                                                </div>
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Salud</label>
                                                    <input type="text" name="medical"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?>
                                                        class="form-control form-control-line medical"
                                                        placeholder="Salud..."
                                                        value="<?php if (!empty($salaryvalue->medical)) echo $salaryvalue->medical ?>">
                                                </div>
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Transporte</label>
                                                    <input type="text" name="conveyance"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?>
                                                        class="form-control form-control-line conveyance"
                                                        placeholder="Transporte..."
                                                        value="<?php if (!empty($salaryvalue->conveyance)) echo $salaryvalue->conveyance ?>">
                                                </div>
                                            </div>

                                            <h3 class="card-title">Deducciones</h3>
                                            <div class="row">
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Seguro</label>
                                                    <input type="text" name="bima"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?> class="form-control form-control-line"
                                                        placeholder="Seguro"
                                                        value="<?php if (!empty($salaryvalue->bima)) echo $salaryvalue->bima ?>">
                                                </div>
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Impuesto</label>
                                                    <input type="text" name="tax"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?> class="form-control form-control-line"
                                                        placeholder="Impuesto"
                                                        value="<?php if (!empty($salaryvalue->tax)) echo $salaryvalue->tax ?>">
                                                </div>
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Fondo Providente</label>
                                                    <input type="text" name="provident"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?> class="form-control form-control-line"
                                                        placeholder="Fondo Providente..."
                                                        value="<?php if (!empty($salaryvalue->provident_fund)) echo $salaryvalue->provident_fund ?>">
                                                </div>
                                                <div class="form-group col-md-6 m-t-5">
                                                    <label>Otros</label>
                                                    <input type="text" name="others"
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        readonly <?php } ?> class="form-control form-control-line"
                                                        placeholder="otros..."
                                                        value="<?php if (!empty($salaryvalue->others)) echo $salaryvalue->others ?>">
                                                </div>
                                            </div>
                                            <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                            <?php } else { ?>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="emid"
                                                        value="<?php echo $basic->em_id; ?>">
                                                    <?php if (!empty($salaryvalue->salary_id)) { ?>
                                                    <input type="hidden" name="sid"
                                                        value="<?php echo $salaryvalue->salary_id; ?>"> <?php } ?>
                                                    <?php if (!empty($salaryvalue->addi_id)) { ?>
                                                    <input type="hidden" name="aid"
                                                        value="<?php echo $salaryvalue->addi_id; ?>"> <?php } ?>
                                                    <?php if (!empty($salaryvalue->de_id)) { ?>
                                                    <input type="hidden" name="did"
                                                        value="<?php echo $salaryvalue->de_id; ?>">
                                                    <?php } ?>
                                                    <button
                                                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                                                        disabled <?php } ?> type="submit" style="float: right"
                                                        class="btn btn-success">Añadir Salario</button>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <script type="text/javascript">
            $('.total').on('input', function() {
                var amount = parseInt($('.total').val());
                $('.basic').val((amount * .50 ? amount * .50 : 0).toFixed(2));
                $('.houserent').val((amount * .40 ? amount * .40 : 0).toFixed(2));
                $('.medical').val((amount * .05 ? amount * .05 : 0).toFixed(2));
                $('.conveyance').val((amount * .05 ? amount * .05 : 0).toFixed(2));
            });
            </script>
            <?php $this->load->view('backend/em_modal'); ?>
            <script type="text/javascript">
            $(document).ready(function() {
                $(".education").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $('#educationmodal').trigger("reset");
                    $('#EduModal').modal('show');
                    $.ajax({
                        url: 'educationbyib?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#educationmodal').find('[name="id"]').val(response.educationvalue.id)
                            .end();
                        $('#educationmodal').find('[name="name"]').val(response.educationvalue
                            .edu_type).end();
                        $('#educationmodal').find('[name="institute"]').val(response
                            .educationvalue
                            .institute).end();
                        $('#educationmodal').find('[name="result"]').val(response.educationvalue
                            .result).end();
                        $('#educationmodal').find('[name="year"]').val(response.educationvalue
                                .year)
                            .end();
                        $('#educationmodal').find('[name="emid"]').val(response.educationvalue
                            .emp_id).end();
                    });
                });
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                $(".experience").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $('#experiencemodal').trigger("reset");
                    $('#ExpModal').modal('show');
                    $.ajax({
                        url: 'experiencebyib?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#experiencemodal').find('[name="id"]').val(response.expvalue.id)
                            .end();
                        $('#experiencemodal').find('[name="company_name"]').val(response
                            .expvalue
                            .exp_company).end();
                        $('#experiencemodal').find('[name="position_name"]').val(response
                            .expvalue
                            .exp_com_position).end();
                        $('#experiencemodal').find('[name="address"]').val(response.expvalue
                            .exp_com_address).end();
                        $('#experiencemodal').find('[name="work_duration"]').val(response
                            .expvalue
                            .exp_workduration).end();
                        $('#experiencemodal').find('[name="emid"]').val(response.expvalue
                                .emp_id)
                            .end();
                    });
                });
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                $(".deletexp").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $.ajax({
                        url: 'EXPvalueDelet?id=' + iid,
                        method: 'GET',
                        data: 'data',
                    }).done(function(response) {
                        console.log(response);
                        $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                        window.setTimeout(function() {
                            location.reload()
                        }, 2000)
                        // Populate the form fields with the data returned from server
                    });
                });
            });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                $(".edudelet").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $.ajax({
                        url: 'EduvalueDelet?id=' + iid,
                        method: 'GET',
                        data: 'data',
                    }).done(function(response) {
                        console.log(response);
                        $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                        window.setTimeout(function() {
                            location.reload()
                        }, 2000)
                        // Populate the form fields with the data returned from server
                    });
                });
            });
            </script>

            <?php $this->load->view('backend/footer'); ?>