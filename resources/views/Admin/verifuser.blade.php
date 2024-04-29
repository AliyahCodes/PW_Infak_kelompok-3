@extends('layouts.main')

@section('title', 'Verifikasi Pembayaran')
@section('text', 'Verifikasi Pembayaran')

@section('content')
<style>
  /* Style untuk tata letak dan desain */
  body {
    font-family: Arial, sans-serif;
  }
  .verification-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  .verification-details {
    margin-bottom: 20px;
  }
  .verification-details img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
  }
  .verification-details p {
    margin-bottom: 5px; /* Menambahkan margin bottom agar tidak terlalu berdekatan dengan elemen berikutnya */
  }
  .verification-status {
    font-weight: bold;
  }
  .action-buttons {
    margin-top: 20px;
    display: flex;
    justify-content: flex-end; /* Mengatur tombol-tombol ke ujung kanan */
    gap: 10px; /* Jarak antara tombol */
  }
  /* Style untuk tombol terima (hijau) */
  .action-buttons button.accept {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  /* Hover effect untuk tombol terima */
  .action-buttons button.accept:hover {
    background-color: #45a049;
  }
  /* Style untuk tombol tolak (merah) */
  .action-buttons button.reject {
    background-color: #f44336;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  /* Hover effect untuk tombol tolak */
  .action-buttons button.reject:hover {
    background-color: #d32f2f;
  }
</style>
</head>
<body>

<div class="verification-container">
  <div class="verification-details">
    <h3>Detail Transaksi</h3>
    <p>Nama : <span id="transaction-number">123456</span></p>
    <p>Tanggal: <span id="transaction-date">29 April 2024</span></p>
    <!-- Disini Anda bisa menambahkan informasi-informasi verifikasi lainnya -->
  </div>

  <div class="verification-proof">
    <h3>Bukti Transaksi</h3>
    <img id="transaction-proof" src="path_to_your_image.jpg" alt="Bukti Transaksi">
  </div>

  <div class="action-buttons">
    <button class="accept" onclick="acceptTransaction()">Terima</button>
    <button class="reject" onclick="rejectTransaction()">Tolak</button>
  </div>
</div>

<!-- JavaScript untuk menampilkan nomor transaksi, tanggal, dan status verifikasi -->
<script>
  // Contoh data verifikasi
  var verificationData = {
    number: "123456",
    date: "29 April 2024",
    status: "Terverifikasi",
    // Anda bisa menambahkan informasi-informasi verifikasi lainnya di sini
  };

  // Memasukkan nomor transaksi, tanggal, dan status verifikasi ke dalam dokumen
  document.getElementById("transaction-number").textContent = verificationData.number;
  document.getElementById("transaction-date").textContent = verificationData.date;
  // document.getElementById("verification-status").textContent = verificationData.status;

  // Fungsi untuk menangani aksi klik tombol "Terima"
  function acceptTransaction() {
    // Tambahkan kode di sini untuk menangani aksi ketika tombol "Terima" diklik
    alert("Transaksi diterima");
  }

  // Fungsi untuk menangani aksi klik tombol "Tolak"
  function rejectTransaction() {
    // Tambahkan kode di sini untuk menangani aksi ketika tombol "Tolak" diklik
    alert("Transaksi ditolak");
  }
</script>

</body>
@endsection
