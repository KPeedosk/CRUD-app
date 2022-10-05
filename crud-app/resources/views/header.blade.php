<div class="header">
    <h1>Valitud kasutaja {{$user->first_name}} {{$user->last_name}}</h1>
    <a class="btn-logout" href="{{ route('logout') }}">Vaheta kasutajat</a>
</div>

<div class="btn-group">
    <a @class(['tab-btn','active'=> Request::is('andmed')]) href="{{route('andmed')}}">Minu andmed</a>
    <a @class(['tab-btn','active'=> Request::is('minu_kandideerimised')]) href="{{route('my-applications')}}">Minu kandideerimised</a>
</div>