<template lang="html">
    <section class="post-list">
      <div class="container">
        <div class="row">
          <div class="content">
            <div v-for="post in posts">
              <post-item :post="post"></post-item>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>

<script>
export default {
  components: ['post-item'],
  created() {
    this.getPosts();
  },

  data: function() {
    return {
      posts: []
    }
  },

  methods: {

    getPosts: function() {
      axios.get('/ajax/users/posts')
      .then(r => {
        this.posts = r.data.posts;
      })
    }
  }
}
</script>
