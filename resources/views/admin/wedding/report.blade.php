<h1 style="text-align: center;">Rekap Peristiwa Pernikahan Bulan {{ $month }} {{ $year }}</h1>
<table border="1" style="width: 100%;">
    <thead>
        <th>NO</th>
        <th>TANGGAL PELAKSANAAN</th>
        <th>JAM</th>
        <th>SUAMI</th>
        <th>ISTRI</th>
        <th>BIAYA</th>
    </thead>
    <tbody>
        @foreach ($weddings as $wedding)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ Carbon\Carbon::parse($wedding->date)->isoFormat('D MMMM Y') }}</td>
                <td style="text-align: center;">{{ $wedding->time }}</td>
                <td>{{ $wedding->user->gender == 'Laki-Laki' ? $wedding->user->name : $wedding->partner->name }}</td>
                <td>{{ $wedding->user->gender == 'Laki-Laki' ? $wedding->user->name : $wedding->user->name }}</td>
                <td style="text-align: center;">{{ $wedding->married_on_office == true ? '-' : 'Rp. 600.000' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
