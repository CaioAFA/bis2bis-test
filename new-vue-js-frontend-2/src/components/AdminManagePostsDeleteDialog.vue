<template>
  <v-dialog v-model="dialog" max-width="490">
    <template v-slot:activator="{ on, attrs }">
      <v-icon right v-bind="attrs" v-on="on">mdi-cancel</v-icon>
    </template>
    <v-card>
      <v-card-title class="text-h5"> Deletar {{ post.title }}? </v-card-title>
      <v-card-text
        >Essa ação não poderá ser revertida. Deseja continuar?</v-card-text
      >
      <v-card-actions>
        <v-spacer></v-spacer>

        <v-btn color="green darken-1" text @click="dialog = false">
          Cancelar
        </v-btn>
        <v-btn color="red darken-1" text @click="deleteHandler">
          Deletar
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { deletePost } from '../api/posts'

export default {
  data() {
    return {
      dialog: false,
    };
  },
  props: {
    post: {
      required: true,
    },
  },
  methods: {
    deleteHandler(){
      deletePost(this.post.id).then(() => {
        window.location.reload()
      }).catch((error) => {
        console.log(error)
        alert('Houve um erro! Favor tentar novamente.')
      })
    }
  }
};
</script>

<style scoped>
.v-dialog > .v-card > .v-card__text {
  padding: 0px 24px 0px;
}
</style>