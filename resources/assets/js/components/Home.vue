<template>
  <div>
    <site-nav></site-nav>
    <main>
      <section class="image-text-block">
        <div class="container">
          <div class="row">
            <div class="-image">
              <img src="/images/iphone@2x.png" alt="">
            </div>
            <div class="-right-col">
              <div class="-logo-image">
                <img src="/images/tagnum-car@2x.png" alt="Dope Tagnum P.I. Car">
              </div>
              <div class="-text">
                <h2>Get more traction on your Instagram photos with none of the work</h2>
                <p>Tagnum P.I. sleuths out relevant hashtags based on the content in your photos and adds them automatically to save you time!</p>
                <div><a href="/auth/instagram" class="button -white">Connect With Instagram</a></div>
                <div class="-detail">It’s totally free <span class="-underline">and</span> we don’t sell your information. Cool.</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="how-it-works">
        <div class="container">
          <div class="row">
            <div class="content">
              <h2>How it works</h2>
              <div class="-item">
                <div class="-title -purple">1. You connect with your Instagram account</div>
                <div class="-text">Tagnum P.I. needs access to your account to see when new photos are posted and to add a comment with the new hashtags. </div>
              </div>

              <div class="-item">
                <div class="-title -yellow">2. We use machine learning to analyze the photo</div>
                <div class="-text">It’s like having your own private investigator to discover what’s happening in your photo. We analyze, but don’t store your photo. </div>
              </div>

              <div class="-item">
                <div class="-title -green">3. Tagnum P.I. posts a comment with #hashtags</div>
                <div class="-text">The system will post the first comment on your photo with hashtags that are relevant to you and your photo. It’s kind of like magic. </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="testimonial">
        <div class="container">
          <div class="row">
            <div class="content">
              <img src="/images/sunnies@2x.png" alt="Tagnum P.I.'s classic sunnies">
              <div class="-quote">“Holy cow, this is the best app on the entire internet!”</div>
              <div class="-author">-Brett</div>
            </div>
          </div>
        </div>
      </section>

    </main>
    <site-footer></site-footer>
  </div>
</template>

<script type="x/templates">
  import catFacts from 'cat-facts';

  export default {

    data: function() {
      return {
        fact: catFacts.random()
      }
    }
  }
</script>
