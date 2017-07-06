<template lang="html">
  <div class="-post-item">
    <div class="-image">
      <img src="https://unsplash.it/600/600" alt="">
    </div>
    <div class="-tags">
      <h3>Added Tags</h3>
      <ul class="-tag-list">
        <li v-for="tag in tags">
          <span class="-name">{{ tag.name }}</span>
          <span class="-remove" @click="confirmRemove(tag)">x never again</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ['post'],

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
      ]
    }
  },

  methods: {
    confirmRemove: function(tag) {
      console.log(tag);
    },

    remnoveTag: function(tag) {

    }
  }
}
</script>
