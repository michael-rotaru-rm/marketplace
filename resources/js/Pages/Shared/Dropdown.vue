<template>
  <div class="custom-select relative block min-w-[200px] ml-2">
    <div v-if="items.length" class="relative mr-2 z-10">
      <button
        type="button"
        class="bg-white px-5 py-2.5 rounded-md shadow text-sm w-full text-left"
        @click="isOpen = !isOpen"
      >
        <span>{{ selected.name }}</span>
        <span class="float-right" aria-hidden="true">&darr;</span>
      </button>

      <div
        v-if="isOpen"
        class="
          absolute
          left-0
          mt-2
          w-40
          bg-white
          rounded
          shadow-md
          overflow-hidden
        "
      >
        <div v-if="selected.slug">
          <button
            type="button"
            @click="
              handleSelect('', '');
              isOpen = false;
            "
            class="
              block
              w-full
              px-4
              py-2
              text-left text-sm
              hover:bg-blue-700 hover:text-white
            "
          >
            Clear selection
          </button>
        </div>
        <div v-for="item in items" :key="item.id">
          <button
            type="button"
            @click="
              handleSelect(item.name,item.slug);
              isOpen = false;
            "
            class="
              block
              w-full
              px-4
              py-2
              text-left text-sm
              hover:bg-blue-700 hover:text-white
            "
          >
            {{ item.name }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            selected:{
                name: this.label,
                slug:'',
            },
            isOpen: false,
        };
    },

    mounted() {
        let that = this;
        this.items.filter(function(item){
            if(item.slug == that.initialSelected){
                that.selected.name = item.name;
                that.selected.slug = item.slug;
                return true;
            }
        })
    },

    watch: {
        initialSelected(newVal,oldVal){
            if(newVal == ''){
                this.selected.name = this.label;
                this.selected.slug = '';
                this.isOpen = false;
            }
        },
    },

    methods: {
        handleSelect: function(name,slug){
            this.selected.name = name;
            this.selected.slug = slug;
            this.$emit("onSelected",slug)
        }       
    },

    props: {
        items: Object,
        label: String,
        initialSelected: String,
    },
};
</script>


