<template>
    <h1>{{ title }}</h1>
</template>

<script>
export default {
    props: {
        title: {
            required: true,
            type: String
        }
    }
}
</script>

<style scoped>
h1 {
    text-align: center;
    background-color: lightgray;
    padding: 60px 0;
    margin: 0;
}
</style>