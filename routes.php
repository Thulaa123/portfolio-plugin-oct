<?php

use Thulana\Portfolio\Models\Project;
use Thulana\Portfolio\Models\Comment;
use GuzzleHttp\TransferStats;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

Route::prefix('api/portfolio/v1')->group(function () {
    Route::get('/projects', function () {
        $project = Project::all();
        if (!$project) {
            return response()->json(["code" => 100001, "message" => "Projects not found"], 404);
        } else {
            return response()->json($project);
        }
    });
    Route::post('/message', function (Request $request) {
        try {
            $student = new Comment();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->comment = $request->input('comment');;
            $student->save();
            $student->refresh();
            $name = $request->input('name');
            $email = $request->input('email');
            $comment = $request->input('comment');
            $vars = ['name' => $name,'email' => $email,'comment' => $comment];
            Mail::send('ceyleon.portfolio::mail.greet', $vars, function($message) use ($vars) {
                $message->to($vars['email'], 'Thulana Vinnath');
                $message->subject('Thank you for submiting');
            });
            Mail::send('thulana.portfolio::mail.reminder', $vars, function($message) use ($vars) {
                $message->to('vinnath112@gmail.com', 'Portfolio');
                $message->subject('New Query');
            });
            return response()->json(["message" => "Saved"])->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json(["code" => 100002, "message" => $e->getMessage()])->setStatusCode(400);
        }
    });
});