<template>
  <div id="app-wrapper" data-app>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',

  data: () => ({
  }),
};
</script>

<style>
body {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin: 0;
  padding: 0;
  height: 100vh;
}

.text-left {
  text-align: left;
}

.text-center {
  text-align: center;
}

.text-right {
  text-align: right;
}

.color-red {
  color: red !important;
}
</style>

<style scoped>
#app-wrapper > div{
  display: flex;
}
</style>