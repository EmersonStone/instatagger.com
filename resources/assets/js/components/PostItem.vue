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
            <!-- <span v-if="!tag.blacklisted && !tag.confirmRemove" class="-remove" @click="tag.confirmRemove = true">x never again</span> -->
            <!-- <span v-if="!tag.blacklisted && tag.confirmRemove" class="-remove" @click="tag.confirmRemove = false">cancel</span> -->
            <!-- <span v-if="!tag.blacklisted && tag.confirmRemove" class="-remove" @click="removeTag(tag)">remove</span> -->
          </li>
        </ul>
      </div>
      <div v-else class="-tag-image">
        <button v-if="!tagging" class="button" @click="tagImage(post)">Tag Image</button>
        <div v-else class="loading"></div>
      </div>
    </div>
  </div>
</template>

<script>
import {bus} from './bus.js';

export default {
  props: ['post'],

  created() {
    if (this.post.tags) {
      this.tweakTags();
    }
    bus.$on('taggingComplete', () => {
      this.tagging = false;
    });
  },

  data: function() {
    return {
      tweakedTags: [],
      tagging: false
    }
  },

  methods: {
    syncPosts: function() {
      bus.$emit('getUserPosts');
    },

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
      this.tagging = true;
      axios.post('/ajax/users/tag', {'instagram_id': post.id})
      .then(r => {
        this.syncPosts();
      })
    }
  }
}
</script>
