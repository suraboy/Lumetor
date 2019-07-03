<?php
Route::group(['prefix' => '{replace_sm}', 'as' => '{replace_sm}.', 'namespace' => '{replace}'], function () {
    Route::get('list', '{replace}Controller@get{replace}list')->name('list');
    Route::get('create', '{replace}Controller@getForm{replace}Create')->name('create');
    Route::get('detail', '{replace}Controller@get{replace}Detail')->name('detail');
    Route::post('create', '{replace}Controller@submitForm{replace}Create')->name('submit.create');
    Route::get('update', '{replace}Controller@getForm{replace}Update')->name('update');
    Route::post('update', '{replace}Controller@submitForm{replace}Update')->name('submit.update');
    Route::delete('delete', '{replace}Controller@submitForm{replace}Delete')->name('submit.delete');
});
