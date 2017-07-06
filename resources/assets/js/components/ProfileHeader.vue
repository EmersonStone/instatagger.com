<template lang="html">
  <section class="profile-header">
    <div class="container">
      <div class="row">
        <div class="content">
          <div class="row">
            <div class="-avatar">
              <img :src="user.avatar" :alt="user.name">
            </div>
            <div class="-details">
              <div class="-username">
                <a :href="'https://instagram.com/' + user.username" target="_blank" class="-name">@{{ user.username }}</a>
                <button v-if="!confirmDisconnect" class="button -disconnect" @click="confirmDisconnect = true">Disconnect Account</button>
                <div class="-controls" v-if="confirmDisconnect">
                  <p>Are you sure?</p>
                  <button class="button -cancel" @click="confirmDisconnect = false">Cancel</button>
                  <a href="/auth/instagram/disconnect" class="button -cancel" @click="disconnectAccount">Disconnect My Account</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: ['user'],

    data: function() {
      return {
        confirmDisconnect: false
      }
    }
  }
</script>
