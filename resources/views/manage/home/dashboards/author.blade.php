@extends('layouts.manage')

@section('content')
      <div class="columns">
          <div class="column is-one-quarter">
              <div class="card">
                <header class="card-header">
                  <p class="card-header-title">Your latest News post</p>
                  <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                      <a class="navbar-link " href="/documentation/overview/start/"></a>
                      <div class="navbar-dropdown ">
                        <a class="navbar-item " href="/documentation/overview/start/">Edit</a>
                        <hr class="navbar-divider">
                        <a class="navbar-item " href="/documentation/overview/start/">View</a>
                      </div>
                    </div>
                  </div>
                </header>
                <div class="card-content">
                  <p class="subtitle">“There are two hard things in computer science: cache invalidation, naming things, and off-by-one errors.”</p>
                  <p class="subtitle">Jeff Atwood</p>
                </div>
                <footer class="card-footer">
                  <p class="card-footer-item"><span>View on <a href="https://twitter.com/codinghorror/status/506010907021828096">Twitter</a></span></p>
                  <p class="card-footer-item"><span>Share on <a href="#">Facebook</a></span></p>
                </footer>
              </div>

          </div>
          <div class="column is-one-quarter">
            <p class="notification is-info">
              <code class="html">is-one-quarter</code>
            </p>
          </div>
          <div class="column">
            <p class="notification is-success">Auto</p>
          </div>

      </div>
      @endsection
      @section('scripts')

      @endsection
