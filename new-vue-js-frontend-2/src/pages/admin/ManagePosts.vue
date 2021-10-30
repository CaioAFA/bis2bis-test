<template>
  <AdminPageWrapper title="Gerenciar Posts">
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
        <tbody>
          <tr v-for="post in posts" :key="post.name">
            <td>{{ post.author_name }}</td>
            <td>{{ post.title }}</td>
            <td>{{ post.content }}</td>
            <td>
              <img class="img-preview" :src="post.image" :alt="post.title">
            </td>
            <td>{{ post.created_at }}</td>
            <td>{{ post.edited_at }}</td>

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

export default {
  components: {
    AdminPageWrapper,
    AdminManagePostsDialog,
    AdminManagePostsDeleteDialog,
  },
  data() {
    return {
      posts: [
        {
          'author_name': 'Caio Arrabal',
          'title': 'Vue JS e React JS - Duelo de Titãs',
          'content': 'Atualmente, os dois Frameworks são muito utilizados para criação de aplicações em larga escala de forma mais simples, através da utilização de componentes.',
          'image': 'https://www.spaceo.ca/wp-content/uploads/2021/02/vue-vs-react.jpg',
          'created_at': '31/12/2020',
          'edited_at': '02/02/2021'
        },
        {
          'author_name': 'João Arrabal',
          'title': '"Panetone ou Chocotone, eis a questão"',
          'content': 'Quem resiste à essa deliciosa tentação do clima natalino? Acho que ninguém (pelo menos, ninguém com fome). Porém, a dúvida é cruel: sabor "frutinha" ou sabor chocolate?',
          'image': 'https://t1.uc.ltmcdn.com/pt/images/4/2/6/como_fazer_panetone_caseiro_20624_600_square.jpg',
          'created_at': '01/12/2019',
          'edited_at': '04/12/2020'
        },
      ],
    };
  },
};
</script>

<style scoped>
.img-preview {
  width: 80px;
  height: 80px;
  margin: 12px;
}
</style>

<style>
</style>