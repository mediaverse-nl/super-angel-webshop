<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Illuminate\Http\Request $request) {
    return $request->user();
});

//text editor
Route::post('/text-editor-{id}', function(App\Http\Requests\Api\Admin\TextUpdateRequest $request, $id) {
    $text = \App\Text::findOrFail($id);

    $text->update(['text' => $request->text]);

    return response()
        ->json('ok', 200);
});