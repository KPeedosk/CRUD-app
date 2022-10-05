@extends('app')

@section('content')
<div class="wrapper">
    @include('header')

    <div class="content">
        <div class="form-wrapper">
            <form action="/minu_kandideerimised/create" method="POST" enctype="multipart/form-data">
                @include('messages')
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label class="required" for="position_name">Ametikoha nimetus:</label>
                            </td>
                            <td>
                                <input type="text" id="position_name" name="position_name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cv_file">CV fail:</label>
                            </td>
                            <td>
                                <input type="file" id="cv_file" name="cv_file">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="motivational_letter">Motivatsiooni kiri:</label>
                            </td>
                            <td>
                                <textarea id='motivational_letter' name='motivational_letter' rows='4' cols='50'>{{ old('motivational_letter') }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="references">Soovitajad:</label>
                            </td>
                            <td>
                                <textarea id='references' name='references' rows='4' cols='50'>{{ old('references') }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="additional_info">Lisainfo:</label>
                            </td>
                            <td>
                                <textarea id='additional_info' name='additional_info' rows='4' cols='50'>{{ old('additional_info') }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="questions">Küsimused:</label>
                            </td>
                            <td>
                                <textarea id='questions' name='questions' rows='4' cols='50'>{{ old('questions') }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @csrf()
                <input type="submit" class="btn-success" value="Salvesta">
            </form>
        </div>
    </div>
</div>
@endsection