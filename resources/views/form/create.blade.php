@extends('layouts.main')


@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Создать новую форму</h1> &nbsp;
        </div>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <form  action="{{ route('forms.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form">Пользователь</label>
                   <input class="form-control" type="text" name="user_id" value={{ Auth::id() }}>
                </div>
                <div class="form-group">
                    <lable for="form" id="form">Название формы</lable>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="form">Свой вопрос:</label>
                    <input type="text" class="form-control" name="question">
                </div>
                <hr>

                <ul class="list-group">
                    @foreach($questions as $question)
                        <div class="form-group">
                        <label class="list-group-item">
                            <input
                                id="question"
                                name="question[]"
                                class="form-check-input me-1 {{ $errors->has('question') ? 'is-invalid' : '' }}"
                                type="checkbox"
                                value="{{ $question->question }}"
                            >
                            {{ $question->question }}
                        </label>
                    @endforeach
                </ul>
                <br>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>

@endsection
@push('js')
    <script type="text/javascript">

        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endpush
