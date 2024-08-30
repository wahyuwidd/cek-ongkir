<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Cek Ongkir</title>
</head>
<style>
    .container {
        max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
    }
   table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

thead {
    background-color: #007bff;
    color: #ffffff;
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    font-weight: bold;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #0056b3;
}
.footer {
    text-align: center;
    margin-top: 40px;
}

</style>
<body>
    <div class="container">
    <h2>Hasil Cek Ongkir</h2>

@if(isset($cost) && count($cost) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kurir</th>
                <th>Service</th>
                <th>Deskripsi</th>
                <th>Biaya</th>
                <th>Estimasi (Hari)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cost['rajaongkir']['results'] as $result)
                @foreach($result['costs'] as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ strtoupper($result['code']) }}</td>
                        <td>{{ $service['service'] }}</td>
                        <td>{{ $service['description'] }}</td>
                        <td>
                            @foreach($service['cost'] as $costDetail)
                                Rp {{ number_format($costDetail['value'], 0, ',', '.') }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($service['cost'] as $costDetail)
                                {{ $costDetail['etd'] }} hari
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@else
    <p>Tidak ada data ongkos kirim yang tersedia.</p>
@endif

<a href="{{ url('ongkir') }}">Cek Ongkir Lagi</a>
    </div>
    <div class="footer">
        <p>
            Develop by Wahyu Widodo
        </p>
    </div>
</body>
</html>
