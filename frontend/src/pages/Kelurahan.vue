<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{ message  }}

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Kota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="i in this.resultPasien" :key="i.id">
                                    <td>{{ i.nama_kelurahan }}</td>
                                    <td>{{ i.nama_kecamatan }}</td>
                                    <td>{{ i.nama_kota }}</td>
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
    name: 'pasien-page',
    data: () => {
        return {
            message: 'Pasien',
            result: []
        }
    },
    computed: {
        resultPasien() {
            return this.result;
        }
    },
    mounted() {
        fetch ('http://127.0.0.1:8000/kelurahan/list')
        .then(response => response.json())
        .then((data) => {
            this.result = data
        });
    }

}
</script>