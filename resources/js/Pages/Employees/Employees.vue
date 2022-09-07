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
        <template
          v-slot:total
          v-for="total in total"
          :key="total"
          :total="total"
          >{{ total }}</template
        >
        <template v-slot:filter>
          <select
            name="status"
            id="status"
            :key="status"
            @change="filterstatus($event)"
            class="border-transparent focus:border-transparent focus:ring-0 outline-0 scroll-smooth border drop-shadow justify-between rounded-md h-[37px] w-[130px] text-primary text-center justify-center items-center pr-16"
          >
            &nbsp;&nbsp;

            <option v-for="status in status" v-bind:value="status.status">
              {{ status.status }}
            </option>
          </select>
        </template>

        <div
          class="h-[37px] w-[220px] pl-2 border border-primary shadow-sm rounded-md flex justify-center items-center text-center bg-white font-sans not-italic font-bold text-base"
        >
          <button type="submit">
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
          </button>
          <input
            v-model="search"
            type="text"
            placeholder="Search by name"
            v-on:keyup.enter="onSubmit"
            class="border-0 h-[20px] w-[160px] placeholder:text-light_cyanblue pl-2 text-black rounded-md border-transparent focus:border-transparent focus:ring-0"
          />
        </div>
      </EmployeeListHeader>

      <EmployeeList v-for="list in filteredlist" :key="list.id" :list="list">
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
      total: [],
      pageNumber: this.$route.query.pageNumber
        ? parseInt(this.$route.query.pageNumber)
        : 1,
      search: "",
      seen: false,

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
    filteredlist() {
      return this.employeeList.filter((list) => {
        var fullname = list.first_name.trim() + " " + list.last_name.trim();
        return (
          list.first_name.toLowerCase().match(this.search.toLowerCase()) ||
          list.last_name.toLowerCase().match(this.search.toLowerCase()) ||
          fullname
            .toLowerCase()
            .match(this.search.toLowerCase().replace(/\s+/g, " ")) ||
          list.email.toLowerCase().match(this.search.toLowerCase())
        );
      });
    },
  },

  components: {
    Details,
    NavBar,
    EmployeeList,
    EmployeeListHeader,
    Pagination,
  },

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

    onSubmit() {
      axios
        .get(`/employees?search=${this.search}`)
        .then((result) => {
          this.filteredlist = result.data.data;
        })
        .catch((error) => {
          alert(error);
        });
    },

    filterstatus(status) {
      var filterdata = status.target.value;

      if (filterdata == "All") {
        filterdata = "";
      }
      axios
        .get(`/employees?filter=${filterdata}`)
        .then((result) => {
          console.log(result, "aaa");
          this.employeeList = result.data.data;
          this.total = result.data.data.length;
        })
        .catch((error) => {
          alert(error);
        });
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
