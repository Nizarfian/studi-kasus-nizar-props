<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nizar-Props</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <style>
    * {
      font-family: "Poppins", sans-serif;
      scroll-behavior: smooth;
    }

    body {
      background-color: #191a19;
      color: white;
    }
  </style>
</head>

<body>
  <main>
    <section class="relative h-[100vh] bg-gray-200">
      <div class="container mx-auto grid h-full grid-cols-2 items-center justify-center">
        <div class="relative z-10 flex flex-col items-start gap-10">
          <div class="flex flex-col items-start gap-3">
            <h1 class="text-6xl font-semibold">
              We Prepare <br />
              For The <span class="text-orange-500">Future</span>
            </h1>
            <p class="w-11/12 text-xl">
              We provide the best architectural design, contruction, and
              building maintance services for you.
            </p>
          </div>
          <div class="flex gap-5 text-2xl">
            <a href="#services">

              <button class="rounded-lg bg-orange-600 px-6 py-3 text-lg font-semibold">
                Our Services
              </button>
            </a>
            <a href="#produk">

              <button class="rounded-lg bg-white px-6 py-3 text-lg font-semibold text-black">
                View Product
              </button>
            </a>
          </div>
        </div>
      </div>
      <a href="./dashboard/index.php">
        <button class="absolute top-4 right-4 z-10 rounded-lg bg-orange-600 px-6 py-3 font-semibold">
          Dashboard
        </button>
      </a>
      <div class="h-full w-full absolute z-[1] top-0 left-0"
        style="background: url('./asset/header.png') center/cover no-repeat"></div>
    </section>

    <section class="relative min-h-[100vh] bg-[#191a19] py-20 text-white" id="services">
      <div class="container mx-auto flex flex-col gap-28">
        <div class="flex">
          <div class="flex items-center gap-2">
            <p class="text-5xl font-semibold text-orange-600">1+</p>
            <p class="w-1/2">Years of Experience</p>
          </div>
          <div class="flex items-center gap-2">
            <?php
            // Query untuk menghitung jumlah total produk
            $sql = "SELECT COUNT(*) AS total_produk FROM produk";

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $totalProduk = $row["total_produk"];

              // Tampilkan jumlah total produk
              echo "<p class='text-5xl font-semibold text-orange-600'>" . $totalProduk . "+</p>";
            } else {
              echo "Error mengambil total produk";
            }
            ?>
            <p class="w-1/2">Product ready Selling</p>
          </div>
          <div class="flex items-center gap-2">
            <?php
            // Query untuk menghitung jumlah total transaksi
            $sql = "SELECT COUNT(*) AS total_transaksi FROM transaksi";

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $totalTransaksi = $row["total_transaksi"];

              // Tampilkan jumlah total transaksi
              echo "<p class='text-5xl font-semibold text-orange-600'>" . $totalTransaksi . "+</p>";
            } else {
              echo "Error mengambil total transaksi";
            }
            ?>
            <p class="w-1/2">Global Transaction</p>
          </div>
        </div>
        <div class="grid grid-cols-2">
          <img src="./asset/people.png" alt="people" class="absolute bottom-0 left-10 h-[700px]" />
          <div></div>
          <div class="flex flex-col gap-8">
            <h1 class="text-6xl font-semibold">
              <span class="text-orange-600">1 years</span> <br />
              of experience!
            </h1>
            <div class="flex flex-col gap-4">
              <p class="text-lg">
                We have a team of experienced professionals who have been in
                the industry for over 1 years. Our contractors have a wealth
                of knowledge and skills that they have acquired over the
                years, making them experts in their field.
              </p>
              <p class="text-lg">
                With 1 years of experience, our contractors have a deep
                understanding of industry standards and regulations. We ensure
                that all our projects comply with the latest safety and
                building codes, and that the final product meets or exceeds
                our client&apos;s expectations.
              </p>
            </div>
            <p>Nizarudin</p>
          </div>
        </div>
        <div class="absolute -top-20 right-10 flex z-[4] flex-col gap-4 rounded-xl bg-orange-600 p-10">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p>Quality Control System, 100% Satisfaction Guarantee</p>
          </div>
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p>Highly Proffesional Staff, Accurate Testing Processes</p>
          </div>
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p>Unrivalled Workmanship, Proffesional and Qualified</p>
          </div>
        </div>
      </div>
    </section>

    <section class="h-[100vh] bg-orange-600 py-20" id="produk">
      <div class="container mx-auto">
        <h1 class="text-6xl font-semibold text-[#191a19]">Product on <span class="text-white italic">Nizar-Props</span>
        </h1>
        <div class="grid grid-cols-4 gap-4 pt-12">
          <?php
          $sql = "SELECT produk.*, kategori.nama_kategori 
                    FROM produk 
                    LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori";
          $result = mysqli_query($conn, $sql);

          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<div class='flex flex-col items-center rounded-xl bg-[#191a19]/10 hover:bg-[#191a19] transition-all hover:-translate-y-1 duration-300 gap-4 p-4'>";
              echo "<p class='text-sm'>" . $row["nama_kategori"] . "</p>";
              echo "<img src='" . $row["gambar_produk"] . "' alt='produk' class='h-[200px] w-[300px] object-cover' />";
              echo "<h1 class='text-lg font-semibold'>" . $row["nama_produk"] . "</h1>";
              echo "</div>";
            }
          } else {
            echo "<p>0 results</p>";
          }
          ?>
        </div>
      </div>
    </section>

  </main>
</body>

</html>