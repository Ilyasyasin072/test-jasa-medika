<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <img :src="this.image" width="600" alt="">
      </div>
      <div class="col-md-6 col-xs-12">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4" style="color: #3181C6">Pendaftaran Akun Admin/Operator</h1>
            <p class="lead text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro odit tempora laboriosam facere, maiores quisquam praesentium perspiciatis voluptate officiis eaque enim minus, dolorum delectus dolorem? Distinctio quo quia quis consectetur.</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">

            <div class="card mb-5" v-if="errors.length">
              <div class="card-body">
                <div class="alert alert-danger" v-for="error in errors" :key="error" role="alert">
                  {{ error }}
                </div>
              </div>
            </div>
            <form>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Nama" v-model="formData.name">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Email" v-model="formData.email">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Passowrd" v-model="formData.password">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Role" v-model="formData.role_id">
                </div>

              </div>
              <hr>
              <button class="btn btn-lg center" style="color: #3181C6" :loading="loading" @click.prevent="save">Simpan</button>&nbsp;
              <button class="btn btn-lg center" style="color: #3181C6" @click.prevent="$router.go(-1)">Back</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Medical from '@/assets/undraw_medical_care_movn.svg';
export default {
  name: 'form-register',
  data: ()=> {
    return {
      image: Medical,
      loading: false,
      errors: [],
      formData: {
        name: '',
        email: '',
        password: '',
        role_id: ''
      }
    }
  },
  mounted() {
  },
  methods: {

    save() {
      const url = 'http://localhost:8000/register/user';
      if (this.formData.name) {

        axios.post(url, this.formData)
            .then(res => {
              this.loading = true;
              setTimeout(() => {
                this.$router.push({ name: 'register' })
              }, 500);
            })
            .catch(err => {
              // handle error
              console.log(err);
            })

      }


      this.errors = [];

      if (!this.formData.name ) {
        this.errors.push('Nama required.');
      }

    }
  }
}
</script>