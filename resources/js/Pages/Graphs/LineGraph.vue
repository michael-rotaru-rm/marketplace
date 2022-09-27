<template>
  <div class="chart-wrapper">
    <VueApexCharts ref="chart" type="line" height="350" :options="chartOptions" :series="series"></VueApexCharts>
  </div>
</template>

<script>
import VueApexCharts from "vue3-apexcharts";
export default {
  data: () => ({
    series: [],
    chartOptions: {
      chart: {
        height: 350,
        type: 'line',
        zoom: {
          enabled: false
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: [],
        curve: 'straight',
        dashArray: []
      },
      title: {
        text: 'Oferte publice',
        align: 'left'
      },
      legend: {
        tooltipHoverFormatter: function(val, opts) {
          return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
        }
      },
      markers: {
        size: 0,
        hover: {
          sizeOffset: 6
        }
      },
      xaxis: {
        categories: [],
      },
      tooltip: {
      },
      grid: {
        borderColor: '#f1f1f1',
      }
    },        
  }),

  watch: {
    categories(newVal,oldVal){
      this.$refs.chart.updateOptions({
        xaxis: {
          categories: newVal
        }
      })
    },

    rawSeries(newVal,oldVal){
      newVal.map((v,i)=>{
        this.chartOptions.stroke.width.push(3);
        this.chartOptions.stroke.dashArray.push(Math.random()*10);
        console.log(v)
        this.series.push({
          name: v.name,
          data: v.value,
        })
      })
    },
  },

  props: {
      categories: Array,
      rawSeries: Array
  },
  
  components:{
    VueApexCharts
  }
};
</script>