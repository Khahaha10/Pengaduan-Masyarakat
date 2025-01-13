<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
        }
    
        .container {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #000;
        }
    
        .header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: bold;
        }
    
        .address {
            text-align: left;
            margin-bottom: 20px;
            font-size: 14px;
        }
    
        .date {
            text-align: right;
            font-size: 14px;
            margin-bottom: 30px;
        }
    
        .content {
            font-size: 14px;
            margin-bottom: 20px;
        }
    
        .signature {
            text-align: right;
            margin-top: 40px;
            font-size: 14px;
            font-weight: bold;
        }
    
        .card {
            margin: 20px 0;
        }
    
        img {
            max-width: 100%;
            height: auto;
            max-height: 300px;
        }
    
        .row p {
            font-size: 14px;
        }

        .center{
            text-align: center;
        }

        .card-title {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <div class="header">
            <p>PEMERINTAH KOTA</p>
            <p>DINAS PELAYANAN MASYARAKAT</p>
            <h4>Surat Pengaduan</h4>
        </div>

        <div class="content card-title">
            <h2><b>{{ $pengaduan->judul_pengaduan }}</b></h2>
        </div>

        @if($fotoBase64)
            <div class="center">
                <img src="data:image/png;base64,{{ $fotoBase64 }}" alt="Foto Pengaduan">
            </div>
        @endif

        <div class="content">
            <p><strong>Isi Pengaduan:</strong> {{ $pengaduan->isi_pengaduan }}</p>
        </div>

        <div class="row">
            <div class="col-6">
                <p><strong>Status:</strong> {{ ucfirst($pengaduan->status) }}</p>
            </div>
            <div class="col-6 text-end">
                <p><strong>Tanggal:</strong> {{ $pengaduan->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <div class="content">
            <p><strong>Tanggapan:</strong> {{ $pengaduan->tanggapan->first()->isi_tanggapan ?? 'Belum ada tanggapan' }}</p>
        </div>

        <div class="signature">
            <p>Hormat Kami,</p>
        </div>
    </div>
</body>
</html>
