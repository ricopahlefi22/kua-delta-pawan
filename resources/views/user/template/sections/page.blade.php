@php
    function checkRoute($route)
    {
        if (Route::current()->uri == $route) {
            return 'btn-dark';
        }
    }
@endphp

<div class="btn-group float-start">
    <a href="starter" class="btn btn-sm btn-secondary {{ checkRoute('u/starter') }}">1. Data Pernikahan</a>
    @if (App\Models\Wedding::where('user_id', Auth::user()->id)->first())
        <a href="personal" class="btn btn-sm btn-secondary {{ checkRoute('u/personal') }}">2. Data Pribadi</a>
    @else
        <button class="btn btn-sm btn-secondary" disabled>2. Data Pribadi</button>
    @endif
    @if (App\Models\Wedding::where('user_id', Auth::user()->id)->first() && App\Models\User::where('id', Auth::user()->id)->first()->gender != null)
        <a href="partner" class="btn btn-sm btn-secondary {{ checkRoute('u/partner') }}">3. Data Pasangan</a>
    @else
        <button class="btn btn-sm btn-secondary" disabled>3. Data Pasangan</button>
    @endif
    @if (App\Models\Wedding::where('user_id', Auth::user()->id)->first() && App\Models\User::where('id', Auth::user()->id)->first()->gender != null && App\Models\Partner::where('user_id', Auth::user()->id)->first())
        <a href="requirements" class="btn btn-sm btn-secondary {{ checkRoute('u/requirements') }}">4. Berkas</a>
    @else
        <button class="btn btn-sm btn-secondary" disabled>4. Berkas</button>
    @endif
</div>
