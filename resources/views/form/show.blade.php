
@extends('layouts.main')

@section('title')
    {{ $form['name'] }} @parent
@endsection

@section('header')
   Ответы на вопросы: {{ $form['name'] }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Вопрос</th>
                        <th class="text-center">Все ответы</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($form->questions as $question)
                        <tr>
                            <td> {{ $question->question }} </td>
                            <td> {{ $question->answer->value ?? '#н/д' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><h2>#н/д</h2></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>



@endsection
