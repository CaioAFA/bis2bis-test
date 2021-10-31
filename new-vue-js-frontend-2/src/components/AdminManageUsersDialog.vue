<template>
  <v-dialog v-model="isDialogOpen" persistent max-width="600px">
    <template v-slot:activator="{ on, attrs }">
      <v-btn id="create-new-button" v-if="!isEditing" v-bind="attrs" v-on="on">
        Criar Usuário
      </v-btn>

      <v-icon v-else left v-bind="attrs" v-on="on">mdi-pencil</v-icon>
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
                v-model="admin.name"
              ></v-text-field>
            </v-col>

            <v-col cols="12">
              <v-text-field
                required
                placeholder="E-mail"
                v-model="admin.email"
              ></v-text-field>
            </v-col>

            <v-col cols="12">
              <v-text-field
                required
                placeholder="Senha"
                type="password"
                v-model="admin.password"
              ></v-text-field>
            </v-col>

            <v-col cols="12">
              <b>Permissões para gerenciar (necessário ao menos uma):</b>

              <v-row>
                <v-col cols="4">
                    <v-checkbox
                    :label="'Posts'"
                    v-model="admin.canManagePosts"
                    ></v-checkbox>
                </v-col>

                <v-col cols="4">
                    <v-checkbox
                    :label="'Usuários'"
                    v-model="admin.canManageUsers"
                    ></v-checkbox>
                </v-col>

                <v-col cols="4">
                    <v-checkbox
                    v-model="admin.canManageDumps"
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

        <v-btn
          color="blue darken-1"
          text
          @click="saveAdmin"
          :disabled="!(isNameValid && isEmailValid && isPermissionsValid && isPasswordValid)"
        >
          Salvar
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { createAdmin, editAdmin } from '../api/admin';
export default {
  data() {
    return {
      admin: this.inputAdmin ? { ...this.inputAdmin } : {
        name: '',
        email: '',
        password: '',
        canManagePosts: '',
        canManageUsers: '',
        canManageDumps: ''
      },
      isDialogOpen: false,
      isEditing: this.inputAdmin != null,
    };
  },
  props: {
    inputAdmin: {
      required: false,
    },
  },
  computed: {
    isNameValid(){
      return this.admin.name.length ? true : false
    },
    isEmailValid(){
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(this.admin.email).toLowerCase());
    },
    isPermissionsValid(){
      return this.admin.canManagePosts || this.admin.canManageUsers || this.admin.canManageDumps
    },
    isPasswordValid(){
      if(this.isEditing)
        return true

      return this.admin.password.length ? true : false
    }
  },
  methods: {
    saveAdmin(){
      if(!this.isEditing){
        createAdmin(this.admin.name, this.admin.email, this.admin.password, this.admin.canManagePosts, this.admin.canManageUsers, this.admin.canManageDumps).then(() => {
          window.location.reload()
        }).catch((error) => {
          console.log(error)
          alert('Algo deu errado com sua requisição.')
        })
      }
      else{
        editAdmin(this.admin.id, this.admin.name, this.admin.email, this.admin.password, this.admin.canManagePosts, this.admin.canManageUsers, this.admin.canManageDumps).then(() => {
          window.location.reload()
        }).catch((error) => {
          console.log(error)
          alert('Algo deu errado com sua requisição.')
        })
      }
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

#create-new-button {
  margin: 25px 15px 15px 0;
  background-color: rgb(0 70 58);
  color: white !important;
  font-weight: bolder;
}
</style>