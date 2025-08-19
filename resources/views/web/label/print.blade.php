<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Label</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        title { font-size: 24px; margin: 20px; }
        body { font-size: 12px; margin: 20px; }
        h4 { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
    </style>
</head>
<body onload="window.print()">

    <h4 class="text-center">Laporan Data Label</h4>
    @if($start && $end)
        <p class="text-center">Periode: {{ $start }} s/d {{ $end }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Lot No.</th>
                <th>Length</th>
                <th>Weight</th>
                <th>Date</th>
                <th>Shift</th>
                <th>Mesin No</th>
                <th>Pitch</th>
                <th>Direction</th>
                <th>Operator</th>
            </tr>
        </thead>
        <tbody>
            @forelse($labels as $label)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $label->lot_number }}</td>
                    <td>{{ $label->length }} M</td>
                    <td>{{ $label->weight }} KG</td>
                    <td>{{ $label->shift_date }}</td>
                    <td>{{ $label->shift }}</td>
                    <td>{{ $label->machine_number }}</td>
                    <td>{{ $label->pitch }}</td>
                    <td>{{ $label->direction }}</td>
                    <td>{{ $label->operator->name }}</td>
                </tr>
            @empty
                <tr><td colspan="10">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
