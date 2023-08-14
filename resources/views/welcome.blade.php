@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
  {{-- center div vertically and horizontally --}}
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">
          Welcome to Questionnaire App</h1>

        <div class="mt-5 text-center">
          <a class="btn btn-primary btn-lg btn-block" href="{{ route('questionnaire.create') }}">Create Questionnaire</a>
          <a class="btn btn-secondary btn-lg btn-block" href="{{ route('questionnaire.index') }}">
            List Questionnaires</a>
        </div>
      </div>
    </div>
  </div>
@endsection
