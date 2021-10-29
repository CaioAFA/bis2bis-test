<template>
    <div>
        <AdminPageMenu/>
        
        <AdminPageContent>
            <AdminPageTitle :title="title" />

            <slot></slot>
        </AdminPageContent>
    </div>
</template>

<script>
import AdminPageMenu from '../components/AdminPageMenu'
import AdminPageContent from '../components/AdminPageContent'
import AdminPageTitle from '../components/AdminPageTitle.vue'

export default {
    components: {
        AdminPageMenu,
        AdminPageContent,
        AdminPageTitle
    },
    props: {
        title: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped>

</style>