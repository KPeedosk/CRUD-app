@extends('app')

@section('content')
<div class="form-wrapper">
    <form action="/" method="POST">
        @include('messages')
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="fname">Eesnimi:</label>
                    </td>
                    <td>
                        <input type="text" id="fname" name="fname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="lname">Perenimi:</label>
                    </td>
                    <td>
                        <input type="text" id="lname" name="lname">
                    </td>
                </tr>
            </tbody>
        </table>

        @csrf()
        <input type="submit" class="btn-success" value="Sisene">
    </form>
</div>
@endsection