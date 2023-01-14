<template>
    <KelurahanFormPage/>
    <br>
    <KelurahanTablePage/>
</template>

<script>
import KelurahanFormPage from '@/components/Kelurahan/FormKelurahanComponent.vue';
import KelurahanTablePage from '@/components/Kelurahan/TableKelurahanComponent.vue';
export default {
    components: {
        KelurahanFormPage,
        KelurahanTablePage
    }
}
</script>