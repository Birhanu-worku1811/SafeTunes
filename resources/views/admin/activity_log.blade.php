@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Activity Logs</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Log Name</th>
                <th>Description</th>
                <th>Event</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
{{--                {{dd($log['properties']['attributes'])}}--}}
                <tr>
                    <td>{{ $log['log_name'] }}</td>
                    <td>{{ $log['description'] }}</td>
                    <td>{{ $log['event'] }}</td>
                    <td>
                        @if(isset($log['properties']['attributes']))
                            @foreach($log['properties']['attributes'] as $key => $value)
{{--                                <strong>{{ $key }}:</strong> {{ $value }}<br>--}}
                                {{$key}}: {{gettype($value) =='string' ? $value : ''}}<br>
                            @endforeach
                        @endif

                    </td>
                    <td>{{ $log['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
