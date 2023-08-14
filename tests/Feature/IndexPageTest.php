<?php

use function Pest\Laravel\get;

it('can show index page', function () {
    get('/')->assertOk()->assertSee('Questionnaire');
});
