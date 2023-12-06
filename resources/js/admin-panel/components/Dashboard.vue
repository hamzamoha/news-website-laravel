<template>
    <div class="p-8 text-slate-700">
        <h1 class="text-center pb-6 text-6xl font-black uppercase">
            Dashboard
        </h1>
        <div class="p-5 border rounded-lg shadow">
            <h3 class="py-1 text-2xl font-bold">Website Visitors</h3>
            <div class="h-[350px]">
                <Line 
                    :data="{
                        labels:chart_data.website_visitors.labels,
                        datasets:[{label:'Views',backgroundColor:'#0f172a',borderColor:'#0f172a',data:chart_data.website_visitors.data,cubicInterpolationMode:'monotone',fill:{target:'origin',above:'rgb(15,23,42,.2)',}}]
                        }" 
                    :options="{
                        plugins:{legend:{display:false}},
                        responsive:true,maintainAspectRatio:false,
                        scales:{x:{grid:{display:false}},y:{min:0,max:120,ticks:{stepSize:25}}}
                        }"
                />
            </div>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4 my-4">
            <div class="p-3 rounded bg-sky-400 text-white shadow">
                <div class="py-4 text-xl items-center font-semibold flex flex-wrap">
                    <span>Visitors Today</span>
                    <span class="ml-auto text-5xl font-normal">306</span>
                </div>
                <div class="h-44 py-8 px-2">
                    <Line 
                    :data="{
                        labels:['','','','','','',''],
                        datasets:[{label:'Views',backgroundColor:'#38bdf8',borderColor:'#e2e8f0',data:[152,265,322,199,54,123,306],pointRadius:5,pointHoverRadius:5}]
                    }"
                    :options="{
                        plugins:{legend:{display:false}},
                        responsive:true,maintainAspectRatio:false,
                        scales:{x:{display:false},y:{display:false}}
                    }"
                    />
                </div>
            </div>
            <div class="p-3 rounded bg-cyan-500 text-white shadow">
                <div class="py-4 text-xl items-center font-semibold flex flex-wrap">
                    <span>Visitors This Week</span>
                    <span class="ml-auto text-5xl font-normal">2,157</span>
                </div>
                <div class="h-44 py-8 px-2">
                    <Line 
                    :data="{
                        labels:['','','','','','',''],
                        datasets:[{label:'Views',backgroundColor:'#06b6d4',borderColor:'#e2e8f0',data:[1895,2101,1925,2155,2215,2325,2157],pointRadius:5,pointHoverRadius:5}]
                    }"
                    :options="{
                        plugins:{legend:{display:false}},
                        responsive:true,maintainAspectRatio:false,
                        scales:{x:{display:false},y:{display:false}}
                    }"
                    />
                </div>
            </div>
            <div class="p-3 rounded bg-teal-600 text-white shadow">
                <div class="py-4 text-xl items-center font-semibold flex flex-wrap">
                    <span>Visitors This Month</span>
                    <span class="ml-auto text-5xl font-normal">9,715</span>
                </div>
                <div class="h-44 py-8 px-2">
                    <Line 
                    :data="{
                        labels:['','','','','','',''],
                        datasets:[{label:'Views',backgroundColor:'#0d9488',borderColor:'#e2e8f0',data:[11900,10900,11500,12000,11500,12000,10000],pointRadius:5,pointHoverRadius:5}]
                    }"
                    :options="{
                        plugins:{legend:{display:false}},
                        responsive:true,maintainAspectRatio:false,
                        scales:{x:{display:false},y:{display:false}}
                    }"
                    />
                </div>
            </div>
            <div class="p-3 rounded bg-emerald-700 text-white shadow flex items-center justify-center text-center flex-col">
                <div class="py-4 text-xl items-center font-semibold">Visitors of All Time</div>
                <div class="text-6xl pb-5 font-normal">251,144</div>
            </div>
        </div>
    </div>
</template>
<script>
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
  Filler
} from 'chart.js'
import { Line } from 'vue-chartjs'
ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
  Filler
)
export default {
    name: "Dashboard",
    components: {Line},
    data() {
        return {
            chart_data: {
                website_visitors: {
                    labels: ['Jan 2022', 'Feb 2022', 'Mar 2022', 'Apr 2022', 'May 2022', 'Jun 2022', 'Jul 2022', 'Aug 2022', 'Sep 2022', 'Oct  2022', 'Nov 2022', 'Dec 2022', 'Jan 2023', 'Feb 2023', 'Mar 2023', 'Apr 2023', 'May 2023', 'Jun 2023', 'Jul 2023', 'Aug 2023', 'Sep 2023', 'Oct  2023', 'Nov 2023', 'Dec 2023'],
                    data: [50, 60, 70, 50, 80, 90, 68, 75, 67, 85, 80, 65, 70, 56, 75, 80, 80, 60, 70, 50, 80, 90, 68, 75,]
                }
            }
        }
    },
}
</script>