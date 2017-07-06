<template lang="html">
  <div class="-post-item">
    <div class="-image">
      <img src="https://unsplash.it/600/600" alt="">
    </div>
    <div class="-tags">
      <h3>Added Tags</h3>
      <ul class="-tag-list">
        <li v-for="tag in tweakedTags">
          <span class="-name">{{ tag.name }}</span>
          <span class="-remove" @click="confirmRemove(tag)">x never again</span>
          <span class="-remove" @click="">cancel</span>
          <span class="-remove" @click="removeTag">remove</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ['post'],

  created() {
    this.tweakTags();
  }

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
      tag.confirmRemove = true;
    },

    cancelRemove: function(tag) {
      tag.confirmRemove = false;
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
