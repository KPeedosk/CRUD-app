@extends('app')

@section('content')
<div class="wrapper">
    @include('header')

    <div class="content">
        <div class="form-wrapper">
            <form action="/kandideerimine/{{$application -> id}}/edit" method="POST" enctype="multipart/form-data">
                @include('messages')
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label @class(['required'=> $isEdit]) for="position_name">Ametikoha nimetus:</label>
                            </td>
                            <td>
                                @if($isEdit)
                                <input type="text" id="position_name" name="position_name" value="{{$application -> position_name}}">
                                @else
                                <p>{{$application -> position_name}}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cv_file">CV fail:</label>
                            </td>
                            <td>
                                @if($application -> cv_file != null)
                                <a href="{{ route('downloadFromUserApplication', $application -> id) }}">CV.txt</a>
                                @endif

                                @if($isEdit)
                                <input type="file" id="cv_file" name="cv_file">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="motivational_letter">Motivatsiooni kiri:</label>
                            </td>
                            <td>
                                @if($isEdit)
                                <textarea id='motivational_letter' name='motivational_letter' rows='4' cols='50'>{{old('motivational_letter', $application -> motivational_letter)}}</textarea>
                                @else
                                <p class="textarea-text">{{$application -> motivational_letter}}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="references">Soovitajad:</label>
                            </td>
                            <td>
                                @if($isEdit)
                                <textarea id='references' name='references' rows='4' cols='50'>{{old('references', $application -> references)}}</textarea>
                                @else
                                <p class="textarea-text">{{$application -> references}}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="additional_info">Lisainfo:</label>
                            </td>
                            <td>
                                @if($isEdit)
                                <textarea id='additional_info' name='additional_info' rows='4' cols='50'>{{old('additional_info', $application -> additional_info)}}</textarea>
                                @else
                                <p class="textarea-text">{{$application -> additional_info}}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="questions">Küsimused:</label>
                            </td>
                            <td>
                                @if($isEdit)
                                <textarea id='questions' name='questions' rows='4' cols='50'>{{old('questions', $application -> questions)}}</textarea>
                                @else
                                <p class="textarea-text">{{$application -> questions}}</p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                @if($isEdit)
                @csrf()
                @method('PUT')
                <input type="submit" class="btn-success" value="Salvesta">
                @endif
            </form>
        </div>
    </div>
</div>
@endsection