<template>
  <v-col id="post-wrapper" cols="11">
    <h1>{{ post.title }}</h1>

    <v-col cols="12" id="content-wrapper">
      <p>{{ post.content | truncate(500) }}</p>

      <img :src="post.image" :alt="post.title">
    </v-col>
  </v-col>
</template>

<script>
export default {
  props: {
    post: {
      required: true,
    }
  }
}
</script>

<style scoped>
#post-wrapper {
  padding: 0;
  border: 1px solid black;
  border-radius: 10px;
  overflow: hidden;
  background-color: white;
  cursor: pointer;
}

h1 {
  font-style: italic;
  background-color: rgba(0, 0, 0, 0.1);
  padding: 10px;
}

#content-wrapper{
  padding: 0;
  background-color: rgba(0, 0, 0, 0.03);
  display: flex;
  justify-content: space-between;
}

p {
  display: flex;
  align-items: center;
  flex: 1;
  text-align: justify;
  margin: 10px;
}

img {
  margin: 15px;
  background-color: white;
  width: 80px;
  height: 80px;
}
</style>