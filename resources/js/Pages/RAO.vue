<template>
  <header class="w-full h-[96px] bg-white">
    <div class="h-[64px]"></div>
    <div class="h-[32px] bg-[#852232]"></div>
  </header>

  <div class="flex"> 
      <aside class="w-[235px] h-[calc(100vh-96px)] bg-white p-[32px] shadow-md">
          <h1 class="">Sidebar</h1>
      </aside>
      <main class="flex-1 p-[32px]">
        <div class="w-2/3">
          <LineGraph :categories="propertiesGraph.categories" :rawSeries="propertiesGraph.series"></LineGraph>
        </div>
      </main>
  </div>
</template>

<script>
import LineGraph from "./Graphs/LineGraph.vue";
export default {
  mounted() {
    axios
      .get('rao/get_public_offfers')
      .then(response => {
        let data = response.data;
        this.propertiesGraph.categories = data.categories;
        this.propertiesGraph.series = data.series;
      })
  },

  data: () => ({
    propertiesGraph:{
      categories: [],
      series: [],
    }
  }),

  components:{
    LineGraph
  }
};
</script>