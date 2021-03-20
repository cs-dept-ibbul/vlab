<template>
  <section class="hero">
    <div class="container">
      <div class="row hero__body d-flex align-items-center justify-content-between mx-auto">
        <div class="col-12 col-lg-7">
          <h1 class="hero__body__title">Virtual Laboratory (V-Lab)</h1>
          <p class="hero__body__subtitle">
            A virtual environment for Science and Engineering Practicals
          </p>
          <div class="hero__links">
            <a href="/explore" class="btn btn--primary hero__body__cta mr-3">Explore V-lab</a>
            <a href="/practice" class="practice my-2 my-sm-0 d-inline-block">Practice a Practical</a>
          </div>
          <br>
        </div>
        <div class="col-12 col-lg-5">
          <div class="hero__video">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>
        </div>
      </div>
    </div>

  </section>
</template>

<script>
export default {
  name: "Section",
};
</script>

<style lang="scss" scoped>
.hero {
  padding: 30px 0;
  &__body {
    background-color: #f8f8fa;
    padding: 30px 10px;
    border-radius: 16px;
    height: fit-content;
    color: #2F2651;
    position: relative;
    text-align: center;

    @media screen and (min-width: 992px) {
      text-align: left;
      height: 100vh;
      padding: 0 30px;
      max-height: 500px;
    }

    &__title {
      font-weight: 700;
      font-size: 2.8rem;
    }

    &__subtitle {
      font-size: 1.1rem;
      margin: 30px 0;
    }

    &__cta {
      padding: 10px 20px;
      border-radius: 10px;
    }

  }
  &__video {
    background-color: #2F2651;
    width: 25rem;
    max-width: 100%;
    border-radius: 20px;
    height: 20rem;
    margin: 30px auto;

    @media screen and (min-width: 992px) {
      margin: 0 auto;
      height: 28rem;
      transform: translateY(25%);
    }
  }
}

//section
/* .custom-section {
  width: 99%;
  padding: 40px 0px;
  background-color: #efefef;
  border-radius: 16px;

  @media screen and (width: 991.98px) {
    flex-direction: column-reverse;
  }

  .col-lg-8 {
    margin-top: 100px;
    h2 {
      font-weight: 700px;
      font-size: 63px;
      color: #2F2651;
      margin-bottom: 0;
      line-height: 1;
      white-space: nowrap;
    }
    h3 {
      font-weight: 300px;
      font-size: 64px;
      color: #0c105a;
      line-height: 1;
    }
    p {
      color: #0d0d0e;
      font-size: 20px;
      margin-top: 30px;
    }
    a {
      display: inline-block;
      padding: 8px 22px;
      
      border: 1px solid transparent;
      margin-top: 60px;
      text-decoration: none;
      transition: 5s cubic-bezier(0.785, 0.135, 0.15, 0.86);
    }

  }
} */

.practice {
  white-space: nowrap;
  color: #2F2651;
}
  
</style>
