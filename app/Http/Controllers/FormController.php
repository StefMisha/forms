<?php

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Models\Form;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::select(['id', 'name', 'user_id'])
            ->with('user')
            ->where('user_id', '=', Auth::user()->id)
            ->with(['questions' => fn($q) => $q->with('answer')])
            ->paginate(20); //вывод по 20 шт на страницу

        return view('form.index', [
            'forms' => $forms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all()
            ->unique('question');

        return view('form.create',[
            'questions' => $questions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Form::create($request->input());

        foreach ($request->input('question') as $value) {
            $question = new Question(['question' => $value]);
            $question->form()->associate($model->id);
            $question->save();
        }

        return redirect()->route('forms.create')
            ->with('success', 'Форма опубликована под ID #_'. $model->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
//        $forms = Form::select(['id', 'name', 'user_id'])
//            ->where($form)
//            ->with('user')
//            ->with(['questions' => fn($q) => $q->with('answer')])
//            ->paginate(20); //вывод по 10 шт на страницу

        return view('form.show', [
            'form' => $form
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        return view('form.edit', [
            'form' => $form
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        $inputQuestions = $request->input('questions');
        foreach ($form->questions->keyBy('id') as $key => $question) {
            $question->update(['question' => $inputQuestions[$key]]);
        }
            if ($request->input('question') !== null) {
                $form = Form::find($form->id);
                $value = $request->input('question');
                $question = new Question(['question' => $value]);
                $question->form()->associate($form->id);
                $question->save();
            }

        return redirect()->route('forms.edit', [$form])
            ->with('success', 'Форма отредактирована');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return string
     */
    public function destroy(Form $form)
    {
        $data = Form::find($form);
        foreach ($data->questions as $question) {
            $question->delete();
        }
        $data->delete();

        if ($data) {
           return redirect()->route('forms.index');
        }
    }
}
