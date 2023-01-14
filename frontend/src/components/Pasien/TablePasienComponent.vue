<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Tlp</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="res in data" :key="res.id">
                            <td>{{  res.nama }}</td>
                            <td>{{  res.alamat }}</td>
                            <td>{{  res.tlp }}</td>
                            <td>{{  res.tanggal_lahir }}</td>
                            <td>{{  res.jk }}</td>
                        </tr>
                    </tbody>
                </table>
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
            const url = 'http://localhost:8000/pasien/list';
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