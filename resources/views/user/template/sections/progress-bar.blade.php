<div class="progress mb-3">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="5"
        aria-valuemin="0" aria-valuemax="100" style="width: 5%"></div>

    @if (App\Models\Wedding::where('user_id', Auth::user()->id)->first() &&
        App\Models\User::where('id', Auth::user()->id)->first()->gender != null &&
        App\Models\Partner::where('user_id', Auth::user()->id)->first())

        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="65"
            aria-valuemin="0" aria-valuemax="100" style="width: 65%"></div>

    @elseif (App\Models\Wedding::where('user_id', Auth::user()->id)->first() &&
                App\Models\User::where('id', Auth::user()->id)->first()->gender != null)

        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="45"
            aria-valuemin="0" aria-valuemax="100" style="width: 45%"></div>

    @elseif (App\Models\Wedding::where('user_id', Auth::user()->id)->first())

        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="25"
            aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>

    @endif
</div>
