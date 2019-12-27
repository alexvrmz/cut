var app = new Vue({  

  el: "#root",
  data: {
    showingaddModal: false,
    showingeditModal: false,
    showingdeleteModal: false,
    errorMessage: "",
    successMessage: "",
    successMessage2: "",
    users: [],
    newUser: {apaterno_usuario: "", email_usuario: "", celular_usuario: ""},
    clickedUser: {},
  },

  mounted: function () {
    console.log("Vue.js is running...");
    this.getAllUsers();
  },

  methods: {
    getAllUsers: function () {
      axios.get('https://cutlacaelel.ml/api/temp.php?action=read')
      .then(function (response) {
        console.log(response);

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.users = response.data.users;
        }
      })
    },

    addUser: function () {
      var formData = app.toFormData(app.newUser);
      axios.post('https://cutlacaelel.ml/api/temp.php?action=create', formData)
      .then(function (response) {
        console.log(response);
        app.newUser = {username: "", email: "", mobile: ""};

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.successMessage = response.data.message;
          app.successMessage2 = response.data.message2;
          app.getAllUsers();
        }
      });
    },

    updateUser: function () {
      var formData = app.toFormData(app.clickedUser);
      axios.post('https://cutlacaelel.ml/api/temp.php?action=update', formData)
      .then(function (response) {
        console.log(response);
        app.clickedUser = {};

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.successMessage = response.data.message;
          app.successMessage2 = response.data.message2;
          app.getAllUsers();
        }
      });
    },

    deleteUser: function () {
      var formData = app.toFormData(app.clickedUser);
      axios.post('https://cutlacaelel.ml/api/temp.php?action=delete', formData)
      .then(function (response) {
        console.log(response);
        app.clickedUser = {};

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.successMessage = response.data.message;
          app.successMessage2 = response.data.message2;
          app.getAllUsers();
        }
      })
    },

    selectUser(user) {
      app.clickedUser = user;
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