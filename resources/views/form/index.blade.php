@extends('layouts.main')

@section('content')
    АДМИНКА, вывод заполенных форм
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Нахвание формы, создатель</th>
                    <th>Управление</th>
                </tr>
            </thead>
        <tbody>
           @forelse($forms as $form)
            <tr>
                <td  class="text-center"> # {{ $form->id }} - {{ $form->name }}, {{ $form->user->email }}
                <td>
                    <a class="" href="{{ route('forms.show', $form) }}"><i class="fa fa-lg fa-baby"></i> Просмотр ответов </a><br>
                    <a class="" href="{{ route('forms.edit', $form) }}"><i class="fa fa-lg fa-edit"></i> Редактировать</a><br>
                    <a class="" href="#"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-form-{{ $form->id }}').submit();">
                        <i class="fa fa-lg fa-trash"></i>
                        {{ __(' Удалить') }}
                    </a>

                    <form id="destroy-form-{{ $form->id }}" action="{{ route('forms.destroy', $form->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>
            </tr>
           @empty
            <tr>
                <td colspan="4">
                    <h2>У вас нет инициализированных форм</h2>
                </td>
           </tr>
           @endforelse
        </tbody>
        </table>
        {{ $forms->links() }}
    </div>

@endsection
