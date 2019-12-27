<?php
include('../cabecera.php');
?>
	
	
		<div class="panel-header panel-header-sm">
    	</div>
		
		<div class="content" id="root">
			<div class="alert alert-danger col-md-12" id="alertMessage" role="alert" v-if="errorMessage">
					{{ errorMessage }}
				</div>

				<div class="alert alert-success col-md-12" id="alertMessage" role="alert" v-if="successMessage">
					{{ successMessage }}
				</div>

			<div class="col-md-12">
	          <div class="card">
	            <div class="row">
	              <div class="col-md-8">                        
	                <div class="card-header">
	                  <h6 class="card-title"> Promedio General
	                    <button class="btn btn-success btn-sm">8.7</button></h6>
	                </div>
	              </div>
	              <div class="col-md-4" style="text-align: center;">
	                <button class="btn btn-danger btn-round">
	                  <i class="now-ui-icons arrows-1_cloud-download-93"></i> PDF
	                </button>
	              </div>
	            </div>
	            <div class="card-body">
	              <div class="row">
	                <div class="col-md-9">
	                  <h4 class="card-title">INSCRITO AL SEMESTRE 2020-1</h4>
	                </div>
	                <div class="col-md-3" style="text-align: center;">
	                  <img src="../imagenes/economia.png" title="Lic. en Economía">
	                </div>
	              </div>            
	            </div>
	          </div>
	        </div>
	      
				

				<div class="col-md-12">
		            <div class="card">
		              <div class="card-header">
		                <div class="row">
		                  <div class="col-md-9">
		                    <h4 class="card-title">Alumnos <small class="description"></small></h4>
		                  </div>
		                  <div class="col-md-3">
		                    <button class="btn btn-success" @click="showingaddModal = true;" data-toggle="modal" data-target="#addmoldal"><b><i class="fa fa-user-plus"></i> Agregar Alumno</b></button>
		                  </div>
		                </div>
		              </div>
		              <div class="card-body table-full-width">
		                <div class="table-responsive">
		                  <table class="table">
		                    <thead class="text-primary">
		                      <tr>
		                        <th>Matricula</th>
		                        <th>Nombre</th>
		                        <th>Email</th>
		                        <th>Telefono</th>
		                        <th>Acciones</th>
		                      </tr>
		                    </thead>
		                    <tbody class="tbody-custom">
		                      <tr v-for="usuario in usuarios">
		                        <td>{{usuario.matricula_usuario}}</td>
		                        <td>{{usuario.apaterno_usuario}} {{usuario.amaterno_usuario}} {{usuario.nombres_usuario}}</td>
		                        <td>{{usuario.email_usuario}}</td>
		                        <td>{{usuario.telefono_usuario}}</td>
		                        <td>
		                          <a href="#" title="Ver Alumno" class="btn btn-info btn-sm btn-icon"><i class="fa fa-eye" aria-hidden="true"></i></a>
		                          <a href="#" title="Editar Alumno" class="btn btn-warning btn-sm btn-icon" data-toggle="modal" data-target="#editmoldal" @click="selectUsuario(usuario);"><i class="fa fa-edit" aria-hidden="true"></i></a>
		                          <a href="#" title="Eliminar Alumno" class="btn btn-danger btn-sm btn-icon" @click="showingdeleteModal = true; selectUsuario(usuario);"><i class="fa fa-eraser" aria-hidden="true"></i></a>
		                        </td>
		                      </tr>
		                    </tbody>
		                  </table>
		                </div>
		              </div>
		            </div>
		          </div>

		        

				

				<!-- Modal Agregar -->
				<div class="modal fade" id="addmoldal" tabindex="-1" role="dialog" aria-labelledby="addmoldalLabel" aria-hidden="true" v-if="showingaddModal">
				 	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h5 class="modal-title" id="exampleModalLabel">Agregar Alumno</h5>
							    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							    </button>
				      		</div>
						    <div class="modal-body">
						      	<form>
							 		<div class="form-group">
									   	<label for="apaterno_usuario">Apellido Paterno</label>
									    <input type="text" class="form-control" id="apaterno_usuario" placeholder="Apellido Paterno" v-model="newUsuario.apaterno_usuario">
									</div>
							  		<div class="form-group">
							    		<label for="amaterno_usuario">Apellido Materno</label>
							    		<input type="text" class="form-control" id="amaterno_usuario" placeholder="Apellido Materno" v-model="newUsuario.amaterno_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="nombres_usuario">Nombre(s)</label>
							    		<input type="text" class="form-control" id="nombres_usuario" placeholder="Apellido Materno" v-model="newUsuario.nombres_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="matricula_usuario">Matricula</label>
							    		<input type="text" class="form-control" id="matricula_usuario" placeholder="Matricula" v-model="newUsuario.matricula_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="email_usuario">Email</label>
							    		<input type="text" class="form-control" id="email_usuario" placeholder="usuario@ejemplo.com" v-model="newUsuario.email_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="telefono_usuario">Telefono</label>
							    		<input type="text" class="form-control" id="telefono_usuario" placeholder="Telefono" v-model="newUsuario.telefono_usuario">
							  		</div>
								
						    </div>
						    <div class="modal-footer">
						      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="addUsuario();">Crear</button>
						        </form>
						    </div>
						</div>
					</div>
				</div>

				<!-- Modal Editar -->
				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalLabel" aria-hidden="true" v-if="showingeditModal">
				 	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h5 class="modal-title" id="exampleModalLabel">Editar Alumno</h5>
							    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							    </button>
				      		</div>
						    <div class="modal-body">
						      	<form>
							 		<div class="form-group">
									   	<label for="apaterno_usuario">Apellido Paterno</label>
									    <input type="text" class="form-control" id="apaterno_usuario" placeholder="Apellido Paterno" v-model="clickedUsuario.apaterno_usuario">
									</div>
							  		<div class="form-group">
							    		<label for="amaterno_usuario">Apellido Materno</label>
							    		<input type="text" class="form-control" id="amaterno_usuario" placeholder="Apellido Materno" v-model="clickedUsuario.amaterno_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="nombres_usuario">Nombre(s)</label>
							    		<input type="text" class="form-control" id="nombres_usuario" placeholder="Apellido Materno" v-model="clickedUsuario.nombres_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="matricula_usuario">Matricula</label>
							    		<input type="text" class="form-control" id="matricula_usuario" placeholder="Matricula" v-model="clickedUsuario.matricula_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="email_usuario">Email</label>
							    		<input type="text" class="form-control" id="email_usuario" placeholder="usuario@ejemplo.com" v-model="clickedUsuario.email_usuario">
							  		</div>
							  		<div class="form-group">
							    		<label for="telefono_usuario">Telefono</label>
							    		<input type="text" class="form-control" id="telefono_usuario" placeholder="Telefono" v-model="clickedUsuario.telefono_usuario">
							  		</div>
								
						    </div>
						    <div class="modal-footer">
						      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="updateUsuario();">Crear</button>
						        </form>
						    </div>
						</div>
					</div>
				</div>



				

	<!-- add modal 
		<div class="modal col-md-6" id="addmodal" v-if="showingaddModal">
				<div class="modal-head">
					<p class="p-left p-2">Add usuario</p>
					<hr/>

					<div class="modal-body">
							<div class="col-md-12">
								<label for="uname">Usuarioname</label>
								<input type="text" id="uname" class="form-control" v-model="newUsuario.matricula_usuario">

								<label for="email">Email</label>
								<input type="text" id="email" class="form-control" v-model="newUsuario.email">

								<label for="phn">Mobile</label>
								<input type="text" id="phn" class="form-control" v-model="newUsuario.mobile">
							</div>

						<hr/>
							<button type="button" class="btn btn-success"  @click="showingaddModal = false; addUsuario();">Save changes</button>
							<button type="button" class="btn btn-danger"   @click="showingaddModal = false;">Close</button>
					</div>
				</div>
			</div> -->


	<!-- edit modal
		<div class="modal col-md-6" id="editmodal" v-if="showingeditModal">
			<div class="modal-head">
				<p class="p-left p-2">Edit usuario</p>
				<hr/>

				<div class="modal-body">
						<div class="col-md-12">
							<label for="uname">Usuarioname</label>
							<input type="text" id="uname" class="form-control" v-model="clickedUsuario.matricula_usuario">

							<label for="email">Email</label>
							<input type="text" id="email" class="form-control" v-model="clickedUsuario.email">

							<label for="phn">Mobile</label>
							<input type="text" id="phn" class="form-control" v-model="clickedUsuario.mobile">
						</div>

					<hr/>
						<button type="button" class="btn btn-success"  @click="showingeditModal = false; updateUsuario();">Save changes</button>
						<button type="button" class="btn btn-danger"   @click="showingeditModal = false;">Close</button>
				</div>
			</div>
		</div> -->


		

	

	</div>
	<script src="../assets/js/jquery.js"></script>
  	<script src="../assets/js/vue.min.js"></script>

  	<script type="text/javascript">
  	var app = new Vue({ 

	  el: "#root",
	  data: {
	  	showingaddModal: false,
	  	showingeditModal: false,
	  	showingdeleteModal: false,
	  	errorMessage: "",
	  	successMessage: "",
	    usuarios: [],
	    users: "",
	  	newUsuario: {matricula_usuario: "", apaterno_usuario: "", amaterno_usuario: "", nombres_usuario: "", email_usuario: "", telefono_usuario: ""},
	  	clickedUsuario: {},
	  },

	  mounted: function () {
	  	console.log("Vue.js is running...");
	  	this.getAllUsuarios();
	  },

	  methods: {
	  	getAllUsuarios: function () {
	  		axios.get('https://cutlacaelel.ml/api/v1.php?action=leer')
	  		.then(function (response) {
	  			console.log(response);

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  			} else {
	  				app.usuarios = response.data.usuarios;
	  			}
	  		})
	  	},

	  	addUsuario: function () {
	  		var formData = app.toFormData(app.newUsuario);
	  		axios.post('https://cutlacaelel.ml/api/v1.php?action=agregar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.newUsuario = {matricula_usuario: "", apaterno_usuario: "", amaterno_usuario: "", nombres_usuario: "", email_usuario: "", telefono_usuario: ""};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  			} else {
	  				app.successMessage = response.data.message;
	          		//app.successMessage2 = response.data.message2;
	  				app.getAllUsuarios();
	  			}
	  		});
	  	},

	  	updateUsuario: function () {
	  		var formData = app.toFormData(app.clickedUsuario);
	  		axios.post('https://cutlacaelel.ml/api/v1.php?action=actualizar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.clickedUsuario = {};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  			} else {
	  				app.successMessage = response.data.message;
	          		//app.successMessage2 = response.data.message2;
	  				app.getAllUsuarios();
	  			}
	  		});
	  	},

	  	deleteUsuario: function () {
	  		var formData = app.toFormData(app.clickedUsuario);
	  		axios.post('https://cutlacaelel.ml/api/v1.php?action=eliminar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.clickedUsuario = {};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  			} else {
	  				app.successMessage = response.data.message;
	          		//app.successMessage2 = response.data.message2;
	  				app.getAllUsuarios();
	  			}
	  		})
	  	},

	  	selectUsuario(Usuario) {
	  		app.clickedUsuario = Usuario;
	  	},

	  	toFormData: function (obj) {
	  		var form_data = new FormData();
	  		for (var key in obj) {
	  			form_data.append(key, obj[key]);
	  		}
	  		return form_data;
	  	},

	  	clearMessage: function (argument) {
	  		app.errorMessage   = "";
	  		app.successMessage = "";
	     	//app.successMessage2 = "";
	  	},


	  }
	});
  	</script>
<?php
include('../pie.php');
?>