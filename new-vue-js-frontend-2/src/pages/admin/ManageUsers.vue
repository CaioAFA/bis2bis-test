<template>
  <AdminPageWrapper title="Gerenciar Usuários">
    Usuários

    <v-simple-table id="manage-users-table">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Nome</th>
            <th class="text-left">E-mail</th>
            <th class="text-right">Permissões</th>
            <th class="text-center">Posts</th>
            <th class="text-center">Usuários</th>
            <th class="text-center">Dumps</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.name">
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td></td>
            <td>
              <v-checkbox
                v-model="user.can_manage_posts"
                disabled
                class="abc"
              />
            </td>

            <td>
              <v-checkbox
                v-model="user.can_manage_users"
                disabled
                class="abc"
              />
            </td>

            <td>
              <v-checkbox
                v-model="user.can_manage_dumps"
                disabled
                class="abc"
              />
            </td>

            <td class="text-center">
              <v-icon left @click="console.log('editRegister')">mdi-pencil</v-icon>
              <v-icon right @click="console.log('deleteRegister')">mdi-cancel</v-icon>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </AdminPageWrapper>
</template>

<script>
import AdminPageWrapper from "../../components/AdminPageWrapper";

export default {
  components: {
    AdminPageWrapper,
  },
  data() {
    return {
      users: [
        {
          email: "caio.a.1998@gmail.com",
          name: "Caio Arrabal",
          can_manage_posts: true,
          can_manage_users: false,
          can_manage_dumps: true,
        },
      ],
    };
  },
};
</script>

<style scoped>
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
    color: red!important;;
}
</style>

<style>
#manage-users-table
  .v-data-table__wrapper
  table
  tbody
  tr
  .v-input
  .v-input__control
  .v-input__slot {
  justify-content: center;
}
</style>