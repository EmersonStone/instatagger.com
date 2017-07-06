<template lang="html">
    <section class="post-list">
      <div v-for="post in posts">
        <post-item :post="post"></post-item>
      </div>
    </section>
</template>

<script>
export default {
  components: ['post-item'],
  // props: ['posts'],

  data: function() {
    return {
      posts: [
        {
          id: 1
        },
        {
          id: 2
        },
        {
          id: 3
        },
        {
          id: 4
        },
      ]
    }
  }
}
</script>
