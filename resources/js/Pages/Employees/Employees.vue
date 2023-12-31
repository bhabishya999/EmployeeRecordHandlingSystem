<template>
  <div class="flex">
    <div class="w-[237px]">
      <SideNavigationBar />
    </div>
    <div class="w-full">
      <NavBar>
        <template v-slot:headerName :headerName="headerName"
          >EMPLOYEES</template
        >
      </NavBar>
      <div class="h-7">
        <div
          v-show="showSuccess"
          class="w-full h-7 flex justify-center items-center bg-dark_green"
        >
          <svg
            width="20"
            height="12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M18.51 1 6.472 10.625 1 6.25"
              stroke="#fff"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <p class="font-bold pl-2 text-lg text-white">
            Employee has been sucessfully added.
          </p>
        </div>

        <div
          v-show="importSuccess"
          class="w-full h-7 flex justify-center items-center bg-dark_green"
        >
          <svg
            width="20"
            height="12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M18.51 1 6.472 10.625 1 6.25"
              stroke="#fff"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <p class="font-bold pl-2 text-lg text-white">
            Data has been imported sucessfully.
          </p>
        </div>
      </div>

      <div class="px-10">
        <div
          class="
            bg-white
            w-full
            drop-shadow-[0_1px_2px_rgba(0,0,0,0.06)_0_10px_15px_rgba(0,0,0,0.1)]
          "
        >
          <EmployeeListHeader>
            <div
              class="
                h-[37px]
                w-[220px]
                pl-2
                border border-primary
                shadow-sm
                rounded-md
                flex
                justify-center
                items-center
                text-center
                bg-white
                font-sans
                not-italic
                font-bold
                text-base
              "
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
                v-on:keyup.enter="filterSearch"
                class="
                  border-0
                  h-[20px]
                  w-[160px]
                  placeholder:text-light_cyanblue
                  pl-2
                  text-black
                  rounded-md
                  border-transparent
                  focus:border-transparent focus:ring-0
                "
              />
            </div>
          </EmployeeListHeader>

          <EmployeeList
            v-for="list in employeeList"
            :key="list.id"
            :list="list"
          >
          </EmployeeList>
        </div>

        <div class="flex justify-center">
          <Pagination
            v-on:pageClick="pageChange($event)"
            v-on:pageDecrease="prev($event)"
            :page_Number="pageNumber"
            :total="total"
          >
          </Pagination>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Details from "@/Layouts/Details.vue";
import NavBar from "@/Components/NavBar.vue";
import EmployeeList from "@/Components/EmployeeList.vue";
import EmployeeListHeader from "@/Components/EmployeeListHeader.vue";
import Pagination from "@/Components/Pagination.vue";
import SideNavigationBar from "@/Components/SideNavigationBar.vue";
export default {
  name: "Employees",

  data() {
    return {
      showSuccess: false,
      importSuccess: false,
      employeeList: [],

      total: [],
      pageNumber: this.$route.query.pageNumber
        ? parseInt(this.$route.query.pageNumber)
        : 1,
      search: "",

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
        {
          status: "Development",
        },
        {
          status: "QA",
        },
        {
          status: "Product",
        },
        {
          status: "Sales",
        },
        {
          status: "Design",
        },
        {
          status: "Marketing",
        },
      ],
    };
  },

  components: {
    Details,
    NavBar,
    EmployeeList,
    EmployeeListHeader,
    Pagination,
    SideNavigationBar,
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

    filterSearch() {
      axios
        .get(`/employees?search=${this.search}`)
        .then((result) => {
          this.employeeList = result.data.data;
          this.total = result.data.meta.total;
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
          this.employeeList = result.data.data;
          this.total = result.data.meta.total;
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
    this.importSuccess = localStorage.getItem("importSuccess");
    localStorage.removeItem("importSuccess");
    this.showSuccess = localStorage.getItem("showSuccess");
    localStorage.removeItem("showSuccess");
    this.pageNumber = 1;
    this.getData();
  },
};
</script>

<style></style>
