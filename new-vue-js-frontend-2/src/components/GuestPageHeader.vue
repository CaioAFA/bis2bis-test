<template>
  <v-col cols="11">
    <header>
      <v-btn @click="goToLoginPage">
        Login
      </v-btn>

      <h1>CB Blog</h1>
      <h2>"O Blog dos Blogs"</h2>
    </header>
  </v-col>
</template>

<script>
export default {
  methods: {
    goToLoginPage(){
      this.$router.push('/admin')
    }
  }  
}
</script>

<style scoped>
header {
  padding: 30px;
  text-align: center;
  position: relative;
}

h1 {
  font-size: 5rem;
  text-shadow: 2px 2px gray;
}

h2 {
  margin-top: 10px;
  font-style: italic;
}

button {
  position: absolute;
  top: 0px;
  right: 0px;
  background-color: rgba(0, 0, 0, 0.03)!important;
}
</style>