<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="#"><router-link to="/pasien/register">Pasien Register</router-link></a>
                        <div class="card-title">
                            Pasien List
                        </div>
                        <TablePasienComponent/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TablePasienComponent from '@/components/Pasien/TablePasienComponent.vue';
export default {
    name: 'pasien-page',
    components: {
        TablePasienComponent
    },
    data: () => {
        return {
            message: 'Pasien'
        }
    }

}
</script>