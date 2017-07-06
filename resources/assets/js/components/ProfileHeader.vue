<template lang="html">
  <section class="profile-header">
    <div class="-avater">
      <!-- <img :src="user.avatar" :alt="user.name"> -->
      <img src="https://scontent-sjc2-1.cdninstagram.com/t51.2885-19/11373545_923537014355449_287208156_a.jpg" alt="Emerson Stone">
    </div>
    <div class="-details">
      <h2 class="-username">
        <span>@emersonstone</span>
        <span class="-meta">245 followers</span>
      </h2>
      <button v-if="!confirmDisconnect" class="button -disconnect" @click="disconnectConfirm">Disconnect Account</button>
      <div class="-controls" v-if="confirmDisconnect">
        <p>Are you sure?</p>
        <button class="button -cancel" @click="disconnectCancel">Cancel</button>
        <button class="button -cancel" @click="disconnectAccount">Disconnect My Account</button>
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
    },

    methods: {
      disconnectConfirm: function() {
        this.confirmDisconnect = true;
      },

      disconnectCancel: function() {
        this.confirmDisconnect = false;
      },

      disconnectAccount: function() {
        aixos.post('', {})
          .then(response => {
            console.log(response);
          })
          .catch(error => {
            console.log(error);
          });
      }
    }

  }
</script>
