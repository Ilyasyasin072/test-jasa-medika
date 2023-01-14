<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Data Kelurahan
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>Tlp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="res in data" :key="res.id">
                                    <td>{{  res.nama_kelurahan }}</td>
                                    <td>{{  res.nama_kecamatan }}</td>
                                    <td>{{  res.nama_kota }}</td>
                                    <td><button><router-link :to="{name: 'kelurahan-edit', params : { id: res.id}}">edit</router-link></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'table-pasien-component',
    data: ()=>{
        return {
            data: [],
        }
    },
    methods: {
        pasienList: function() {
            const url = 'http://localhost:8000/kelurahan/data';
            axios.get(url).then((res) => {
                this.data = res.data
            }).catch((error) => {
                console.log(error)
            })
        }
    },
    mounted() {
        this.pasienList();
    }
}
</script>