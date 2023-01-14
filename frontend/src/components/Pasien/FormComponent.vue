<template>
   <div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <img :src="this.image" width="600" alt="">
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4" style="color: #3181C6">Pendaftaran Pasien</h1>
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
                            <input type="text" class="form-control" placeholder="Name" v-model="formData.nama">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Alamat" v-model="formData.alamat">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Tlp" v-model="formData.tlp">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                              <!-- <input type="text" class="form-control" placeholder="Kelurahan" v-model="formData.id_kelurahan"> -->
                              <select class="form-control js-data-example-ajax" v-model="formData.id_kelurahan">
                              </select>
                              {{ this.nama_kecamatan }}
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Tanggal Lahir" v-model="formData.tanggal_lahir">
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" placeholder="JK" v-model="formData.jk">
                            </div>
                          </div>
                          <br>
                          <button class="btn btn-lg center" style="color: #3181C6" :loading="loading" @click.prevent="save">Register</button>&nbsp;
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
            success: false,
            nama_kecamatan: '',
            formData: {
                nama: '',
                alamat: '',
                tlp: '',
                id_kelurahan: '',
                tanggal_lahir: '1995-12-12',
                jk: ''
            }
        }
    },
    mounted() {
        this.kelurahan();
    },
    methods: {
        kelurahan() {
            $('.js-data-example-ajax').select2({
                placeholder: "Select a state",
                width: '180',
                ajax: {
                    url: 'http://localhost:8000/kelurahan/list',
                    processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data
                    };
                    },
                }
            });    
            
            $('.js-data-example-ajax').on('select2:select', function (e) {
                var data = e.params.data;
                $(this).data('id_kelurahan', data.id);
            });
        },
        save() {
            const url = 'http://localhost:8000/pasien/register';
            this.formData.id_kelurahan = $('.js-data-example-ajax').data('id_kelurahan');
            if (this.formData.nama && this.formData.alamat && this.formData.tlp && this.formData.tanggal_lahir && this.formData.jk && this.formData.id_kelurahan) {

                axios.post(url, this.formData)
                .then(res => {
                    const idPasien = res.data.registerPasien.id;
                    const NamePasien = res.data.registerPasien.nama;
                    const NomorPasien = idPasien + '-' +NamePasien + '-' + Date.now()
                    this.$router.push({ name: 'pasien-slug', query: { laksjdlaksjdlaskdh1i3yi12y3hjaksdnmasbdjky1i23yo12lkasdnmansnd: NomorPasien }})
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            
            }


            this.errors = [];

            if (!this.formData.nama ) {
                this.errors.push('Nama required.');
            }

            if (!this.formData.alamat ) {
                this.errors.push('Alamat required.');
            }

            if (!this.formData.tlp ) {
                this.errors.push('Nomor Tlp required.');
            }


            if (!this.formData.tanggal_lahir ) {
                this.errors.push('Nomor Tlp required.');
            }


            if (!this.formData.jk ) {
                this.errors.push('Nomor Tlp required.');
            }

           
        }
    }
}
</script>