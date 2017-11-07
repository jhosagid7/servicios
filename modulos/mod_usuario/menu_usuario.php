<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="drop" style="width: 100%;">
			<ul class="drop_menu">
				<li class="dropdown user user-menu">
					<a href="<?php echo BASE_URL?>modulos/mod_usuario/usuario.php" class="dropdown-toggle" data-toggle="dropdown">
					    <i class="glyphicon glyphicon-home"> </i>
					    <span> Inicio</span>
					</a>
				</li>

				<li class="dropdown user user-menu">
					<a href="<?php echo BASE_URL?>modulos/mod_administrar_proveedores/administrar_proveedores.php" class="dropdown-toggle" data-toggle="dropdown">
					    <i class="glyphicon glyphicon-cloud-download"> </i>
					    <span> Proveedores</span>
					</a>
				</li>

				<li class="dropdown user user-menu">
					<a href="<?php echo BASE_URL?>modulos/mod_administrar_productores/administrar_productores.php" class="dropdown-toggle" data-toggle="dropdown">
					    <i class="glyphicon glyphicon-cloud-upload"> </i>
					    <span> Productores</span>
					</a>
				</li>

				<li class="dropdown user user-menu">
					<a href="<?php echo BASE_URL?>modulos/mod_administrar_compras/administrar_compras.php" class="dropdown-toggle" data-toggle="dropdown">
					    <i class="glyphicon glyphicon-shopping-cart"> </i>
					    <span> Compras</span>
					</a>
				</li>
					
				<li class="dropdown user user-menu">
					<a href="<?php echo BASE_URL?>modulos/mod_administrar_ventas/administrar_ventas.php" class="dropdown-toggle" data-toggle="dropdown">
					    <i class="glyphicon glyphicon-credit-card"> </i>
					    <span> Ventas</span>
					</a>
				</li>

				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					    <i class="glyphicon glyphicon-wrench"> </i>
					    <span> Administrar <i class="caret"></i></span>
					</a>
					<ul>
						<li><a href='<?php echo BASE_URL?>modulos/mod_administrar_empresa/administrar_empresa.php'><i class="glyphicon glyphicon-globe"> Empresa</i> </a></li>
						<li><a href='<?php echo BASE_URL?>modulos/mod_administrar_control/administrar_control.php'><i class="glyphicon glyphicon-list-alt"> Reportes</i> </a></li>
						
					</ul>
				</li>

				<li class="dropdown user user-menu" style="float: right;">
					<a href="<?php echo BASE_URL?>app/salir.php" class="dropdown-toggle" data-toggle="dropdown">
					    <i class="glyphicon glyphicon-off"> </i>
					    <span> <?php echo $_SESSION['nombre'] ?></span>
					</a>
				</li>

			</ul>
		</div>
	</section>
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding: 5px;">
        <h1>
            Bienvenido 
            <small><?php echo $_SESSION["nombre"]; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_SESSION["privilegio"]; ?></a></li>
            <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION["login"]; ?></a></li>
            <li class="active">Area Restringidan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
