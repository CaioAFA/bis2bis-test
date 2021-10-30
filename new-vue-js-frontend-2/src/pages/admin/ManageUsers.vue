<template>
  <AdminPageWrapper title="Gerenciar Usuários">
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
              />
            </td>

            <td>
              <v-checkbox
                v-model="user.can_manage_users"
                disabled
              />
            </td>

            <td>
              <v-checkbox
                v-model="user.can_manage_dumps"
                disabled
              />
            </td>

            <td class="text-center">
              <AdminManageUsersDialog
                :inputUser="user"
              />

              <AdminManagerUsersDeleteDialog
                :user="user"
              />
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>

  </AdminPageWrapper>
</template>

<script>
import AdminPageWrapper from "../../components/AdminPageWrapper";
import AdminManageUsersDialog from "../../components/AdminManageUsersDialog.vue";
import AdminManagerUsersDeleteDialog from '../../components/AdminManagerUsersDeleteDialog.vue'

export default {
    components: {
        AdminPageWrapper,
        AdminManageUsersDialog,
        AdminManagerUsersDeleteDialog
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
                {
                    email: "joao.a.1998@gmail.com",
                    name: "João Arrabal",
                    can_manage_posts: false,
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
  color: red !important;
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