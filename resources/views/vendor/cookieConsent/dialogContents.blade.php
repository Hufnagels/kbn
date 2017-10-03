<style>
article.js-cookie-consent.cookie-consent {
    position: fixed;
    bottom: 1.6rem;
    right: 2rem;
    z-index: 11;
    width: 20rem;
}</style>
<article class="message is-danger js-cookie-consent cookie-consent has-text-centered m-b-0">
  <div class="message-header cookie-consent__message has-text-centered">
    <p class="has-text-centered" style="width: 100%;"><strong>{!! trans('cookieConsent::texts.message') !!}</strong></p>
  </div>
  <div class="message-body ">

    <button class="button is-danger js-cookie-consent-agree cookie-consent__agree">  {{ trans('cookieConsent::texts.agree') }} </button>
  </div>
</article>
