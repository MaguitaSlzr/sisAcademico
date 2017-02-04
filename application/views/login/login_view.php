<br/>
<br/>
<br/>
<div id="login-block" class="row">
    <div class="col-sm-4 col-md-4 col-sm-offset-3 col-md-offset-4 bg-success container-login">         
        <div class="container-fluid" style="padding-left:0px;">
            <div class="col-md-6">         
                <img src="<?php echo base_url();?>resources/base/img/escudo_oficial.png" class="img-responsive">                    
            </div>
            <div class="col-md-6" style="padding-left:0px;">
                <h1 class="text-center text-primary">INGRESO AL SISTEMA</h1>
            </div>
        </div>
        <br/>
        <div class="col-sm-12">
            <form id="form" method="POST" action="<?php echo base_url();?>login/ingresar">                         
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>                         
                <div class="form-group">                            
                    <?php echo form_label('Usuario:') ?>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'class' => 'form-control', 'placeholder' => 'Ingrese nombre de usuario')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Password:') ?>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <?php echo form_input(array('type' => 'password', 'name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Ingrese su password')) ?>                            
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" style="width: 100%;" >INGRESAR</button> 
                <br/>
                <br/>
            </form>
        </div>
        <h6 style="text-align:center;">Version 1.0</h6>
    </div>
</div>

<!-- El controlador es: crud_codeigniter/application/controllers/login_mdl.php -->
