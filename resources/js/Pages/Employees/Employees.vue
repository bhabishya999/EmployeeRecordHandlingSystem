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
import axios from "axios";
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
      total: 12,
      pageNumber: this.$route.query.pageNumber
        ? parseInt(this.$route.query.pageNumber)
        : 1,
      search: "",
    };
  },
  computed: {
    filterdlist() {
      return this.employeeList.filter((list) =>
        list.first_name.toLowerCase().includes(this.search.toLowerCase())
      );
    },
  },

  components: {
    Details,
    NavBar,
    EmployeeList,
    EmployeeListHeader,
    Pagination,
  },
  // created() {},
  created() {
    const token = localStorage.getItem("talent_token");
    const api = "http://talent.local/api/employees";

    axios
      .get(api, { headers: { Token: `Bearer ${token}` } })
      .then((response) => {
        console.log(response, "abc");
      })

      .catch((error) => {
        console.log(error);
      });
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
    getData() {
      axios
        .get(`https://reqres.in/api/users?page=${this.pageNumber}`)
        .then((result) => {
          this.employeeList = result.data.data;
          this.total = result.data.total;
        })
        .catch((error) => {
          alert(error);
        });
    },
  },

  async mounted() {
    this.pageNumber = 1;
    await this.getData();
  },
};
</script>
