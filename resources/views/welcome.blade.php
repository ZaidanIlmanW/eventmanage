<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smecone Event</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-700">

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-pink-50 to-blue-50 h-screen flex items-center justify-center">
    <div class="container mx-auto text-center px-4">
      <h1 class="text-5xl font-bold text-gray-700 mb-6">
      School Events <span></span>
      </h1>
      <p class="text-lg text-gray-500 mb-10">
        Sebuah Platform Untuk Mengeksplorasi dan Mengelola Acara Sekolah.
      </p>
      <a href="{{ url('/home') }}" class="bg-blue-400 text-white px-8 py-4 rounded-lg text-lg shadow-md hover:bg-red-500 transition">
        Masuk  
      </a>
    </div>
  </section>

</body>
</html>
