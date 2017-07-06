<template lang="html">
  <div class="row">
    <div class="-post-item">
      <div class="-image">
        <img :src="post.image" alt="">
      </div>
      <div v-if="post && !!post.tags.length" class="-tags">
        <h3>Added Tags</h3>
        <ul class="-tag-list">
          <li v-for="tag in tweakedTags">
            <span class="-name">{{ tag.name }}</span>
            <span v-if="!tag.blacklisted && !tag.confirmRemove" class="-remove" @click="tag.confirmRemove = true">x never again</span>
            <span v-if="!tag.blacklisted && tag.confirmRemove" class="-remove" @click="tag.confirmRemove = false">cancel</span>
            <span v-if="!tag.blacklisted && tag.confirmRemove" class="-remove" @click="removeTag(tag)">remove</span>
          </li>
        </ul>
      </div>
      <div v-else class="-tag-image">
        <button class="button" @click="tagImage(post)">Tag Image</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['post'],

  created() {
    if (this.post.tags) {
      this.tweakTags();
    }
  },

  data: function() {
    return {
      tweakedTags: []
    }
  },

  methods: {
    tweakTags: function() {
      let tags = [];
      this.post.tags.map(tag => {
        tags.push({
          name: tag.tag,
          blacklisted: tag.blacklisted,
          confirmRemove: false
        });
      });
      this.tweakedTags = tags;
    },

    confirmRemove: function(tag, i) {
      this.$set(this.tweakedTags, 'confirmRemove', true);
    },

    cancelRemove: function(tag) {
      this.$set(this.tweakedTags, 'confirmRemove', false);
    },

    removeTag: function(tag) {
      axios.patch('blacklist', {})
      .then(r => {
        console.log(r);
      })
      .catch(e => {
        console.log(e);
      })
    },

    tagImage: function(post) {
      axios.post('/ajax/users/tag', {'instagram_id': post.id})
      .then(r => {
        console.log(r);
      })
    }
  }
}
</script>
