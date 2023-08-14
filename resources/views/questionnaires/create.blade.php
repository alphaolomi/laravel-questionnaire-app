<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Questionnaire Form')

@section('content')
  <div class="container mt-5">
    <h1 class="mb-5">Create Questionnaire</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form id="questionnaireForm" method="POST" action="{{ route('questionnaire.store') }}">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Questionnaire Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
        @error('title')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
      </div>

      <hr>

      <div id="questionsContainer"> </div>

      <button type="button" id="addQuestion" class="btn btn-primary">Add Question</button>
      <button type="submit" class="btn btn-success">Submit Questionnaire</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      let questionIndex = 0;

      // Add question button click handler
      $('#addQuestion').click(function() {
        questionIndex++;

        const questionHTML = `
            <div class="border p-3 rounded mb-3" id="question_${questionIndex}">
            <div class="d-flex flex-row justify-content-between align-items-center mb-3 gap-3">
                <div class="mb-3 flex-grow-1">
                    <label for="question_${questionIndex}" class="form-label">Question ${questionIndex}</label>
                    <input type="text" class="form-control" id="question_${questionIndex}" name="questions[${questionIndex}][text]" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm"
                 onclick="$('#question_${questionIndex}').remove();">X</button>
            </div>
                <div class="mb-3">
                    <label for="question_type_${questionIndex}" class="form-label">Question Type</label>
                    <select class="form-control" id="question_type_${questionIndex}" name="questions[${questionIndex}][type]" required>
                        <option value="short_answer">Short Answer</option>
                        <option value="long_answer">Long Answer</option>
                        <option value="multiple_choice">Multiple Choice</option>
                        <option value="checkboxes">Checkboxes</option>
                        <option value="dropdown">Dropdown</option>
                        <option value="file_upload">File Upload</option>
                        <option value="date">Date</option>
                        <option value="time">Time</option>
                    </select>
                </div>
                <div id="options_${questionIndex}" class="mb-3" style="display: none;">
                    <label class="form-label">Options</label>            
                    <button type="button" id="addOption_${questionIndex}" class="btn btn-secondary btn-sm">Add Option</button>
                    <input type="text" class="form-control mb-2" name="questions[${questionIndex}][options][]" placeholder="Option 1">                
                </div>
            </div>
            `;

        $('#questionsContainer').append(questionHTML);
      });

      // Question type change handler
      $(document).on('change', '[id^="question_type_"]', function() {
        const questionIndex = this.id.split('_')[2];
        const selectedType = $(this).val();
        const optionsDiv = $(`#options_${questionIndex}`);

        if (selectedType === 'multiple_choice') {
          optionsDiv.show();
        } else {
          optionsDiv.hide();
        }
      });

      // Add option button click handler
      $(document).on('click', '[id^="addOption_"]', function() {
        const questionIndex = this.id.split('_')[1];
        const optionsDiv = $(`#options_${questionIndex}`);

        const optionHTML = `
            <input type="text" class="form-control mb-2" name="questions[${questionIndex}][options][]" placeholder="Option 1">                
        `;

        optionsDiv.append(optionHTML);
      });

    });
  </script>
@endsection
