<template>
  <section class="dashboard">
    <site-nav></site-nav>
    <profile-header :user="user"></profile-header>
    <post-list :user="user"></post-list>
    <site-footer></site-footer>
  </section>
</template>

<script type="x/templates">
export default {
  components: ['profile-header', 'post-list'],
  data: function() {
    return {
      user: window.tagnumpi.user
    }
  }
}
</script>
