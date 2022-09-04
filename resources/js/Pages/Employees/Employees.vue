<template>
  <NavBar />

  <div
    class="h-[36px] w-full flex flex-row justify-center items-center bg-dark_green"
  >
    <svg width="20" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M18.51 1 6.472 10.625 1 6.25"
        stroke="#fff"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <p
      class="font-sans not-italic font-bold text-lg text-white h-[24px] w-[321px]"
    >
      Employee has been sucessfully added.
    </p>
  </div>

  <div class="min-h-screen bg-light_blue pl-10 pr-10">
    <div
      class="bg-white w-full drop-shadow-[0_1px_2px_rgba(0,0,0,0.06)_0_10px_15px_rgba(0,0,0,0.1)]"
    >
      <EmployeeListHeader>
        <template v-slot:filter>
          <div class="flex flex-row text-center justify-center mt-1">
            <input
              v-model="searchfilter"
              type="text"
              placeholder="Search"
              class="h-[26px] w-[120px] border-transparent focus:border-transparent focus:ring-0"
            />

            <button class="pr-4" id="cmnt" v-on:click="seen = !seen">
              <svg
                width="14"
                height="9"
              >
                <path
                  d="m1 1.5 6 6 6-6"
                  stroke="#4C51BF"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
          </div>

          <div
            v-if="seen"
            id="hide"
            class="mt-1 bg-white border pr-28 rounded w-[170px] shadow-sm"
          >
            <div
              v-for="status in status"
              :key="status"
              v-on:click="statusfilter(status)"
            >
              {{ status.status }}
            </div>
          </div>
        </template>

        <div
          class="h-[37px] w-[220px] pl-2 border border-primary shadow-sm rounded-md flex justify-center items-center text-center bg-white font-sans not-italic font-bold text-base"
        >
          <svg
            width="13"
            height="14"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M5.823 11.667c2.663 0 4.821-2.388 4.821-5.334C10.644 3.388 8.486 1 5.823 1S1 3.388 1 6.333c0 2.946 2.159 5.334 4.822 5.334ZM11.85 13l-2.622-2.9"
              stroke="#A0AEC0"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <input
            v-model="search"
            type="text"
            placeholder="Search by name"
            class="border-0 h-[20px] w-[160px] placeholder:text-light_cyanblue pl-2 text-black rounded-md border-transparent focus:border-transparent focus:ring-0"
          />
        </div>
      </EmployeeListHeader>

      <EmployeeList v-for="list in filterdlist" :key="list.id" :list="list">
      </EmployeeList>
    </div>

    <Pagination
      v-on:pageClick="pageChange($event)"
      v-on:pageDecrease="prev($event)"
      :page_Number="pageNumber"
      :total="total"
    >
    </Pagination>
  </div>
</template>
<script>
import axios from "@/axios";
import Details from "@/Layouts/Details.vue";
import NavBar from "@/Components/NavBar.vue";
import EmployeeList from "@/Components/EmployeeList.vue";
import EmployeeListHeader from "@/Components/EmployeeListHeader.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
  name: "Employees",

  data() {
    return {
      employeeList: [],
      el: "#hide",
      total: 12,
      pageNumber: this.$route.query.pageNumber
        ? parseInt(this.$route.query.pageNumber)
        : 1,
      search: "",
      seen: false,
      searchfilter: "",
      status: [
        {
          status: "All",
        },
        {
          status: "Active",
        },
        {
          status: "Alumni",
        },
      ],
    };
  },
  computed: {
    filterdlist() {
      return this.employeeList.filter(
        (list) =>
          list.first_name &&
          list.email.toLowerCase().includes(this.search.toLowerCase())
      );
    },
    statusfilter(status) {
      this.employeeList = [];
      if (status !== "All") {
        this.employeeList = this.employeeList.filter((list) => {
          return list.status === status;
        });
      }
    },
  },

  components: {
    Details,
    NavBar,
    EmployeeList,
    EmployeeListHeader,
    Pagination,
  },

  created() {},

  methods: {
    pageChange(page) {
      this.pageNumber = page;
      this.$router.push({
        path: "/employees",
        query: { page: this.pageNumber },
      });
      this.getData();
    },

    prev(page) {
      this.pageNumber = page;
      this.$router.push({
        path: "/employees",
        query: { page: this.pageNumber },
      });
      this.getData();
    },

    getData() {
      axios
        .get(`/employees?page=${this.pageNumber}`)
        .then((result) => {
          this.employeeList = result.data.data;
          this.total = result.data.meta.total;
        })

        .catch((error) => {
          alert(error);
        });
    },
  },

  mounted() {
    this.pageNumber = 1;
    this.getData();
  },
};
</script>

<style>
@import url(https://cdn.syncfusion.com/ej2/material.css);
</style>
