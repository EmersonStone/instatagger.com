<template>
  <section class="dashboard">
    <site-nav></site-nav>
    <profile-header></profile-header>
    <post-list></post-list>
    <site-footer></site-footer>
  </section>
</template>

<script type="x/templates">
export default {
  components: ['profile-header', 'post-list']
}
</script>
