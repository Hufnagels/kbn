
<div class="hero-body">
  <div class="container">
    <h1 class="title has-text-centered has-text-white-bis  zoomIn" data-wow-duration="3s" data-wow-delay=".5s" >Jelentkezés a nyílt napra!</h1>
    <h2 class="subtitle has-text-centered has-text-white-bis  zoomIn" data-wow-duration="3s" data-wow-delay=".5s">Kurzusaink február 12-től indulnak</h2>
  </div>
</div>

<div class="columns ">
  <div class="column ">

    <div class="tile is-ancestor">
      <div class="tile is-vertical">
        <div class="tile">
          <div class="tile is-parent is-7 is-hidden-mobile">
            <article class="tile is-child  ">
              <figure class="image is-4by3">
                <img src="{{ asset('/images/openday/muskatli.jpg') }}">
              </figure>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child notification ">
              @if(session('success'))
                <div class="notification is-success" style="font-weight: 800;font-size: 2.1rem;">{{session('success')}}</div>
              @else
              <form class="form-horizontal" method="POST" action="{{ route('postOpenCourse') }}">
                  {{ csrf_field() }}
                  <h2 class="subtitle has-text-centered has-text-danger">Minden mezőt tölts ki!</h2>
                  <div class="field">
                    <label class="label">Név <sup class="has-text-danger">*</sup> </label>
                    <div class="control">
                      <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="text" placeholder="Név">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Életkor <sup class="has-text-danger">*</sup> </label>
                    <div class="control  {{ $errors->has('age') ? 'is-danger' : ''}}">
                      <div class="select">
                        <select name="age">
                          <option>Kérem válasszon</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Nyílt napjaink <sup class="has-text-danger">*</sup> </label>
                    <div class="control {{ $errors->has('selectedDateTime') ? 'is-danger' : ''}}">
                      <div class="select">
                        <select name="selectedDateTime">
                          <option>Kérem válasszon</option>
                          <option>2018.01.19 Péntek 16.30-17.30</option>
                          <option>2018.01.20 Szombat 10.00-11.00</option>
                          <option>2018.01.26 Péntek 16.30-17.30</option>
                          <option>2018.01.27 Szombat 10.00-11.00</option>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Elérhetőség (emil vagy telefon) <sup class="has-text-danger">*</sup> </label>
                    <div class="control">
                      <input class="input {{ $errors->has('contact') ? ' is-danger' : '' }}" name="contact" type="text" placeholder="Elérhetőség (emil vagy telefon)">
                    </div>
                  </div>
                  <div class="field">
                    <div class="{{ $errors->has('g-recaptcha-response') ? ' is-danger' : '' }}">
                      {!! app('captcha')->display(); !!}
                      @if($errors->has('g-recaptcha-response'))
                      <p class="help is-danger">{{ __('forms.errors.g-recaptcha-response') }}</p>
                      @endif
                    </div>
                    <div class="control m-t-20">
                      <button type="submit" class="button is-primary">{{ __('simplePages.contactForm.buttonSend') }}</button>
                    </div>
                  </div>

              </form>
              @endif
            </article>
          </div>
        </div>
      </div>
    </div>




  </div>
</div>

<style>

</style>
