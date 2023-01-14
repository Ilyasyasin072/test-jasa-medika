<template>
    <div class="row">
       <div class="col-md-8 offset-2">
        <div class="card text-center">
            <div class="card-header">
              NOMOR PASIEN JASA MEDIKA
            </div>
            <div class="card-body">
              <h5 class="card-title">NO PASIEN</h5>
              <h1 class="card-text bold">
                <span class="bg bg-success text-white rounded">{{  this.idPasien }}</span>
            </h1>
              <a @click="$router.go(-1)" class="btn btn-primary" >Close</a>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['nama'],
    data: ()=> {
        return {
            idPasien: '',
        }
    },
    created() {
    // props are exposed on `this`
    this.idPasien = this.$route.query.laksjdlaksjdlaskdh1i3yi12y3hjaksdnmasbdjky1i23yo12lkasdnmansnd;
  }
}
</script>