@extends('layouts.app')

@section('title', 'Questionnaires')

@section('content')
  <div class="container mt-5">
  
  {{-- table list of questionnaires --}}

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Questionnaires</div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Questionnaire Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($questionnaires as $questionnaire)
                <tr>
                  <th scope="row">{{ $questionnaire->id }}</th>
                  <td>{{ $questionnaire->title }}</td>
                  <td>{{ $questionnaire->created_at }}</td>
                  <td>
                    <a href="{{ route('questionnaire.show', $questionnaire->id) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('questionnaire.edit', $questionnaire->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('questionnaire.destroy', $questionnaire->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="{{ route('questionnaire.create') }}" class="btn btn-primary">Create Questionnaire</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection