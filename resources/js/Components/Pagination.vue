<template>
  <div>
    <div class="text-dark_gray-300 py-10 flex">
      <button
        :disabled="page_Number <= 1"
        v-on:click="prev(page_Number - 1)"
        class="pagination-button flex flex-row text-dark_blue h-[35px] w-[55px] text-center justify-center items-center rounded not-italic font-bold text-sm"
      >
        <svg
          width="8"
          height="14"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M7 13 1 7l6-6"
            stroke="#718096"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
        &nbsp;&nbsp; Prev
      </button>

      <div v-for="(item, index) in new Array(setPagination)" :key="index">
        <button
          :class="[
            'pagination-button',

            index + 1 == $route.query.page ? 'active' : '',
          ]"
          v-on:click="buttons(index + 1)"
          class="text-light_cyanblue ml-7 h-[35px] w-[55px] text-center justify-center items-center rounded not-italic font-bold text-sm border border-solid border-slate-200"
        >
          {{ index + 1 }}
        </button>
      </div>

      <button
        :disabled="page_Number >= setPagination"
        v-on:click="buttons(page_Number + 1)"
        class="pagination-button flex flex-row text-primary ml-7 h-[35px] w-[55px] text-center justify-center items-center rounded not-italic font-bold text-sm"
      >
        Next &nbsp;&nbsp;

        <svg
          width="8"
          height="14"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="m1 13 6-6-6-6"
            stroke="#4C51BF"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: "Pagination",

  data() {
    return {
      pageNumber: 1,
      row_per_page: 15,
    };
  },
  computed: {
    setPagination() {
      return Math.ceil(this.total / this.row_per_page);
    },
  },
  watch: {
    page_Number: function (value) {
      console.log(value);
    },
  },

  props: {
    total: {
      required: true,
      type: Number,
    },
    page_Number: {
      required: true,
      type: Number,
    },
  },

  methods: {
    buttons(page) {
      this.$emit("pageClick", page);
    },

    prev(page) {
      if (this.page == 0) {
        return;
      }
      this.$emit("pageDecrease", page);
    },
  },

  mounted() {},
};
</script>
<style>
.pagination-button {
  cursor: pointer;
}

.active {
  background-color: #4c51bf !important;
  cursor: auto;
  color: white;
}
</style>
