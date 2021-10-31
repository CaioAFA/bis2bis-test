<template>
  <AdminPageWrapper title="Gerenciar Posts">
    <v-row>
      <v-spacer></v-spacer>
      <AdminManagePostsDialog />
    </v-row>

    <v-simple-table id="manage-posts-table">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Autor</th>
            <th class="text-left">Título</th>
            <th class="text-left">Conteúdo</th>
            <th class="text-center">Imagem</th>
            <th class="text-left">Criado em</th>
            <th class="text-left">Editado Em</th>
            <th></th>
          </tr>
        </thead>
        <tbody v-if="posts.length">
          <tr v-for="post in posts" :key="post.id">
            <td>{{ post.authorName }}</td>
            <td>{{ post.title }}</td>
            <td>{{ post.content | truncate(50) }}</td>
            <td class="img-preview-wrapper">
              <img class="img-preview" :src="post.image" :alt="post.title">
            </td>
            <td>{{ post.createdAt }}</td>
            <td>{{ post.editedAt }}</td>

            <td style="white-space: nowrap" class="text-center">
              <AdminManagePostsDialog :inputPost="post" />

              <AdminManagePostsDeleteDialog :post="post" />
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </AdminPageWrapper>
</template>

<script>
import AdminPageWrapper from "../../components/AdminPageWrapper";
import AdminManagePostsDialog from "../../components/AdminManagePostsDialog.vue";
import AdminManagePostsDeleteDialog from "../../components/AdminManagePostsDeleteDialog.vue";

import { getPosts } from '../../api/posts'

export default {
  components: {
    AdminPageWrapper,
    AdminManagePostsDialog,
    AdminManagePostsDeleteDialog,
  },
  data() {
    return {
      posts: [],
    };
  },
  mounted(){
    getPosts().then(posts => {
      this.posts = posts
    })
  }
};
</script>

<style scoped>
.img-preview-wrapper{
  display: flex;
  justify-content: center;
  height: 100px!important;
  align-items: center;
}

.img-preview {
  width: 80px;
  height: 80px;
  margin: 12px;
}
</style>
