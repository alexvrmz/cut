<?php
include('../cabecera.php');
?>
	
	<div id="root">
		
		<div class="container p-5">
			<div class="row">
				<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<button class="btn btn-link" @click="showingaddModal = true;">Add Usuario</button>
						</li>
					</ul>
				

				<div class="alert alert-danger col-md-12" id="alertMessage" role="alert" v-if="errorMessage">
					{{ errorMessage }}
				</div>

				<div class="alert alert-success col-md-12" id="alertMessage" role="alert" v-if="successMessage">
					{{ successMessage }}
				</div>

				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th>S/N</th>
							<th>Usuarioname</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody class="tbody-custom">
						<tr v-for="usuario in usuarios">
							<td>{{usuario.id_usuario}}</td>
							<td>{{usuario.matricula_usuario}}</td>
							<td>{{usuario.email}}</td>
							<td>{{usuario.mobile}}</td>
							<td><button @click="showingeditModal = true; selectUsuario(usuario);" class="btn btn-warning">Edit</button></td>
							<td><button @click="showingdeleteModal = true; selectUsuario(usuario);" class="btn btn-danger">Delete</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	<!-- add modal -->
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
			</div>


	<!-- edit modal -->
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
		</div>


		<!-- delete data -->
		<div class="modal col-md-6" id="deletemodal" v-if="showingdeleteModal">
			<div class="modal-head">
				<p class="p-left p-2">Delete usuario</p>
				<hr/>

				<div class="modal-body">
						<center>
							<p>Are you sure you want to delete?</p>
							<h3>{{clickedUsuario.matricula_usuario}}</h3>
						</center>
					<hr/>
						<button type="button" class="btn btn-danger"  @click="showingdeleteModal = false; deleteUsuario();">Yes</button>
						<button type="button" class="btn btn-warning"   @click="showingdeleteModal = false;">No</button>
				</div>
			</div>
		</div>

	</div>
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
  	newUsuario: {matricula_usuario: "", email: "", mobile: ""},
  	clickedUsuario: {},
  },

  mounted: function () {
  	console.log("Vue.js is running...");
  	this.getAllUsuarios();
  },

  methods: {
  	getAllUsuarios: function () {
  		axios.get('https://cutlacaelel.ml/crud/api/v1.php?action=read')
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
  		axios.post('https://cutlacaelel.ml/crud/api/v1.php?action=create', formData)
  		.then(function (response) {
  			console.log(response);
  			app.newUsuario = {matricula_usuario: "", email: "", mobile: ""};

  			if (response.data.error) {
  				app.errorMessage = response.data.message;
  			} else {
  				app.successMessage = response.data.message;
          app.successMessage2 = response.data.message2;
  				app.getAllUsuarios();
  			}
  		});
  	},

  	updateUsuario: function () {
  		var formData = app.toFormData(app.clickedUsuario);
  		axios.post('https://cutlacaelel.ml/crud/api/v1.php?action=update', formData)
  		.then(function (response) {
  			console.log(response);
  			app.clickedUsuario = {};

  			if (response.data.error) {
  				app.errorMessage = response.data.message;
  			} else {
  				app.successMessage = response.data.message;
          app.successMessage2 = response.data.message2;
  				app.getAllUsuarios();
  			}
  		});
  	},

  	deleteUsuario: function () {
  		var formData = app.toFormData(app.clickedUsuario);
  		axios.post('https://cutlacaelel.ml/crud/api/v1.php?action=delete', formData)
  		.then(function (response) {
  			console.log(response);
  			app.clickedUsuario = {};

  			if (response.data.error) {
  				app.errorMessage = response.data.message;
  			} else {
  				app.successMessage = response.data.message;
          app.successMessage2 = response.data.message2;
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
      app.successMessage2 = "";
  	},


  }
});
  </script>
<?php
include('../pie.php');
?>