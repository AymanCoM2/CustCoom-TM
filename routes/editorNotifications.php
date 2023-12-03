<?php

use App\Models\EditorOnceTimeDocs;
use App\Models\EditorOnceTimeNOtification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/edit-notifications', function () {
    return view('editornotify.fields');
})->name('notify-edit');

Route::get('/file-notifications', function () {
    return view('editornotify.files');
})->name('notify-file');



Route::post('/mark-as-read', function (Request $request) {
    $idOfElement  = $request->idOfElement;
    $typeOfElement = $request->typeOfElement;

    if ($typeOfElement == 'file') {
        $singleNotification  = EditorOnceTimeDocs::where('id', $idOfElement)->first();
        $singleNotification->delete();
    } else {

        $singleNotification  = EditorOnceTimeNOtification::where('id', $idOfElement)->first();
        $singleNotification->delete();
    }
    $data  = [
        'The_Type' => $typeOfElement,
        'The_id' => $idOfElement
    ];
    return response()->json($data);
})->name('mark-as-read');
