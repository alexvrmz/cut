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