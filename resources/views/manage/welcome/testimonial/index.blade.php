@extends('layouts.manage')
@section('title',' - Manage Testimonials')
@section('content')

  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column"><div class="title">Manage Testimonials</div></div>
          @if (Auth::user()->hasRole(['admin','editor','author']))
          <div class="column">
            <a href="{{ route('testimonial.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right">
              <i class="fa fa-plus m-r-10"></i> Create testimonial
            </a>
          </div>
          @endif
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $testimonialCount}} Testimonial {{str_plural('Item',$testimonialCount)}}</p>
          <div class="tabs is-small is-right">
            <ul>
              <li {{ (app('request')->input('status') == 'own' ? 'class=is-active' : '') }}><a href="?status=own">{{ __('forms.own') }}</a></li>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">{{ __('forms.all') }}</a></li>
              <li {{ (app('request')->input('status') == 'published' ? 'class=is-active' : '') }}><a href="?status=published">{{ __('forms.published') }}</a></li>
              <li {{ (app('request')->input('status') == 'scheduled' ? 'class=is-active' : '') }}><a href="?status=scheduled">{{ __('forms.scheduled') }}</a></li>
              <li {{ (app('request')->input('status') == 'draft' ? 'class=is-active' : '') }}><a href="?status=draft">{{ __('forms.draft') }}</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">{{ __('forms.trash') }}</a></li>
            </ul>
          </div>
          @include('manage.welcome.testimonial.message')
          @if ( ! $testimonialCount)
          <div class="notification is-warning"><strong>Currently no testimonial found</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.welcome.testimonial.table-trashed')
            @else
              @include('manage.welcome.testimonial.table-all')
            @endif
          {{$testimonials->appends(Request::query())->render() }}
          @endif
        </div>
      </div>

    </div>
  </div>

@endsection
