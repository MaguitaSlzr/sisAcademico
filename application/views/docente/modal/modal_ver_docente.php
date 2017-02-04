<div class="modal fade" id="modalVer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hiden="true" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle Docente</h4>
            </div>
            <div class="modal-body">
            	<ul class="nav nav-tabs">
	                <li class="active"><a href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
	                <li><a href="#datosUsuario" data-toggle="tab">Datos de Usuario</a></li>
	            </ul>
				<div class="tab-content">
	                <div class="tab-pane active" id="datosPersonales">
	                	<input type="hidden" id="txtIdOcultoDocente" />
	                    <table class="table table-bordered">
	                    <!--
		                    <tr>
		                        <th class="col-md-4">C&oacute;digo Generado:</th>
		                        <td><span id="idVer"></span></td>
		                    </tr>
		                -->
		                    <tr>
		                        <th class="col-md-4">Cedula de Identidad:</th>
		                        <td><span id="ciVer"></span> <span id="expedidoVer"></span></td>
		                    </tr>
		                    <tr>
		                        <td colspan="2">
		                        	<p>
		                        		<strong>Nombre Completo:</strong>
		                        	</p>
		                        	<table  style="width:100%">
		                        		<tr>
					                        <td align="center"><span id="nombreVer"></span></td>		
					                        <td align="center"><span id="paternoVer"></span></td>		
					                        <td align="center"><span id="maternoVer"></span></td>
					                    </tr>
					                    <tr>
					                    	<td align="center" style="border-top: 1px dashed #aaa;"><span>Nombres</span></td>
											<td align="center" style="border-top: 1px dashed #aaa;"><span>Paterno</span></td>
											<td align="center" style="border-top: 1px dashed #aaa;"><span>Materno</span></td>
					                    </tr>
		                        	</table>
		                        </td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">G&eacute;nero:</th>
		                        <td><span id="generoVer"></span></td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">Direcci&oacute;n:</th>
		                        <td><span id="direccionVer"></span></td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">Email:</th>
		                        <td><span id="emailVer"></span></td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">Tel&eacute;fono:</th>
		                        <td><span id="telefonoVer"></span></td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">Movil:</th>
		                        <td><span id="movilVer"></span></td>
		                    </tr>
		                </table>
	                </div>
	                <div class="tab-pane" id="datosUsuario">
	                    <table class="table table-bordered">
		                    <tr>
		                        <th class="col-md-4">Fecha de Registro:</th>
		                        <td><span id="fechaVer"></span></td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">Nombre de Usuario:</th>
		                        <td><span id="usuarioVer"></span></span></td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">Rol de Usuario:</th>
		                        <td><span id="rolVer"></span></span></td>
		                    </tr>
		                    <tr>
		                        <th class="col-md-4">Estado de Usuario:</th>
		                        <td><span id="estadoVer"></span></span></td>
		                    </tr>
		                </table>
		                <div class="alert alert-info" role="alert">
							<p>El password o contraseña de cada usuario es un parametro critico de alta seguridad, por lo tanto si el usuario ha olvidado su contraseña debe de editar el registro del mismo y asignarle una nueva.</p>
						</div>
	                </div>
	            </div>
            </div>
            <div class="modal-footer">
            <!--
	            <button class="btn btn-success btnVentana" onclick="editarModal()" data-dismiss="modal"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
	            <button class="btn btn-danger btnVentana" data-dismiss="modal" onclick="eliminarModal()"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
	        -->
	        	<button class="btn btn-success"><span class="glyphicon glyphicon-list"></span> Imprimir Reporte</button>
                <button class="btn btn-default btnVentana" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
