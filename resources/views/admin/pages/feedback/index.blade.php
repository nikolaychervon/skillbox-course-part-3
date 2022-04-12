@extends('admin.master')

@section('title', 'Список обращений')

@section('content')

    <div class="row">
        <div class="col-md-12 blog-main">
            <br>
            <h1>Список обращений</h1>
            <hr>
            @if(!$contacts->empty())
                Обращений пока нет :)
            @else
                <table class="table table-striped table-contacts">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Почта</th>
                        <th scope="col">Сообщение</th>
                        <th scope="col">Дата получения</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $id => $contact)
                        <tr>
                            <th scope="row">{{ $id }}</th>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
