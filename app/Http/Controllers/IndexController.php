<?php

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Models\Form;
use App\Models\Lead;
use App\Models\Question;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
//        $forms = Form::select(['id', 'name', 'user_id'])
//            ->with('user')
//            ->with(['questions' => fn($q) => $q->with('answer')])
//            ->get();
//
//        return view('index', [
//            'form' => $forms,
//        ]);

        return 'Думал здесь, что-то будет? Не, добавь в URL id формы, например: http://wgg/form/2';
    }

    public function show($id)
    {//TODO: ОПИСАТЬ ЛОГИКУ ВЫВОДА ОПРОСА ДЛЯ НЕ АВТОРИЗОВАННЫХ, ПО ID ФОРМЫ

        $form = Form::find($id);
        return view('index', [
            'form' => $form,
        ]);
    }
    public function store(Request $request)
    {
//        dd($request->all());

        $lead = Lead::find(1);
        foreach($request->input('questions-answers') as $key => $value) {
            $answer = new Answer(['value' => $value]);
            $answer->lead()->associate($lead);
            $answer->question()->associate($key);
            $answer->save();
        }

        if ($answer) {
            return back()
                ->withInput()->with('success','Ответы получены!');
        }
    }
}
