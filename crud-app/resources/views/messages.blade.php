@if ($message = Session::get('success'))
<div class="alert">
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{$message}}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert-error">
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{$message}}
</div>
@endif