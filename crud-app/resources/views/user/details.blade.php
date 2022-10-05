@extends('app')

@section('content')
<div class="wrapper">
    @include('header')

    <div class="content">
        <div class="form-wrapper">
            <form action="/andmed/update" method="POST">
                @include('messages')

                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label class="required" for="fname">Eesnimi:</label>
                            </td>
                            <td>
                                <input type="text" id="fname" name="fname" value="{{old('first_name', $user -> first_name)}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="required" for="lname">Perenimi:</label>
                            </td>
                            <td>
                                <input type="text" id="lname" name="lname" value="{{old('last_name', $user -> last_name)}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="age">Vanus:</label>
                            </td>
                            <td>
                                <input type="number" id="age" name="age" value="{{old('age', $user -> age)}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="sex">Sugu:</label>
                            </td>
                            <td>
                                <select name="sex" id="sex">
                                    <option></option>
                                    <option value="M" {{old('sex', $user -> sex) === 'M' ? 'selected' : ''}}>Mees</option>
                                    <option value="F" {{old('sex', $user -> sex) === 'F' ? 'selected' : ''}}>Naine</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="personal_code">Isikukood:</label>
                            </td>
                            <td>
                                <input type="number" id="personal_code" name="personal_code" value="{{old('personal_code', $user -> personal_code)}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="country">Riik:</label>
                            </td>
                            <td>
                                <select name="country" id="country">
                                    <option></option>
                                    <option value="EST" {{old('country', $user -> country) === 'EST' ? 'selected' : ''}}>Eesti</option>
                                    <option value="FIN" {{old('country', $user -> country) === 'FIN' ? 'selected' : ''}}>Soome</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">E-posti aadress</label>
                            </td>
                            <td>
                                <input type="text" id="email" name="email" value="{{old('email', $user -> email)}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="language_skills">Keeleoskuse tasemed:</label>
                            </td>
                            <td>
                                <textarea id='language_skills' name='language_skills' rows='4' cols='50'>{{old('language_skills', $user -> language_skills)}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="data_processing_allowed">Luba isikuandmete töötlemiseks:</label>
                            </td>
                            <td>
                                <input type="checkbox" {{$user -> data_processing_allowed === true ? 'checked' : ''}} id='data_processing_allowed' name='data_processing_allowed'>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @csrf()
                @method('PUT')
                <input type="submit" class="btn-success" value="Salvesta">
            </form>
        </div>
    </div>
</div>
@endsection