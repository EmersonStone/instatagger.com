<template>
  <div>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="content">
            <h2>Fun Facts</h2>
            <div class="-fact">We don’t store your photos and we don’t share your data, ever.</div>
            <div class="-fact">You can disconnect your account at any time and it’ll immediately wipe you from the database.</div>
            <div class="-fact">This app is from your friends at <a href="emersonstone.com" target="_blank">Emerson Stone</a>. It was built for fun in one day.</div>
            <div class="-fact">Read the <a href="/terms-and-conditions">terms and conditions</a> and <a href="/privacy-policy">privacy policy</a>. It's boilerplate, but the app has to have it.</div>
            <div class="-fact">{{ this.fact }}.</div>
          </div>
        </div>
      </div>
      <div class="bottom">
        <img src="/images/chopper@2x.png" alt="Tagnum P.I.'s chopper">
        <div class="-text">Built in one day by Emerson Stone. No copyright, 2017.</div>
      </div>
    </footer>
  </div>
</template>

<script type="x/templates">
  export default {
    props: ['fact']
  }
</script>
