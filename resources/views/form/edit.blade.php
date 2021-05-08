
@extends('layouts.main')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div>
                <form id="form_{{ $form->id }}" action="{{ route('forms.update', $form) }}" method="POST">
                    @csrf РЕДАКТИРОВАНИЕ ВОПРОСОВ ФОРМЫ:
                    @method('PUT')
                    <label for>{{ $form->name }}</label>
                    <hr>

                    <input type="hidden" name="form[{{ $form->id }}]" value="{{ $form->id }}">
                    @foreach($form->questions as $question)
                        <div class="control-group">
                            <div class="form-group controls">
                                <label for="question" id="question">{{ $question->question }}</label>
                                <input
                                    name="questions[{{ $question->id }}]"
                                    value="{{ $question->question }}"
                                    type="text"
                                    class="form-control"
                                    required data-validation-required-message="Please enter.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="form">Новый вопрос:</label>
                        <input type="text" class="form-control" name="question">
                    </div>
                    <br>
                     <div class="d-sm-flex justify-content-between ">
                         <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    <br>
                </form>
            </div>
            </div>
        </div>

@endsection
