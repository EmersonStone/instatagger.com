<template lang="html">
  <div class="row">
    <div class="-post-item">
      <div class="-image">
        <img src="https://unsplash.it/600/600" alt="">
      </div>
      <div class="-tags">
        <h3>Added Tags</h3>
        <ul class="-tag-list">
          <li v-for="tag in tweakedTags">
            <span class="-name">{{ tag.name }}</span>
            <span v-if="!tag.confirmRemove" class="-remove" @click="confirmRemove(tag)">x never again</span>
            <span v-if="tag.confirmRemove" class="-remove" @click="cancelRemove(tag)">cancel</span>
            <span v-if="tag.confirmRemove" class="-remove" @click="removeTag(tag)">remove</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['post'],

  created() {
    this.tweakTags();
  },

  data: function() {
    return {
      tags: [
        {
          id: 1,
          name: '#yolo'
        },
        {
          id: 2,
          name: '#magnumLOL'
        },
        {
          id: 3,
          name: '#anotherone'
        },
        {
          id: 4,
          name: '#lasttag'
        }
      ],
      tweakedTags: []
    }
  },

  methods: {
    tweakTags: function() {
      let tags = [];
      this.tags.map(tag => {
        tags.push({
          id: tag.id,
          name: tag.name,
          confirmRemove: false
        });
      });
      this.tweakedTags = tags;
    },

    confirmRemove: function(tag) {
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
    }
  }
}
</script>
