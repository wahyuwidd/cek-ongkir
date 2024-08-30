<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Ongkir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select,
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Cek Ongkir</h2>
        <form action="{{ route('cek-ongkir') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="origin">Kota Asal:</label>
                <select name="origin" id="origin" required>
                    @foreach($cities['rajaongkir']['results'] as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="destination">Kota Tujuan:</label>
                <select name="destination" id="destination" required>
                    @foreach($cities['rajaongkir']['results'] as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="weight">Berat (gram):</label>
                <input type="number" name="weight" id="weight" placeholder="Contoh: 1000" required>
            </div>

            <div class="form-group">
                <label for="courier">Kurir:</label>
                <select name="courier" id="courier">
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">Pos Indonesia</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Cek Ongkir</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <p>
            Develop by Wahyu Widodo
        </p>
    </div>
</body>
</html>
