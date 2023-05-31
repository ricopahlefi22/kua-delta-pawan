@php
    $value = 5;

    if(App\Models\Wedding::where('user_id', Auth::user()->id)->first()){
        $value += 10;
    }

    if(Auth::user()->gender != null){
        $value += 10;
    }

    if(App\Models\Partner::where('user_id', Auth::user()->id)->first()){
        $value += 10;
    }

    // dd($value);
@endphp

<div class="progress mb-3">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
        aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $value }}%">
        {{ $value }}%</div>
</div>
