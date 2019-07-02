@extends('layouts.app')
@section('title',' - Contact')
@section('styles')
<style>

</style>
@endsection
@section('content')

<section id="Contact" class="hero is-warning m-b-30">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">{{ __('simplePages.contactSlogen1') }}</h1>
      <h2 class="subtitle has-text-centered">{{ __('simplePages.contactSlogen2') }}</h2>
    </div>
  </div>
</section>

<section id="ContactMap" class="">
	<div class="container">
			<div class="columns is-flex-mobile is-flex-desktop">
			  <div class="column  is-desktop ">


					<div class="gt_form_map is-flex-touch">

						<div class="card is-radiusless is-shadowless">
							<header class="card-header">
								<p class="card-header-title has-text-centered">{{ __('simplePages.contactForm.header') }}</p>
							</header>
							<div class="card-content">
								<div class="content">
								@if(session('success'))
									<div class="notification is-success">{{session('success')}}</div>
								@else

									<form class="form-horizontal" method="POST" action="{{ route('contact') }}">
											{{ csrf_field() }}
											<div class="columns">

												<div class="column">
													<div class="field">
														<label class="label">{{ __('simplePages.contactForm.from') }}</label>
														<div class="control has-icons-left has-icons-right">
															<input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}"  autofocus>
															<span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                              @if ($errors->has('name'))
															<span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
															@endif
														</div>
													</div>
												</div>

												<div class="column">
													<div class="field">
														<label class="label">{{ __('simplePages.contactForm.email') }}</label>
														<div class="control has-icons-left has-icons-right">
															<input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" >
															<span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
															@if ($errors->has('email'))
															<span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
															@endif
														</div>
													</div>
												</div>

												<div class="column">
													<div class="field">
														<label class="label">{{ __('simplePages.contactForm.phone') }}</label>
														<div class="control has-icons-left has-icons-right">
															<input class="input" id="phone" type="number" name="phone" value="{{ old('phone') }}" placeholder="06301234567">
															<span class="icon is-small is-left"><i class="fa fa-phone"></i></span>
														</div>
													</div>
												</div>
											</div>

											<div class="columns">
												<div class="column">
													<div class="field">
														<label class="label">{{ __('simplePages.contactForm.message') }}</label>
														<div class="control">
															<textarea class="textarea {{ $errors->has('message') ? ' is-danger' : '' }}" id="message" type="text" name="message" placeholder="" rows="3" cols="150">{{ old('message') }}</textarea>
														</div>
													</div>
												</div>
											</div>

                      <div class="columns">
												<div class="column {{ $errors->has('g-recaptcha-response') ? ' is-danger' : '' }}">
                          {!! app('captcha')->display(); !!}
                          @if($errors->has('g-recaptcha-response'))
                          <p class="help is-danger">{{ __('forms.errors.g-recaptcha-response') }}</p>
                          @endif
                        </div>
                        <div class="column">
                          <div class="field is-pulled-right" style="margin-top: 1.2rem;">
    												<div class="control">
    													<button type="submit" class="button is-primary">{{ __('simplePages.contactForm.buttonSend') }}</button>
    												</div>
    											</div>
                        </div>
                      </div>

									</form>
								@endif
								</div>
							</div>
						</div>


          </div>


			  </div>
			</div>
	</div>

	<div class="contact_us_map is-hidden-touch">
		{!! Mapper::render() !!}
	</div>

</section>

@endsection
