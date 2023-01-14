<template>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 style="color: #3181C6">Welcome Jasa Medika</h1>
        <h4 class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore amet repellat cum omnis quae iusto ut. Hic reprehenderit eius officia, dolorum minima excepturi sed accusamus debitis deserunt unde expedita reiciendis!</h4>
        <router-link to="/pasien/register">
        <button class="btn btn-lg mt-5" style="color: white; background: #3181C6">
            Daftar Sekarang ...
        </button>
      </router-link>
      </div>
      <div class="col-md-5">
        <img :src="this.image" width="500" alt="">
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="card m-3" v-for="n in 8" :key="n" style="width: 18rem;">
        <img class="card-img-top" :src="this.image" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
  </div>
  </template>
  
  <script>
  import Medical from '@/assets/undraw_doctors_p6aq.svg';
  export default {
    name: 'Home',
    data: ()=>{
      return {
        image: Medical
      }
    },
    props: {
      msg: String
    }
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  h3 {
    margin: 40px 0 0;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline-block;
    margin: 0 10px;
  }
  a {
    color: #42b983;
  }
  </style>
  