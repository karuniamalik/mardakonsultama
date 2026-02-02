<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #eee;
            padding: 20px;
        }

        .header {
            background-color: #4A90E2;
            color: white;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 20px;
        }

        .field {
            margin-bottom: 10px;
            border-bottom: 1px dashed #eee;
            padding-bottom: 5px;
        }

        .label {
            font-weight: bold;
            color: #555;
            width: 150px;
            display: inline-block;
        }

        .footer {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>PESAN BARU</h2>
        </div>
        <div class="content">
            <p>Halo Admin <strong>Marda Konsultama</strong>,</p>
            <p>Anda menerima pesan baru dengan detail sebagai berikut:</p>

            <div class="field"><span class="label">Nama </span>: {{ $appointment->name }}</div>
            <div class="field"><span class="label">Telepon</span>: {{ $appointment->phone_number }}</div>

            <div style="margin-top: 20px;">
                <strong>Pesan:</strong><br>
                <p style="background: #f9f9f9; padding: 15px; border-left: 4px solid #4A90E2;">
                    {{ $appointment->brief }}
                </p>
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Marda Konsultama Digital System. <br>
            Pesan ini dihasilkan oleh sistem web.
        </div>
    </div>
</body>

</html>
