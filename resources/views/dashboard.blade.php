<x-layouts.app :title="__('Dashboard')">

{{-- make sure filament style xkacau --}}

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

     <!-- Header Row with Title and Dropdown -->
<div class="flex justify-between items-center w-full">
    <!-- Page Title -->
    <div class="text-slate-950 text-2xl font-semibold font-['Nunito']">Dashboard</div>

    <!-- Dropdown -->
    <div class="relative inline-block w-44">
        <select
            style="background-image: none;"
            class="block w-full appearance-none rounded-md border border-gray-300 bg-white px-3 py-1.5 pr-8 text-sm text-gray-700 shadow-sm focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-400 transition">
            <option value="all">Gold & Silver</option>
            <option value="gold">Gold</option>
            <option value="silver">Silver</option>
        </select>
    
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
            <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>
    
</div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Product -->
            <div class="flex items-center gap-4 p-4 bg-sky-950 rounded-md shadow outline outline-1 outline-sky-950">
                <div class="w-12 h-12 flex items-center justify-center bg-white rounded-md shadow">
                    <img class="w-8 h-8" src="{{ asset('/images/product.png') }}" />
                </div>
                <div>
                    <div class="text-orange-100 text-xs">Total Product</div>
                    <div class="text-white text-lg font-semibold">223</div>
                </div>
            </div>

            <!-- Total Stock -->
            <div class="flex items-center gap-4 p-4 bg-teal-600 rounded-md shadow outline outline-1 outline-teal-600">
                <div class="w-12 h-12 flex items-center justify-center bg-white rounded-md shadow">
                    <img class="w-8 h-8" src="{{ asset('/images/stock.png') }}" />
                </div>
                <div>
                    <div class="text-gray-300 text-xs">Total Stock</div>
                    <div class="text-white text-lg font-semibold">152</div>
                </div>
            </div>

            <!-- Low Stock Item -->
            <div class="flex items-center gap-4 p-4 bg-orange-400 rounded-md shadow outline outline-1 outline-orange-400">
                <div class="w-12 h-12 flex items-center justify-center bg-white rounded-md shadow">
                    <img class="w-8 h-8" src="{{ asset('/images/lowStock.png') }}" />
                </div>
                <div>
                    <div class="text-slate-300 text-xs">Low Stock Item</div>
                    <div class="text-white text-lg font-semibold">16</div>
                </div>
            </div>

            <!-- Out of Stock -->
            <div class="flex items-center gap-4 p-4 bg-rose-500 rounded-md shadow outline outline-1 outline-rose-500">
                <div class="w-12 h-12 flex items-center justify-center bg-white rounded-md shadow">
                    <img class="w-8 h-8" src="{{ asset('/images/stockout.png') }}" />
                </div>
                <div>
                    <div class="text-gray-300 text-xs">Out of Stock</div>
                    <div class="text-white text-lg font-semibold">10</div>
                </div>
            </div>
        </div>

        <!-- Sales & Recently Added -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Sales & Purchase Chart -->
            <div class="col-span-2 rounded-xl border border-neutral-200 p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-sm font-semibold text-gray-800">Sales & Purchase</h2>
                    <div class="flex items-center gap-2">
                        <!-- Filter buttons -->
                        <div class="flex gap-1">
                            <button class="text-xs border rounded px-2 py-1 text-black">1D</button>
                            <button class="text-xs border rounded px-2 py-1 text-black">1W</button>
                            <button class="text-xs border rounded px-2 py-1 text-black">1M</button>
                            <button class="text-xs border rounded px-2 py-1 text-black">3M</button>
                            <button class="text-xs border rounded px-2 py-1 text-black">6M</button>
                            <button class="text-xs border rounded px-2 py-1 bg-orange-400 text-white">1Y</button>
                        </div>
            
                       

                    </div>
                </div>
            
                <!-- ApexChart -->
                <div class="flex justify-between items-center mb-2">
                    {{-- <h2 class="text-sm font-semibold text-gray-800">Product Sold Comparison</h2> --}}
                  
                    
                </div>
                
                <div id="salesChart" class="h-64 w-full"></div>
                       <!-- Arrows with clearer text -->
                       <div class="flex justify-end gap-2 mt-4">
    <button id="prevBtn"
        class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded text-sm shadow-sm transition disabled:opacity-50">
        Previous
    </button>
    <button id="nextBtn"
        class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded text-sm shadow-sm transition disabled:opacity-50">
        Next
    </button>
</div>
            
            </div>
            
<!-- Recently Added Product -->
<div class="bg-white rounded-xl shadow px-4 py-5 w-full max-w-md">
    <h2 class="text-lg font-semibold text-neutral-900 font-['Poppins'] mb-5">Recently Added Product</h2>

    <!-- Scrollable container -->
    <div class="max-h-96 overflow-y-auto pr-2 space-y-6">
        <!-- Product Item -->
        <div class="flex items-start justify-between">
            <div class="flex gap-4">
                <img src="https://placehold.co/70x70" class="w-16 h-16 rounded-md object-cover" />
                <div class="space-y-1">
                    <div class="w-48 h-6 justify-start text-zinc-700 text-xs font-semibold font-['Inter'] leading-snug">5 Dinar MEEM</div>
                    <div class="justify-start text-gray-400 text-xs font-medium font-['Poppins']">SKU : T04-00006429 </div>
                    <div class="justify-start"><span class="text-gray-400 text-xs font-medium font-['Poppins']">By: </span><span class="text-orange-400 text-xs font-medium font-['Poppins']">Ahmad Rahimi</span></div>
                </div>
            </div>
            <div class="text-right  mr-2">
              <div class="text-zinc-500 text-xs font-normal font-['Inter'] leading-snug">Instock</div>
              <div class="text-red-500 text-xs font-normal font-['Inter'] leading-snug">05</div>
            </div>
        </div>

        <!-- Duplicate Product Item -->
        <div class="flex items-start justify-between">
            <div class="flex gap-4">
                <img src="https://placehold.co/70x70" class="w-16 h-16 rounded-md object-cover" />
                <div class="space-y-1">
                    <div class="w-48 h-6 justify-start text-zinc-700 text-xs font-semibold font-['Inter'] leading-snug">10 Dinar MEEM</div>
                    <div class="justify-start text-gray-400 text-xs font-medium font-['Poppins']">SKU : T04-00006429 </div>
                    <div class="justify-start"><span class="text-gray-400 text-xs font-medium font-['Poppins']">By: </span><span class="text-orange-400 text-xs font-medium font-['Poppins']">Ahmad Rahimi</span></div>
                </div>
            </div>
            <div class="text-right mr-2">
              <div class="text-zinc-500 text-xs font-normal font-['Inter'] leading-snug">Instock</div>
              <div class="text-red-500 text-xs font-normal font-['Inter'] leading-snug">05</div>
            </div>
        </div>


          <!-- Duplicate Product Item -->
          <div class="flex items-start justify-between">
            <div class="flex gap-4">
                <img src="https://placehold.co/70x70" class="w-16 h-16 rounded-md object-cover" />
                <div class="space-y-1">
                    <div class="w-48 h-6 justify-start text-zinc-700 text-xs font-semibold font-['Inter'] leading-snug">10 Dinar MEEM</div>
                    <div class="justify-start text-gray-400 text-xs font-medium font-['Poppins']">SKU : T04-00006429 </div>
                    <div class="justify-start"><span class="text-gray-400 text-xs font-medium font-['Poppins']">By: </span><span class="text-orange-400 text-xs font-medium font-['Poppins']">Ahmad Rahimi</span></div>
                </div>
            </div>
            <div class="text-right  mr-2">
              <div class="text-zinc-500 text-xs font-normal font-['Inter'] leading-snug">Instock</div>
              <div class="text-red-500 text-xs font-normal font-['Inter'] leading-snug">05</div>
            </div>
        </div>


          <!-- Duplicate Product Item -->
          <div class="flex items-start justify-between">
            <div class="flex gap-4">
                <img src="https://placehold.co/70x70" class="w-16 h-16 rounded-md object-cover" />
                <div class="space-y-1">
                    <div class="w-48 h-6 justify-start text-zinc-700 text-xs font-semibold font-['Inter'] leading-snug">10 Dinar MEEM</div>
                    <div class="justify-start text-gray-400 text-xs font-medium font-['Poppins']">SKU : T04-00006429 </div>
                    <div class="justify-start"><span class="text-gray-400 text-xs font-medium font-['Poppins']">By: </span><span class="text-orange-400 text-xs font-medium font-['Poppins']">Ahmad Rahimi</span></div>
                </div>
            </div>
            <div class="text-right  mr-2">
              <div class="text-zinc-500 text-xs font-normal font-['Inter'] leading-snug">Instock</div>
              <div class="text-red-500 text-xs font-normal font-['Inter'] leading-snug">05</div>
            </div>
        </div>


          <!-- Duplicate Product Item -->
          <div class="flex items-start justify-between">
            <div class="flex gap-4">
                <img src="https://placehold.co/70x70" class="w-16 h-16 rounded-md object-cover" />
                <div class="space-y-1">
                    <div class="w-48 h-6 justify-start text-zinc-700 text-xs font-semibold font-['Inter'] leading-snug">10 Dinar MEEM</div>
                    <div class="justify-start text-gray-400 text-xs font-medium font-['Poppins']">SKU : T04-00006429 </div>
                    <div class="justify-start"><span class="text-gray-400 text-xs font-medium font-['Poppins']">By: </span><span class="text-orange-400 text-xs font-medium font-['Poppins']">Ahmad Rahimi</span></div>
                </div>
            </div>
            <div class="text-right  mr-2">
              <div class="text-zinc-500 text-xs font-normal font-['Inter'] leading-snug">Instock</div>
              <div class="text-red-500 text-xs font-normal font-['Inter'] leading-snug">05</div>
            </div>
        </div>

        <!-- More product items... -->
    </div>
</div>

<!-- Recent Sales Today -->
<div class="lg:col-span-3 bg-white rounded-xl shadow  py-5 w-full overflow-x-auto">

    <h2 class="text-lg font-semibold text-neutral-900 font-['Poppins'] mb-4 ml-3">Sales Report</h2>

    {{-- <livewire:user-table/> --}}
</div>

<br><br>


        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
     


        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const categories = [
                    '5 Dinar MEEM',  '0.5g Raya Batik', '1/2 Dinar MEEM',
                    '1g Eid Edition', '0.25g Mini Gold', '5g Umrah Special',
                    '3g New Year', '1 Dinar Pearl',  '20g Premium','10g Jumbo','10 Dinar MEEM', '2 Dinar Classic'
                ];
        
                const seriesData = [32, 48, 15, 27, 22, 19, 12, 30, 45, 33, 21, 29];
        
                // Set which categories are silver
                const silverItems = [
                    '10 Dinar MEEM',
                    '2 Dinar Classic',
                    '10g Jumbo'
                ];
        
                let startIndex = 0;
                const visibleCount = 6;
        
                const chart = new ApexCharts(document.querySelector("#salesChart"), {
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: true,
                            tools: {
                                download: true,
                                selection: false,
                                zoom: false,
                                zoomin: false,
                                zoomout: false,
                                pan: false,
                                reset: false,
                            }
                        },
                        offsetX: 0,
                    },
                    grid: {
                        padding: {
                            left: 0,
                            right: -10,
                            bottom: -10
                        }
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '30px',
                            endingShape: 'flat',
                            distributed: true
                        }
                    },
                    series: [{
                        name: 'Units Sold',
                        data: seriesData.slice(startIndex, startIndex + visibleCount)
                    }],
                    xaxis: {
                        categories: categories.slice(startIndex, startIndex + visibleCount),
                        labels: {
                            rotate: -45,
                            trim: true,
                            maxHeight: 80,
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    colors: categories.slice(startIndex, startIndex + visibleCount).map(label =>
                        silverItems.includes(label) ? '#C0C0C0' : '#FBAE2C'
                    ),
                    dataLabels: { enabled: false },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    tooltip: {
                        y: {
                            formatter: (val) => val + " unit"
                        }
                    },
                    legend: {
                        show: false
                    }
                });
        
                setTimeout(() => {
        chart.render();
    }, 300);
        
                // Pagination
                document.getElementById("nextBtn").addEventListener("click", function () {
                    if (startIndex + visibleCount < categories.length) {
                        startIndex++;
                        updateChart();
                    }
                });
        
                document.getElementById("prevBtn").addEventListener("click", function () {
                    if (startIndex > 0) {
                        startIndex--;
                        updateChart();
                    }
                });
        
                function updateChart() {
                    const currentCategories = categories.slice(startIndex, startIndex + visibleCount);
                    const currentData = seriesData.slice(startIndex, startIndex + visibleCount);
        
                    chart.updateOptions({
                        xaxis: {
                            categories: currentCategories
                        },
                        colors: currentCategories.map(label =>
                            silverItems.includes(label) ? '#C0C0C0' : '#FBAE2C'
                        ),
                        series: [{
                            data: currentData
                        }]
                    });
                }
            });
            
        </script>
        
        
        
    </div>
</x-layouts.app>
