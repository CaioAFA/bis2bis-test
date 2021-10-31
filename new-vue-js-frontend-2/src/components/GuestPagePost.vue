<template>
  <v-dialog v-model="isDialogOpen" max-width="800px">
    <template v-slot:activator="{ on, attrs }">
      <v-col id="post-wrapper" cols="11" v-bind="attrs" v-on="on">
        <h1>{{ post.title }} - {{ post.authorName }}</h1>

        <v-col cols="12" id="content-wrapper">
          <p>{{ post.content | truncate(500) }}</p>

          <img class="img-thumb" :src="post.image" :alt="post.title" />
        </v-col>
      </v-col>
    </template>

    <v-card>
      <v-card-title class="title-wrapper">
        <span class="text-h5">{{ post.title }}</span>
      </v-card-title>
      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="12">
              <b>Autor: {{ post.authorName }}</b>
            </v-col>

            <v-col class="justify-content-center" cols="12">
              <img class="dialog-img" :src="post.image" :alt="post.title">
            </v-col>

            <v-col cols="12">
              <pre>{{ post.content }}</pre>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="blue darken-1" text @click="isDialogOpen = false">
          Fechar
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: {
    post: {
      required: true,
    },
  },
  data(){
    return {
      isDialogOpen: false
    }
  }
};
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

#content-wrapper {
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

pre {
  white-space: pre-wrap;
  text-align: justify;
  color: black;
}

.img-thumb {
  margin: 15px;
  background-color: white;
  width: 80px;
  height: 80px;
}

.dialog-img {
  width: 350px;
  height: 350px;
}

.title-wrapper {
  display: flex;
  justify-content: center;
}

.justify-content-center {
  display: flex;
  justify-content: center;
}
</style>