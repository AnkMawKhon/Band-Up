<template>
<div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">'Register'</div>

                <div class="card-body">
                    <form
  id="app"
  @submit="checkForm"
  action="register"
  method="post"
>
  <p v-if="errors.length" class="alert alert-danger">
    <b>Please correct the following error(s):</b>
    <ul>
      <li  v-for="error in errors">{{ error }}</li>
    </ul>
  </p>

  <p>
    <label for="name">Name</label>
    <input
      id="name"
      v-model="name"
      type="text"
      class="form-control"
      name="name"
    >
  </p>

  <p>
    <label for="email">Email</label>
    <input
      id="email"
      v-model="email"
      type="email"
      class="form-control"
      name="email"
      min="0"
    >
  </p>

   <p>
    <label for="password">Password</label>
    <input
      id="password"
      v-model="password"
      type="password"
      class="form-control"
      name="password"
    >
  </p>

  <p>
    <input
    class="btn btn-success"
      type="submit"
      value="Submit"
    >
  </p>

</form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
    data() {
      return {
    errors: [],
    name: null,
    email: null,
    password: null,
    validationErrors: null,
      }
  },
  mounted() {
    console.log('mounted')
  },
  methods: {
    checkForm: function (e) {
      this.errors = [];

      if (!this.name) {
        this.errors.push("Name required.");
      }
      if (!this.email) {
        this.errors.push('Email required.');
      } else if (!this.validEmail(this.email)) {
        this.errors.push('Valid email required.');
      }
      if (!this.password) {
        this.errors.push('Password required.');
      } else if (this.password.length < 6) {
        this.errors.push('Password must be minimum of 8 characters.');
      }

      if (!this.errors.length) {
        axios.post('register', {
    name:  this.name,
    email: this.email,
    password: this.password
  })
  .then(function (response) {
    window.location.href = 'user';
  })
  .catch(function (error) {
    if (error.response.status == 422){
       alert(Object.values(error.response.data.errors).flat());
      }
  });
      }

      e.preventDefault();
    },
    validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  }
  }
</script>