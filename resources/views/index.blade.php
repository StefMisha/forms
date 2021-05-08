@extends('layouts.main')

@section('title')
    {{ $form['name'] }} @parent
@endsection

@section('header')
    {{ $form['name'] }}
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div>
                <form id="form_{{ $form->id }}" action="{{ route('viewform.store', $form) }}" method="POST">
                    @csrf ОПРОС:
                    <label for="form" id="form">{{ $form->name }}</label>
                    <hr>
                    <input type="hidden" name="form[{{ $form->id }}]" value="{{ $form->id }}">
                    @foreach($form->questions as $question)
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="question" id="question">{{ $question->question }}</label>
                            <input
                                name="questions-answers[{{ $question->id }}]"
                                value=""
                                type="text"
                                class="form-control"
                                placeholder="Ваш ответ"
                                required data-validation-required-message="Please enter.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    @endforeach
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>

@endsection
