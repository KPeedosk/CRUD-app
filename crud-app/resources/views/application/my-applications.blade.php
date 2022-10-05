@extends('app')

@section('content')
<div class="wrapper">
    @include('header')

    <div class="content">
        <div class="form-wrapper">
            <div>
                <div class="wrapper">
                    @include('messages')

                    <div>
                        <a class="btn-add-new" href="{{ route('create-application') }}">Lisa uus kandideerimine</a>
                    </div>

                    @if (count($myApplications) != 0)
                    <table class="list-table">
                        <thead>
                            <th>Ametikoha nimetus</th>
                            <th class="icon-col"></th>
                            <th class="icon-col"></th>
                        </thead>
                        <tbody>
                            @foreach($myApplications as $application)
                            <tr>
                                <td><a href="{{ route('application', $application -> id) }}">{{$application -> position_name}}</a></td>
                                <td><a class="icon" href="{{ route('edit-application', $application -> id) }}"><i class="fa-solid fa-pen"></i></a></td>
                                <td>
                                    <form action="/kandideerimine/{{$application -> id}}" method="POST">
                                        @csrf()
                                        @method('DELETE')
                                        <button class='icon-button'><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection