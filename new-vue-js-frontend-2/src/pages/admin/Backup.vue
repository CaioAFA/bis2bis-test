<template>
  <AdminPageWrapper title="Backup">
    <v-row>
        <v-spacer></v-spacer>
        <v-btn id="create-dump-button" @click="handleCreateDump">
            Criar Dump
        </v-btn>
    </v-row>
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

import { getDumps, downloadDump, deleteDump, createDump } from "../../api/backup";

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
      this.dumps = dumps.reverse();
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
    handleCreateDump(){
        createDump().then(() => {
            window.location.reload()
        }).catch((error) => {
            console.log(error)
            alert('Algo deu errado com sua requisição.')
        })
    }
  },
};
</script>

<style scoped>
#create-dump-button{
  margin: 25px 15px 15px 0;
  background-color: rgb(0 70 58);
  color: white !important;
  font-weight: bolder;
}

#manage-dumps-table {
  max-width: 350px;
}
</style>