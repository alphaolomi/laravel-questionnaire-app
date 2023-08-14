<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionnaires = Questionnaire::all();

        return view('questionnaires.index', ['questionnaires' => $questionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreQuestionnaireRequest $request)
    public function store(Request $request)
    {
        // get all data from request
        $data = $request->all();

        // Create questionnaire
        $questionnaire = Questionnaire::create(Arr::only($data, ['title', 'description', 'expires_at']));

        // if has questions then create them
        if (isset($data['questions'])) {
            $questions = collect($data['questions'])->map(function ($question) {
                // check if question has options that are not empty/null
                if (isset($question['options'])) {
                    $question['options'] = array_filter($question['options']);
                }

                // if type is not multiple choice then set options to null
                if ($question['type'] !== 'multiple_choice') {
                    $question['options'] = null;
                }

                return $question;
            });

            // create questions 
            // using createMany() method
            // helps us to create multiple records at once
            $questionnaire->questions()->createMany($questions);
        }


        // redirect to index page
        return redirect()->route('questionnaire.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
