<template>
  <v-dialog v-model="isDialogOpen" persistent max-width="600px">
    <template v-slot:activator="{ on, attrs }">
      <v-icon left v-bind="attrs" v-on="on">mdi-pencil</v-icon>
    </template>

    <v-card>
      <v-card-title>
        <span class="text-h5">
          {{ isEditing ? "Editar" : "Criar" }} Usuário
        </span>
      </v-card-title>
      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="12">
              <v-text-field
                required
                placeholder="Nome"
                v-model="user.name"
              ></v-text-field>
            </v-col>

            <v-col cols="12">
              <v-text-field
                required
                placeholder="E-mail"
                v-model="user.email"
              ></v-text-field>
            </v-col>

            <v-col cols="12">
              <v-text-field
                required
                placeholder="Senha"
                v-model="user.password"
              ></v-text-field>
            </v-col>

            <v-col cols="12">
              <b>Permissões para gerenciar:</b>

              <v-row>
                <v-col cols="4">
                    <v-checkbox
                    :label="'Posts'"
                    v-model="user.can_manage_posts"
                    ></v-checkbox>
                </v-col>

                <v-col cols="4">
                    <v-checkbox
                    :label="'Usuários'"
                    v-model="user.can_manage_users"
                    ></v-checkbox>
                </v-col>

                <v-col cols="4">
                    <v-checkbox
                    v-model="user.can_manage_dumps"
                    :label="'Dumps'"
                    ></v-checkbox>
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
</template>

<script>
export default {
  data() {
    return {
      user: { ...this.inputUser },
      isDialogOpen: false,
      isEditing: this.inputUser != null,
    };
  },
  props: {
    inputUser: {
      required: false,
    },
  },
  methods: {
    saveUser(){
      console.log(this.user)
      this.isDialogOpen = false
    }
  }
};
</script>

<style scoped>
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
</style>