<template>
  <AdminPageWrapper title="Gerenciar Usuários">
    <v-row>
      <v-spacer></v-spacer>
      <AdminManageUsersDialog />
    </v-row>

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
          <tr v-for="admin in admins" :key="admin.id">
            <td>{{ admin.name }}</td>
            <td>{{ admin.email }}</td>
            <td></td>
            <td>
              <v-checkbox v-model="admin.canManagePosts" disabled />
            </td>

            <td>
              <v-checkbox v-model="admin.canManageUsers" disabled />
            </td>

            <td>
              <v-checkbox v-model="admin.canManageDumps" disabled />
            </td>

            <td class="text-center">
              <AdminManageUsersDialog :inputAdmin="admin" />

              <AdminManagerUsersDeleteDialog :admin="admin" />
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
import AdminManagerUsersDeleteDialog from "../../components/AdminManagerUsersDeleteDialog.vue";

import { getAdmins } from '../../api/admin'
import { mapState } from 'vuex'

export default {
  components: {
    AdminPageWrapper,
    AdminManageUsersDialog,
    AdminManagerUsersDeleteDialog,
  },
  data() {
    return {
      admins: [],
    };
  },
  computed: {
    ...mapState('adminModule', ['session'])
  },
  mounted() {
    console.log(this.session)
    getAdmins().then((admins) => {
      this.admins = admins.filter((a) => a.id != this.session.id);
    });
  },
};
</script>

<style scoped>
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