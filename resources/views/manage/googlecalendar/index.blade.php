@extends('layouts.manage')
@section('title',' - List calendar events')
@section('styles')
  <styles>

  </styles>
@endsection

@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">List of Google Calendar Events</div>
        </div>
      </div>
      <div class="card-content createnewcalendarevent">
        <div class="content">
          @if (count($events) == 0)
            <h1 class="subtitle">No upcoming events</h1>
          @else
            <h1  class="subtitle">Upcoming events</h1>
            @foreach ($events as $event)
            <?php
            $start = $event->start->dateTime;
            $end = $event->end->dateTime;
            ?>
            @if (empty($start))
              <?php
              $start = $event->start->date;
              ?>
            @endif
            <div class="notification">
              <p class="subtitle">{{ $event->getSummary() }}</p>
              <p class="subtitle">{{ $start }} - {{ $end }}</p>
            </div>


            @endforeach
          @endif
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
