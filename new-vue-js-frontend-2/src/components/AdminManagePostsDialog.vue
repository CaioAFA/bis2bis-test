<template>
  <div id="wrapper">
    <v-dialog v-model="isDialogOpen" persistent max-width="600px">

      <template v-slot:activator="{ on, attrs }">
        
        <v-btn id="create-new-button" v-if="!isEditing" v-bind="attrs" v-on="on">
          Criar Post
        </v-btn>

        <v-icon v-else left v-bind="attrs" v-on="on">mdi-pencil</v-icon>
      </template>

      <v-card>
        <v-card-title>
          <span class="text-h5">
            {{ isEditing ? "Editar" : "Criar" }} Post
          </span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <b>Autor: {{ post.author_name }}</b>
                <br>
                <br>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  required
                  placeholder="Título"
                  v-model="post.title"
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-textarea
                  required
                  filled
                  placeholder="Conteúdo"
                  v-model="post.content"
                ></v-textarea>
              </v-col>

              <v-col cols="12">
                <v-row>
                  <v-col cols="9">
                    <v-text-field
                      required
                      placeholder="Imagem"
                      v-model="post.image"
                    ></v-text-field>
                  </v-col>

                  <v-spacer></v-spacer>

                  <v-col cols="2">
                    <img class="img-preview" :src="[post.image ? post.image : 'https://thumbs.dreamstime.com/b/no-image-available-icon-vector-illustration-flat-design-140633878.jpg']" :alt="post.name">
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="isDialogOpen = false">
            Fechar
          </v-btn>

          <v-btn color="blue darken-1" text @click="saveUser">
            Salvar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: this.inputPost ?? {
        author_name: '',
        title: '',
        content: '',
        image: '',
        name: ''
      },
      isDialogOpen: false,
      isEditing: this.inputPost != null,
    };
  },
  props: {
    inputPost: {
      required: false,
    },
  },
  methods: {
    saveUser(){
      this.isDialogOpen = false
    }
  }
};
</script>

<style scoped>
#create-new-button {
  margin: 25px 15px 15px 0;
  background-color: rgb(0 70 58);
  color: white !important;
  font-weight: bolder;
}

#wrapper{
  display: inline-block;
}

.col-12 {
  padding-top: 0;
  padding-bottom: 0;
}

.col-12 .v-input {
  padding-top: 0;
  padding-bottom: 0;
}

.v-card__title {
  padding: 16px 36px !important;
}

.img-preview {
  width: 50px;
  height: 50px;
}
</style>