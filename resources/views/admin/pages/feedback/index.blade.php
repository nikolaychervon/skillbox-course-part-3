@extends('admin.master')

@section('title', 'Список обращений')

@section('content')

    <div class="row">
        <div class="col-md-12 blog-main">
            <br>
            <h1>Список обращений</h1>
            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Сообщение</th>
                    <th scope="col">Дата получения</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>example@yandex.ru</td>
                    <td>Сообщение...</td>
                    <td>17.06.2010</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>example@yandex.ru</td>
                    <td>Сообщение...</td>
                    <td>17.06.2010</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>example@yandex.ru</td>
                    <td>Сообщение...</td>
                    <td>17.06.2010</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>example@yandex.ru</td>
                    <td>Сообщение...</td>
                    <td>17.06.2010</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
