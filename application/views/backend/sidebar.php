<aside class="left-sidebar">
    <!-- Desplazamiento del sidebar-->
    <div class="scroll-sidebar">
        <!-- Perfil de usuario -->
        <?php
        $id = $this->session->userdata('user_login_id');
        $basicinfo = $this->employee_model->GetBasic($id);
        ?>
        <div class="user-profile">
            <!-- Imagen del perfil de usuario -->
            <div class="profile-img"> <img
                    src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>"
                    alt="usuario" />
                <!-- Este es el latido parpadeante-->
                <!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
            </div>

            <!-- Texto del perfil de usuario-->
            <div class="profile-text">
                <h5><?php echo $basicinfo->first_name . ' ' . $basicinfo->last_name; ?></h5>
                <a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button"
                    aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Cerrar sesión"><i
                        class="mdi mdi-power"></i></a>
            </div>
        </div>
        <!-- Fin del texto del perfil de usuario-->
        <!-- Navegación del sidebar-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li> <a href="<?php echo base_url(); ?>"><i class="mdi mdi-gauge"></i><span
                            class="hide-menu">Tablero</span></a></li>
                <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                <li> <a class="has-arrow waves-effect waves-dark"
                        href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>"
                        aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                            class="hide-menu">Empleados</span></a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-rocket"></i><span class="hide-menu">Permisos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>leave/Holidays">Vacaciones</a></li>
                        <li><a href="<?php echo base_url(); ?>leave/EmApplication">Solicitud de permiso</a></li>
                        <li><a href="<?php echo base_url(); ?>leave/EmLeavesheet">Hoja de permisos</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-briefcase-check"></i><span class="hide-menu">Proyectos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Projects/All_Projects">Proyectos</a></li>
                        <li><a href="<?php echo base_url(); ?>Projects/All_Tasks">Lista de tareas</a></li>
                    </ul>
                </li>
                <?php } else { ?>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="fa fa-building-o"></i><span class="hide-menu">Organización</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>organization/Department">Departamentos</a></li>
                        <li><a href="<?php echo base_url(); ?>organization/Designation">Designación</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-account-multiple"></i><span class="hide-menu">Empleados</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>employee/Employees">Empleados</a></li>
                        <li><a href="<?php echo base_url(); ?>employee/Disciplinary">Disciplinarios</a></li>
                        <li><a href="<?php echo base_url(); ?>employee/Inactive_Employee">Empleado inactivo</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-clipboard-text"></i><span class="hide-menu">Asistencia</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>attendance/Attendance">Lista de asistencia</a></li>
                        <li><a href="<?php echo base_url(); ?>attendance/Save_Attendance">Añadir asistencia</a></li>
                        <li><a href="<?php echo base_url(); ?>attendance/Attendance_Report">Informe de asistencia</a>
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-account-off"></i><span class="hide-menu">Permisos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>leave/Holidays">Vacaciones</a></li>
                        <li><a href="<?php echo base_url(); ?>leave/leavetypes">Tipo de permiso</a></li>
                        <li><a href="<?php echo base_url(); ?>leave/Application">Solicitud de permiso</a></li>
                        <li><a href="<?php echo base_url(); ?>leave/Earnedleave">Permiso ganado</a></li>
                        <li><a href="<?php echo base_url(); ?>leave/Leave_report">Informe</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-briefcase-check"></i><span class="hide-menu">Proyecto</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Projects/All_Projects">Proyectos</a></li>
                        <li><a href="<?php echo base_url(); ?>Projects/All_Tasks">Lista de tareas</a></li>
                        <li><a href="<?php echo base_url(); ?>Projects/Field_visit">Visita de campo</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-receipt"></i><span class="hide-menu">Nómina</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Payroll/Salary_List">Lista de nómina</a></li>
                        <li><a href="<?php echo base_url(); ?>Payroll/Generate_salary">Generar boleta de pago</a></li>
                        <li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report">Informe de boleta de pago</a></li>
                    </ul>
                </li>

                <!-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-cash"></i><span class="hide-menu">Prestamos</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>Loan/View">Conceder préstamo</a></li>
                            <li><a href="<?php echo base_url(); ?>Loan/installment">Cuota del préstamo</a></li>
                        </ul>
                    </li>
                    -->

                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-grid"></i><span class="hide-menu">Activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Logistice/Assets_Category">Categoría de activos</a></li>
                        <li><a href="<?php echo base_url(); ?>Logistice/All_Assets">Lista de activos</a></li>
                        <li><a href="<?php echo base_url(); ?>Logistice/logistic_support">Soporte logístico</a></li>
                    </ul>
                </li>

                <li> <a href="<?php echo base_url() ?>notice/All_notice"><i class="mdi mdi-clipboard"></i><span
                            class="hide-menu">Avisos</span></a></li>
                <li> <a href="<?php echo base_url(); ?>settings/Settings"><i class="mdi mdi-settings"></i><span
                            class="hide-menu">Configuración</span></a></li>
                <?php } ?>
            </ul>
        </nav>
        <!-- Fin de la navegación del sidebar -->
    </div>
    <!-- Fin del desplazamiento del sidebar-->
</aside>