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
      <h1 class="title has-text-centered">
        Kapcsolat
      </h1>
      <h2 class="subtitle has-text-centered">
        Kérdezz, válaszolunk!
      </h2>
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
								<p class="card-header-title has-text-centered">
									Küldj üzenetet
								</p>
							</header>
							<div class="card-content">
								<div class="content">
								@if(Session::has('message'))
									<div class="notification is-success">{{Session::get('message')}}</div>
								@else

									<form class="form-horizontal" method="POST" action="{{ route('contact') }}">
											{{ csrf_field() }}
											<div class="columns">
												<div class="column">
													<div class="field">
														<label class="label">Név</label>
														<div class="control has-icons-left has-icons-right">
															<input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
															<span class="icon is-small is-left"><i class="fa fa-user"></i></span>
														</div>
													</div>
												</div>
												<div class="column">
													<div class="field">
														<label class="label">E-Mail</label>
														<div class="control has-icons-left has-icons-right">
															<input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" required>
															<span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
															@if ($errors->has('email'))
															<span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
															@endif
														</div>
														@if ($errors->has('email'))
														<p class="help is-danger">{{ $errors->first('email') }}</p>
														@endif
													</div>
												</div>
												<div class="column">
													<div class="field">
														<label class="label">Phone</label>
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
														<label class="label">Message</label>
														<div class="control">
															<textarea class="textarea {{ $errors->has('message') ? ' is-danger' : '' }}" id="message" type="text" name="message" placeholder="" rows="5" cols="150">{{ old('message') }}</textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="field">
												<div class="control">
													<button class="button is-primary">Send message</button>
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
