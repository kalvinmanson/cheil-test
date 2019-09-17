@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card mb-3">
        <div class="card-header">API Login</div>
        <div class="card-body">
          <p>Required for access to /users endoints, aunthenticate with Bearer Token.</p>
          <p>Example:
            <code>
              { "Authorization": "Bearer --api_token--" }
            </code>
          </p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">login:post</span>
            </div>
            <input type="text" class="form-control" value="{{ route('api.auth.login') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">register:post</span>
            </div>
            <input type="text" class="form-control" value="{{ route('api.auth.register') }}">
          </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">API User CRUD</div>
        <div class="card-body">
          <p>
            Use restfull structure with http verbs.<br>
            Replace <code>--user_id--</code> on endpoints.
          </p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">list:get</span>
            </div>
            <input type="text" class="form-control" value="{{ route('users.index') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">store:post</span>
            </div>
            <input type="text" class="form-control" value="{{ route('users.store') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">show:get</span>
            </div>
            <input type="text" class="form-control" value="{{ route('users.show', '--user_id--') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">update:put</span>
            </div>
            <input type="text" class="form-control" value="{{ route('users.update', '--user_id--') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">destroy:delete</span>
            </div>
            <input type="text" class="form-control" value="{{ route('users.destroy', '--user_id--') }}">
          </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">API Hotels CRUD</div>
        <div class="card-body">
          <p>
            Use restfull structure with http verbs.<br>
            Replace <code>--hotel_id--</code> on endpoints.
          </p>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">list:get</span>
            </div>
            <input type="text" class="form-control" value="{{ route('hotels.index') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">store:post</span>
            </div>
            <input type="text" class="form-control" value="{{ route('hotels.store') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">show:get</span>
            </div>
            <input type="text" class="form-control" value="{{ route('hotels.show', '--hotel_id--') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">update:put</span>
            </div>
            <input type="text" class="form-control" value="{{ route('hotels.update', '--hotel_id--') }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">destroy:delete</span>
            </div>
            <input type="text" class="form-control" value="{{ route('hotels.destroy', '--hotel_id--') }}">
          </div>
        </div>
    </div>
</div>
@endsection
