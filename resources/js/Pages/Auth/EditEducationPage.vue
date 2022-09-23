<script setup>
import Details from "@/Layouts/Details.vue";
</script>
    <template>
  <div>
    <NavBar />
    <div class="h-[24px] bg-slate-100"></div>
    <Details>
      <div class="p-9">
        <div class="flex justify-between items-center">
          <h1 class="text-black leading-normal text-2xl font-medium font-sans">
            EMPLOYEE DETAILS
          </h1>
          <router-link
            to="/employees"
            type="button"
            class="
              bg-indigo-700
              p-[7px]
              rounded-md
              drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)]
              flex
              items-center
              justify-center
              text-white
              font-bold
              text-base
              leading-normal
              font-sans
            "
          >
            <svg
              class="mr-[9px]"
              width="8"
              height="14"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M0 13.152V.848C0 .657.129.5.287.5h1.147c.158 0 .287.157.287.348v5.119L6.392.715c.493-.496 1.255-.081 1.255.714V12.57c0 .795-.762 1.21-1.255.714l-4.671-5.22v5.087c0 .191-.13.348-.287.348H.287c-.158 0-.287-.157-.287-.348Z"
                fill="#fff"
              />
            </svg>
            Back to List
          </router-link>
        </div>
        <div class="mt-[30px] mb-5">
          <ul class="flex">
            <li class="font-bold leading-normal text-lg py-2.5 px-1.5 mr-7">
              Personal Details
            </li>
            <li
              class="
                font-semibold
                leading-normal
                text-lg
                py-2.5
                px-1.5
                mr-7
                bg-indigo-700
                rounded-lg
                font-sans
                text-white
              "
            >
              Educational Details
            </li>
            <li class="font-bold leading-normal text-lg py-2.5 px-1.5">
              Key Employment Details
            </li>
          </ul>
        </div>
        <EditEducationalDetail />
      </div>
    </Details>
  </div>
</template>
    <script>
import NavBar from "@/Components/NavBar.vue";
import EditEducationalDetail from "@/Components/EditEducationalDetail.vue";

export default {
  name: "EditEducationalPage",
  Components: {
    NavBar,
    EditEducationalDetail,
  },
};
</script>
    