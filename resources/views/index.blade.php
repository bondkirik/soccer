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
                                @if(!$division->games->isEmpty())
                                    @foreach($division->games->where('home_id', '==',  $team->id)->where('away_id', '==',  $i) as $game)
                                       <td>{{$game->score}}</td>
                                    @endforeach
                                    @foreach($division->games->where('home_id', '==',  $i)->where('away_id', '==',  $team->id) as $game)
                                       <td>{{$game->score}}</td>
                                    @endforeach
                                @else
                                <td></td>
                                @endif
                            @endif

                        @endfor
                                <td>{{$division->games->where('division_id', $division->id)->where('win_id', $team->id)->count()}}</td>
                            </tr>
                    @endforeach
                </table>
            </div>
            @endforeach
        </div>
        <div class="btn-block">
            @foreach ($divisions->where('id', '<=', 2) as $division)
            <a type="submit" class="btn btn-success" href="divisionGeneration/{{$division->id}}">
                <span >division {{$division->name}}</span>
            </a>
            @endforeach
            <a type="submit" class="btn btn-success" href="playoffGen">
                <span>Playoff</span>
            </a>
        </div>
    </div>
</div>


{{--<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>--}}

</body>
</html>
