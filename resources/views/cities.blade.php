<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Города</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}"  rel="stylesheet">
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('/js/addcity.js') }}"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref">


            <div class="content">
                <table class="table @if (count($cities) === 0) invisible @endif" id="cityTable">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Населенный пункт</th>
                        <th scope="col">Широта</th>
                        <th scope="col">Долгота</th>
                        <th scope="col">Кол-во населения</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($cities as $city)
                    <tr>
                        <th scope="row">{{ $city->id }}</th>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->latitude }}</td>
                        <td>{{ $city->longitude }}</td>
                        <td>{{ $city->population }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="title m-b-md">
                    Добавить город
                </div>
                {{ Form::model($city, ['action' => 'СitiesController@store', 'id' => 'addcity']) }}
                <div class="form-group">
                {{ Form::label('name', 'Название города') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
                <div class="form-group">
                {{ Form::label('latitude', 'Широта') }}
                {{ Form::text('latitude', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
                <div class="form-group">
                {{ Form::label('longitude', 'Долгота') }}
                {{ Form::text('longitude', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
                <div class="form-group">
                {{ Form::label('population', 'Численность населения') }}
                {{ Form::text('population', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
                <div class="form-group">
                {{ Form::submit('Отправить', ['class' => 'btn btn-primary']) }}
                </div>

                {{ Form::close() }}
<div id="alert-area">

</div>
</div>
</div>
</body>
</html>
