@extends('layouts.manage')
@section('title',' - Create News post')
@section('styles')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
  <styles>

  </styles>
@endsection

@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">Create Google Calendar Event</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewcalendarevent">
        <form action="{{route('calendar.store')}}" method="POST" role="form">
            {{csrf_field()}}
            <legend>
                Create Event
            </legend>
            <div class="form-group">
                <label for="title">
                    Title
                </label>
                <input class="form-control" name="title" placeholder="Title" type="text">
            </div>
            <div class="form-group">
                <label for="description">
                    Description
                </label>
                <input class="form-control" name="description" placeholder="Description" type="text">
            </div>
            <div class="form-group">
                <label for="start_date">
                    Start Date
                </label>
                <input class="form-control" name="start_date" placeholder="Start Date" type="text">
            </div>
            <div class="form-group">
                <label for="end_date">
                    End Date
                </label>
                <input class="form-control" name="end_date" placeholder="End Date" type="text">
            </div>
            <button class="btn btn-primary" type="submit">
                Submit
            </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
