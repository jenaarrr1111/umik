<x-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <header>
        <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
    </header>
<!-- Required chart.js -->
<div class="shadow-lg rounded-lg overflow-hidden">
    <div class="py-3 px-5 bg-gray-50 font-bold">Januari
      <canvas id="chartBar" height="35" style="display: block; box-sizing: border-box; width: 100px;"class="pl-24""></canvas></div>
    </div>

<div class="shadow-lg rounded-lg overflow-hidden">
    <div class="py-3 px-5 bg-gray-50 font-bold">Februari
      <canvas id="chartBar1" height="35" style="display: block; box-sizing: border-box; width: 100px;"class="pl-24""></canvas></div>
</div>

<!-- Chart bar -->
<script>
  const labelsBarChart = [
    "Umkm 1",
    "Umkm 2",
    "Umkm 3",
    "Umkm 4",
    "Umkm 5",
    "Umkm 6",
  ];
  const labelsBarChart1 = [
    "Umkm 1",
    "Umkm 2",
    "Umkm 3",
    "Umkm 4",
    "Umkm 5",
    "Umkm 6",
  ];
  const dataBarChart = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "Penjualan Terbanyak per Bulan",
        size: 10,
        barThickness: 30,
        backgroundColor: "hsl(197.2, 94.7%, 22.4%, 0.75)",
        borderColor: "hsl(197.2, 94.7%, 22.4%, 0.75)",
        data: [110, 87, 64, 41, 37, 30, 27],
      },
    ],
  };

  const dataBarChart1 = {
    labels: labelsBarChart1,
    datasets: [
      {
        label: "Penjualan Terbanyak per Bulan",
        size: 10,
        barThickness: 30,
        backgroundColor: "hsl(197.2, 94.7%, 22.4%, 0.75)",
        borderColor: "hsl(197.2, 94.7%, 22.4%, 0.75)",
        data: [110, 87, 64, 41, 37, 30, 27],
      },
    ],
  };

  const configBarChart = {
    type: "bar",
    data: dataBarChart,
    options: {},
  };
   
  const configBarChart1 = {
    type: "bar",
    data: dataBarChart1,
    options: {},
  };


  var chartBar = new Chart(
    document.getElementById("chartBar"),
    configBarChart
  );
  


  var chartBar = new Chart(
    document.getElementById("chartBar1"),
    configBarChart1
  );
</script>



</x-layout>
