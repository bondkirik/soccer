<!DOCTYPE html>
<html>
<head>
    <title>Quiz App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />

</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="content-d">
            @foreach ($divisions->where('id', '<=', 2) as $division)
            <div class="division">
                <h2>Division {{$division->name}}</h2>
                <table>
                    <tr>
                        <th>Teams</th>
                        @foreach($division->teams as $team)
                            <th>{{ $team->name }}</th>
                        @endforeach
                        <th>score</th>
                    @foreach($division->teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                        @for ($i = $division->teams->first()->id; $i <= $division->teams->last()->id; $i++)
                            @if($i == $team->id)
                              <td>--</td>
                                @else
                                <td></td>
                            @endif
                        @endfor
                                <td></td>
                            </tr>
                    @endforeach
                </table>
            </div>
            @endforeach
        </div>
        <div class="btn-block">
            <a type="submit" class="btn btn-success" href="divisionAGen">
                <span >division A</span>
            </a>
            <a type="submit" class="btn btn-success" href="divisionBGen">
                <span >division B</span>
            </a>
            <a type="submit" class="btn btn-success" href="playoffGen">
                <span>Playoff</span>
            </a>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

</body>
</html>
