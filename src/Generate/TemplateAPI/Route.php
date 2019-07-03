<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
# {replace}
Route::group([
    'prefix' => '{replace_sm}',
    'namespace' => '{replace}',
    'as' => '{replace_sm}.',
    'middleware' => ['api'],
], function () {
    Route::post('create', '{replace}Controller@create{replace}')->name('create');
    Route::put('update', '{replace}Controller@update{replace}')->name('update');
    Route::delete('delete', '{replace}Controller@delete{replace}')->name('delete');
    Route::get('list', '{replace}Controller@get{replace}List')->name('list');
});
