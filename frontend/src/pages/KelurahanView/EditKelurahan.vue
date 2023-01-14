<template>
    <div class="container">
     <div class="row">
         <div class="col-md-6 col-xs-12">
             <img :src="this.image" width="600" alt="">
         </div>
         <div class="col-md-6 col-xs-12">
             <div class="jumbotron jumbotron-fluid">
                 <div class="container">
                   <h1 class="display-4" style="color: #3181C6">Edit Kelurahan {{  this.$route.params.id }}</h1>
                   <p class="lead text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro odit tempora laboriosam facere, maiores quisquam praesentium perspiciatis voluptate officiis eaque enim minus, dolorum delectus dolorem? Distinctio quo quia quis consectetur.</p>
                 </div>
               </div>

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
                    <label for="">Nama Kelurahan</label>
                    <input type="text" class="form-control" placeholder="Nama Kelurahan" v-model="formData.nama_kelurahan">
                  </div>
                  <div class="col">
                    <label for="">Nama Kecamatan</label>
                    <input type="text" class="form-control" placeholder="Nama Kecamatan" v-model="formData.nama_kecamatan">
                  </div>
                  <div class="col">
                    <label for="">Nama Kota</label>
                    <input type="text" class="form-control" placeholder="Nama Kota" v-model="formData.nama_kota">
                  </div>
                </div>
                <hr>
                  <button class="btn btn-lg center" style="color: #3181C6" :loading="loading" @click.prevent="update">Update</button>&nbsp;
                  <button class="btn btn-lg center" style="color: #3181C6" @click.prevent="$router.go(-1)">Back</button>
              </form>
         </div>
     </div>
    </div>
 </template>

 <script>
  import Medical from '@/assets/undraw_medical_care_movn.svg';
    export default {
        props: ['id'],
        data: ()=> {
            return {
                image: Medical,
                errors: [],
                formData: {
                 nama_kelurahan: '',
                 nama_kecamatan: '',
                 nama_kota: '',
             }
            }
        },
        mounted() {
            this.getId();
        },
        
        methods: {
            getId() {
                const url = 'http://localhost:8000/kelurahan/edit/'+ this.$route.params.id;
                axios.post(url).then((res) => {
                    console.log(res.data);
                    this.formData.nama_kelurahan = res.data.nama_kelurahan;
                    this.formData.nama_kecamatan = res.data.nama_kecamatan;
                    this.formData.nama_kota = res.data.nama_kota;
                })
            },
            update() {
                const url = 'http://localhost:8000/kelurahan/update/'+ this.$route.params.id;
                if (this.formData.nama_kecamatan && this.formData.nama_kelurahan && this.formData.nama_kota) {
                    
                    axios.post(url, this.formData)
                    .then(res => {
                        this.loading = true;
                        setTimeout(() => {
                            this.$router.push({ name: 'kelurahan-manage' })
                        }, 500);
                    })
                    .catch(err => {
                        // handle error
                        console.log(err);
                    })

                    }

                this.errors = [];
 
                if (!this.formData.nama_kelurahan ) {
                    this.errors.push('Nama required.');
                }

                if (!this.formData.nama_kecamatan ) {
                    this.errors.push('Alamat required.');
                }

                if (!this.formData.nama_kota ) {
                    this.errors.push('Nomor Tlp required.');
                } 

            }
        }
    }
</script>