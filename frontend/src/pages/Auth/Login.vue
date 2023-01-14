<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <img :src="this.image" class="center" width="400" alt="">
                    </div>
                    <div class="container">
                            <div v-if="errors.length">
                                <div class="alert alert-danger" v-for="error in errors" :key="error" role="alert">
                                    {{ error.status }}
                                  </div>
                            </div>
                        <form>
                            <div class="form-group">
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="formData.email">
                              <small id="emailHelp" class="form-text text-muted">Mohon untuk login terlebih dahulu</small>
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="formData.password">
                            </div>
                            <br>
                            <button type="submit" @click.prevent="login" class="btn mb-5" style="color : #3181c6">Login</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { setUserSession } from '@/utils/common.js';
import Medika from '@/assets/undraw_medicine_b-1-ol.svg';
export default {
    name: 'login-jasa-medika',
    data: ()=>{
        return {
            image: Medika,
            errors: [],
            formData: {
                password: '',
                email: '',
            }
        }
    },
    methods: {
        login() {
            const url = 'http://localhost:8000/login/user';
            axios.post(url, this.formData).then((res) => {
                console.log(res.data)
                setUserSession(res.data.role_id, res.data);
                this.$router.push({ name: 'dashboard'})
            }).catch((error) => {
                if(error.response.status == 401) {
                   this.errors.push({ statusCode: '401', 'status' : 'Password/Email Salah, Mohon di cek Kembali'})
                }
            })
        }
    }
}
</script>