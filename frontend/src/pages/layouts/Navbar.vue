<template>
    <div class="container-fluid" style="margin-bottom: 50px">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand bold" href="#"><router-link to="/" style="text-decoration: none;">Jasa Media</router-link></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active" v-if="this.status.role == 1 || this.status.role == 2 ">
                  <router-link to="/pasien" style="text-decoration: none;">
                    <a class="nav-link" href="#">List Pasien</a>
               </router-link>
                </li>
                <li class="nav-item active" v-if="this.status.role == 1 || this.status.role == 2 ">
                  <router-link to="/pasien/register" style="text-decoration: none;">
                    <a class="nav-link" href="#">Pendaftaran Pasien</a>
               </router-link>
                </li>
                <li class="nav-item" v-if="this.status.role == 1">
                    <router-link to="/kelurahan/create" style="text-decoration: none;">
                         <a class="nav-link" href="#">Kelurahan</a>
                    </router-link>
                </li>
                <li class="nav-item" v-if="this.status.statusCode !== 200">
                  <router-link to="login" style="text-decoration: none;">
                    <a class="nav-link" href="#">Login</a>
                  </router-link>
                </li>
                <li class="nav-item" v-else>
                  <a class="nav-link" href="#" @click="logout">Logout ( login sebagai : {{  this.status.role == 1 ? 'admin' : 'Operator' }} )</a>
                </li>
              </ul>
            </div>
          </nav>
    </div>
</template>

<script>
import { authHeader } from '@/utils/common';
export default {
  data:()=>{
    return {
      status: {
        role: null,
        status: null,
        statusCode: null,
      }
    }
  },
  methods: {
    logout() {
      if(confirm('Anda Yakin untuk Keluar ?')) {
        localStorage.clear();
      this.$router.go({ name: 'login'})
      } else {
        return false;
      }
    }
  },
  mounted() {
    const auth = authHeader();
    this.status = auth;
    console.log(this.status);
  }
}
</script>