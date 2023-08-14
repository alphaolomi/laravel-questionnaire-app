<?php

// it can list all questionnaires

use function Pest\Laravel\get;

it('can list all questionnaires', function () {

    get(route('questionnaire.index'))
        ->assertOk()
        ->assertSee('Questionnaires');
   
});

// it can show create  questionnaire form
it('can show create  questionnaire form', function () {

    get(route('questionnaire.create'))
        ->assertOk()
        ->assertSee('Create Questionnaire');
   
});