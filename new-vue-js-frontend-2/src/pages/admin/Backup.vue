<template>
  <AdminPageWrapper title="Backup">
    <v-simple-table id="manage-dumps-table">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Data (AAAA-MM-DD HH:MM:SS)</th>
            <th></th>
          </tr>
        </thead>
        <tbody v-if="dumps.length">
          <tr v-for="dump in dumps" :key="dump">
            <td>{{ dump }}</td>
            <td>
              <v-icon left @click="handleDownloadDump(dump)"
                >mdi-cloud-download-outline</v-icon
              >
              <v-icon right @click="handleDeleteDump(dump)">mdi-cancel</v-icon>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </AdminPageWrapper>
</template>

<script>
import AdminPageWrapper from "../../components/AdminPageWrapper";

import { getDumps, downloadDump, deleteDump } from "../../api/backup";

export default {
  components: {
    AdminPageWrapper,
  },
  data() {
    return {
      dumps: [],
    };
  },
  mounted() {
    getDumps().then((dumps) => {
      this.dumps = dumps;
    });
  },
  methods: {
    handleDownloadDump(filename){
        downloadDump(filename)
    },
    handleDeleteDump(filename){
        deleteDump(filename).then(() => {
            window.location.reload()
        }).catch((error) => {
            console.log(error)
            alert('Algo deu errado com sua requisição.')
        })
    },
  },
};
</script>

<style scoped>
#manage-dumps-table {
  max-width: 350px;
}
</style>