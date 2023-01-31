<x-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<header>
    <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
</header>

<main class="md:grid grid-cols-2 gap-x-12">

    <div class="flex items-baseline"> {{-- Nama UMKM --}}
        <h2 class="text-2xl font-bold my-2">Bakmie Hokki, Sehat</h2>
        <span class="ml-1"><svg width="30" height="17" viewBox="0 0 30 17" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect width="30" height="17" fill="url(#pattern0)"/> <defs><pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1"> <use xlink:href="#image0_838_105" transform="matrix(0.0062963 0 0 0.0111111 0.216667 0)"/> </pattern> <image id="image0_838_105" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAABWklEQVR4nO3avUoDQRRA4aPFHfXFBRGsLfQhLMI+kY2F4A+WkYWtQv5A9+7M7PlgId3ce9hkAwlIkiRJkiRJkiRJkiRJkupxMV1proFH4At4A+6AQr8KcA+8Az/AE3CTcfAYebtzbTqNXabddvd9nvvg8a3zuefgHmOXA5HH6xu4nHuAjwOH9xS7HIm8nRrM7uHIAD3ELicib6cGVQzSauxS224BvJwYaACuaEfUulO1g/W4S/UD9rRDM4P2MHtzA9PmzM0NHg3N2uwC0cCMzS8SFc/WzUJR4UzdLRYVzdLtglHBDCliwUVXE3nJhWNtkZdYfLWRMwOsPnJGCCMnBDFyQhgjJwSKtT/4zhV/CGXkhNjhnTz/nR1Gzvm5f9Pp3x1SxRl3qw++hWMPfruYP7aRE2IbOSH24MfF/LEHI/+/AtwCr9M1vvYrnCRJkiRJkiRJkiRJkiSJZL/HXxTfMSb/iQAAAABJRU5ErkJggg=="/></defs></svg></span>
    </div>

    <div class="flex items-center relative"> {{-- Filter Bulan --}}
        <div class="my-5 ml-auto after:content-[''] after:absolute after:inline-block after:w-28 after:h-[0.05rem] after:right-0 after:translate-y-[-1rem] after:translate-x-[0.2rem] after:bg-[rgba(9,47,105,0.28)] after:bottom-0 after:p-0 after:m-0">Bulan ini</div>
        <span class="ml-1"><svg width="30" height="17" viewBox="0 0 30 17" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <rect width="30" height="17" fill="url(#pattern0)"/> <defs><pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#image0_838_105" transform="matrix(0.0062963 0 0 0.0111111 0.216667 0)"/></pattern> <image id="image0_838_105" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAABWklEQVR4nO3avUoDQRRA4aPFHfXFBRGsLfQhLMI+kY2F4A+WkYWtQv5A9+7M7PlgId3ce9hkAwlIkiRJkiRJkiRJkiRJkupxMV1proFH4At4A+6AQr8KcA+8Az/AE3CTcfAYebtzbTqNXabddvd9nvvg8a3zuefgHmOXA5HH6xu4nHuAjwOH9xS7HIm8nRrM7uHIAD3ELicib6cGVQzSauxS224BvJwYaACuaEfUulO1g/W4S/UD9rRDM4P2MHtzA9PmzM0NHg3N2uwC0cCMzS8SFc/WzUJR4UzdLRYVzdLtglHBDCliwUVXE3nJhWNtkZdYfLWRMwOsPnJGCCMnBDFyQhgjJwSKtT/4zhV/CGXkhNjhnTz/nR1Gzvm5f9Pp3x1SxRl3qw++hWMPfruYP7aRE2IbOSH24MfF/LEHI/+/AtwCr9M1vvYrnCRJkiRJkiRJkiRJkiSJZL/HXxTfMSb/iQAAAABJRU5ErkJggg=="/></defs> </svg></span>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8 p-6 divide divide-y-2">
        {{-- Card Title --}}
        <div class="text-xl font-bold flex justify-between items-center mb-4">
            <div>Transaksi</div>
            <span><svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.69341 7.19041L2.76856 12.7137C2.35905 13.0954 1.69686 13.0954 1.2917 12.7137L0.307134 11.7958C-0.102378 11.4141 -0.102378 10.7968 0.307134 10.4191L4.50681 6.50406L0.307134 2.58903C-0.102378 2.20728 -0.102378 1.58997 0.307134 1.21228L1.28735 0.286317C1.69686 -0.0954389 2.35905 -0.0954389 2.7642 0.286317L8.68905 5.80959C9.10292 6.19135 9.10292 6.80865 8.69341 7.19041Z" fill="black"/></svg></span>
        </div> 
        <div class="grid gap-2"> {{-- Card Body--}}
            <div class="font-bold mt-4">
                Jumlah Transaksi
            </div>
            <div class="text-2xl font-bold">458</div>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8 p-6 divide divide-y-2">
        {{-- Card Title --}}
        <div class="text-xl font-bold flex justify-between items-center mb-4">
            <div>Penjualan Terlaris</div>
            <span><svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8.69341 7.19041L2.76856 12.7137C2.35905 13.0954 1.69686 13.0954 1.2917 12.7137L0.307134 11.7958C-0.102378 11.4141 -0.102378 10.7968 0.307134 10.4191L4.50681 6.50406L0.307134 2.58903C-0.102378 2.20728 -0.102378 1.58997 0.307134 1.21228L1.28735 0.286317C1.69686 -0.0954389 2.35905 -0.0954389 2.7642 0.286317L8.68905 5.80959C9.10292 6.19135 9.10292 6.80865 8.69341 7.19041Z" fill="black"/> </svg></span>
        </div> 
        <div class="grid gap-2"> {{-- Card Body--}}
            <div class="mt-4">
                <table class="w-full text-sm">
                    <thead class="bg-[rgba(9,47,105,0.28)] font-bold">
                        <th class="p-2">Menu</th>
                        <th class="p-2">Jumlah Terjual</th>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="p-2">Bakmie Ayam Madu</td>
                            <td class="p-2">57</td>
                        </tr>
                        <tr>
                            <td class="p-2">Bakmie Ayam Suwir</td>
                            <td class="p-2">24</td>
                        </tr>
                        <tr>
                            <td class="p-2">Pangsit Kukus</td>
                            <td class="p-2">17</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Required chart.js -->
    <div class="col-start-1 col-end-3 shadow-lg rounded-lg overflow-hidden mb-12 md:mx-8">
        <div class="py-3 px-5 bg-white font-bold">Januari
        <canvas id="chartBar" height="35" style="display: block; box-sizing: border-box; width: 100px;"class="pl-24 mr-28"></canvas></div>
    </div>
</main>

<!-- Chart bar -->
<script>
  const labelsBarChart = [
    "umkm 1",
    "umkm 2",
    "umkm 3",
    "umkm 4",
    "umkm 5",
    "umkm 6",
    "umkm 7"
  ];
  const labelsBarChart1 = [
    "umkm 1",
    "umkm 2",
    "umkm 3",
    "umkm 4",
    "umkm 5",
    "umkm 6",
    "umkm 7"
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
