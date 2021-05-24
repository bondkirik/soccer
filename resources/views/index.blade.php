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
            <a type="submit" class="btn btn-success" href="division/{{$division->id}}">
                <span >division {{$division->name}}</span>
            </a>
            @endforeach
                @foreach ($divisions->where('id', 3) as $division)
            <a type="submit" class="btn btn-success" href="playoff/{{$division->id}}">
                <span>Playoff</span>
            </a>
            @endforeach
        </div>
        <div class="content-d">
            <div class="playoff">
            <table>
                <tr>
                <th>Pre-semi-final</th>
                <th>Semi-final</th>
                <th>Final</th>
                <th>Result</th>
                </tr>
                <tr>
                    <td>
                        @foreach ($divisions->where('id', 3) as $division)
                            @foreach($division->games->where('division_id', $division->id)->take(4)  as $game)
                            <div class="play_off_game">
                                @foreach($division->teams->where('id', $game->home_id)  as $team)
                               <span>{{$team->name}}</span>
                                @endforeach
                                @foreach($division->teams->where('id', $game->away_id)  as $team)
                                <span>{{$team->name}}</span>
                                @endforeach
                                    <div>
                                        <span>{{$game->score}}</span>
                                    </div>
                            </div>
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                        @foreach ($divisions->where('id', 3) as $division)
                            @foreach($division->games->where('division_id', $division->id)->skip(4)->take(2)  as $game)
                                <div class="play_off_game">
                                    @foreach($division->teams->where('id', $game->home_id)  as $team)
                                        <span>{{$team->name}}</span>
                                    @endforeach
                                    @foreach($division->teams->where('id', $game->away_id)  as $team)
                                        <span>{{$team->name}}</span>
                                    @endforeach
                                    <div>
                                        <span>{{$game->score}}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </td>
                <td>
                    @foreach ($divisions->where('id', 3) as $division)
                        @foreach($division->games->where('division_id', $division->id)->skip(6)->take(1)  as $game)
                            <div class="play_off_game">
                                @foreach($division->teams->where('id', $game->home_id)  as $team)
                                    <span>{{$team->name}}</span>
                                @endforeach
                                @foreach($division->teams->where('id', $game->away_id)  as $team)
                                    <span>{{$team->name}}</span>
                                @endforeach
                                <div>
                                    <span>{{$game->score}}</span>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </td>
                    <td>
                        <?php $place=1;?>
                        @foreach ($results as $result)
                                    <div>

                                        <span>{{$place++}}</span>
                                        <span>-</span>
                                        <span>{{$result->name}}</span>
                                    </div>
                        @endforeach
                    </td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>


{{--<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>--}}

</body>
</html>
