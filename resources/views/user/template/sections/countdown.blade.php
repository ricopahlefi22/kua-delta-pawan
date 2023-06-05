@if (!empty(App\Models\Wedding::where('user_id', Auth::user()->id)->first()->date))
    <div title="Lengkapi Berkas sebelum waktu berakhir!" class="text-danger"
        data-countdown="{{ Carbon\Carbon::parse(App\Models\Wedding::where('user_id', Auth::user()->id)->first()->date)->subDays(2)->format('Y/m/d') }}">
    </div>
@endif

@push('script')
    <script src="{{ asset('plugins/jquery-countdown/jquery.countdown.min.js') }}"></script>

    <script>
        $('[data-countdown]').each(function() {
            var finalDate = $(this).data('countdown');

            $(this).countdown(finalDate, function(event) {
                let days = (event.lasting.days.toString().length == 2) ? event.lasting.days : '0' + event
                    .lasting.days;
                let hours = (event.lasting.hours.toString().length == 2) ? event.lasting.hours : '0' + event
                    .lasting
                    .hours;
                let minutes = (event.lasting.minutes.toString().length == 2) ? event.lasting.minutes : '0' +
                    event
                    .lasting.minutes;
                let seconds = (event.lasting.seconds.toString().length == 2) ? event.lasting.seconds : '0' +
                    event
                    .lasting.seconds;

                $(this).html(days + ':' + hours + ':' + minutes + ':' + seconds);
            });
        });
    </script>
@endpush
