<template>
    <div id="page-content">
        <slot></slot>
    </div>
</template>

<script>
export default {
}
</script>

<style scoped>
#page-content {
    /* Fill the remaining space */
    flex: 1;
}
</style>