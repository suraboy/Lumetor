<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */

# {replace} view route group.
Route::group([
    'namespace' => '{replace}',
    'prefix' => '{replace_url}',
    'as' => '{replace_snc}.',
    'middleware' => [
        'web',
    ],
], function ($router) {
    # get view with blade showing data.
    $router->get('/create', '{replace}Controller@get{replace}CreateView');
    $router->get('/list', '{replace}Controller@get{replace}ListView');
    $router->get('/detail', '{replace}Controller@get{replace}DetailView');
    $router->get('/edit', '{replace}Controller@get{replace}EditView');

    # processing data with api.
    $router->post('/create', '{replace}Controller@post{replace}Create');
    $router->post('/update', '{replace}Controller@post{replace}Update');
    $router->post('/delete', '{replace}Controller@post{replace}Delete');

    # processing data by ajax with api.
    $router->post('/ajax/create', '{replace}Controller@post{replace}CreateAjax');
    $router->post('/ajax/update', '{replace}Controller@post{replace}UpdateAjax');
    $router->post('/ajax/delete', '{replace}Controller@post{replace}DeleteAjax');
});
