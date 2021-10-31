<template>
  <div id="guest-page-wrapper">
    <GuestPageHeader />

    <v-col class="post-wrapper" cols="12" v-for="post in posts" :key="post.id">
      <GuestPagePost :post="post" />
    </v-col>
  </div>
</template>

<script>
import GuestPageHeader from '../../components/GuestPageHeader.vue'
import GuestPagePost from '../../components/GuestPagePost.vue'
import { getPosts } from '../../api/posts'

export default {
  components: {
    GuestPageHeader,
    GuestPagePost
  },
  data(){
    return {
      posts: []
    }
  },
  mounted(){
    getPosts().then((posts) => {
      this.posts = posts
    })
  }
}
</script>

<style scoped>
#guest-page-wrapper{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  background-color: rgba(0, 0, 0, 0.08);
}

.post-wrapper{
  display: flex;
  justify-content: center;
}
</style>
