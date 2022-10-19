<template>
  <div
    class="
      h-[87px]
      w-full
      flex flex-row
      justify-between
      items-center
      px-40
      bg-white
    "
  >
    <router-link
      to="/employees"
      class="flex flex-col py-6 items-center justify-center text-center"
    >
      <svg
        width="33"
        height="33"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <circle cx="16.5" cy="16.5" r="16.5" fill="url(#a)" />
        <path
          d="M16.443 21.523c.346-1.728.092-3.39.01-4.975-.004 0-.006.002-.008.004.002-.002.004-.004.004-.009-1.588-.043-3.253-.256-4.973.13-2.188.493-3.836 2.315-3.803 4.574.018 1.155.52 2.18 1.313 2.942.78.774 1.818 1.254 2.972 1.243 2.261-.02 4.044-1.707 4.485-3.909ZM16.539 11.474c-.338 1.73-.075 3.389.013 4.975.004 0 .006-.002.009-.004-.003.002-.005.004-.005.008 1.589.035 3.254.242 4.973-.153 2.187-.504 3.825-2.333 3.781-4.594-.021-1.155-.53-2.178-1.327-2.936-.784-.771-1.825-1.244-2.98-1.229-2.258.033-4.035 1.729-4.464 3.933Z"
          fill="#fff"
        />
        <path
          d="M10.865 14.571c1.382.27 2.705.06 3.974-.013 0-.004-.002-.006-.002-.006.002.002.002.004.006.004.027-1.268.19-2.598-.125-3.972-.405-1.746-1.866-3.054-3.671-3.017-.923.018-1.74.425-2.344 1.06-.616.627-.993 1.46-.98 2.38.027 1.805 1.383 3.223 3.142 3.564ZM22.084 18.438c-1.383-.27-2.706-.059-3.974.013a.01.01 0 0 0 .002.007c-.002-.002-.002-.004-.007-.004-.026 1.268-.19 2.598.125 3.972.403 1.746 1.867 3.054 3.67 3.016.922-.017 1.739-.425 2.344-1.06.615-.627.992-1.46.979-2.38-.024-1.802-1.38-3.22-3.14-3.564Z"
          fill="#E5E5E5"
        />
        <path
          d="M16.443 21.523c.346-1.728.092-3.39.01-4.975-.004 0-.006.002-.008.004.002-.002.004-.004.004-.009-1.588-.043-3.253-.256-4.973.13-2.188.493-3.836 2.315-3.803 4.574.018 1.155.52 2.18 1.313 2.942.78.774 1.818 1.254 2.972 1.243 2.261-.02 4.044-1.707 4.485-3.909ZM16.539 11.474c-.338 1.73-.075 3.389.013 4.975.004 0 .006-.002.009-.004-.003.002-.005.004-.005.008 1.589.035 3.254.242 4.973-.153 2.187-.504 3.825-2.333 3.781-4.594-.021-1.155-.53-2.178-1.327-2.936-.784-.771-1.825-1.244-2.98-1.229-2.258.033-4.035 1.729-4.464 3.933Z"
          fill="#fff"
        />
        <path
          d="M10.865 14.571c1.382.27 2.705.06 3.974-.013 0-.004-.002-.006-.002-.006.002.002.002.004.006.004.027-1.268.19-2.598-.125-3.972-.405-1.746-1.866-3.054-3.671-3.017-.923.018-1.74.425-2.344 1.06-.616.627-.993 1.46-.98 2.38.027 1.805 1.383 3.223 3.142 3.564ZM22.084 18.438c-1.383-.27-2.706-.059-3.974.013a.01.01 0 0 0 .002.007c-.002-.002-.002-.004-.007-.004-.026 1.268-.19 2.598.125 3.972.403 1.746 1.867 3.054 3.67 3.016.922-.017 1.739-.425 2.344-1.06.615-.627.992-1.46.979-2.38-.024-1.802-1.38-3.22-3.14-3.564Z"
          fill="#E5E5E5"
        />
        <defs>
          <linearGradient
            id="a"
            x1="16.5"
            y1="0"
            x2="16.5"
            y2="33"
            gradientUnits="userSpaceOnUse"
          >
            <stop stop-color="#0457A2" />
            <stop offset="1" stop-color="#636363" />
          </linearGradient>
        </defs>
      </svg>
      <p class="font-bold text-xs leading-[150.69%]">
        IntroCept Employee <br />
        Portal
      </p>
    </router-link>
    <div>
      <div class="flex py-6 items-center text-center">
        <div class="mr-2 h-[44px] w-[44px]">
          <img :src="profile.avatar" alt="aa" class="rounded-full" />
        </div>
        <p
          class="
            text-[#1A202C] text-base
            font-semibold
            leading-[150.69%]
            mr-3.5
          "
        >
          {{ userdetail.name }}
        </p>
        <button
          @click="logout"
          type="button"
          class="
            bg-[#4C51BF]
            p-2
            rounded-md
            drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)]
            flex
            items-center
            justify-center
            text-white
          "
        >
          <svg
            width="18"
            height="19"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M6.167 17.25H2.722A1.722 1.722 0 0 1 1 15.528V3.472A1.722 1.722 0 0 1 2.722 1.75h3.445M12.194 13.805 16.5 9.5l-4.306-4.306M16.5 9.5H6.167"
              stroke="#fff"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <p class="pl-2 font-bold">Logout</p>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NavBar",
  components: {},
  data() {
    return {
      userdetail: [],
      profile: [],
    };
  },
  methods: {
    logout() {
      axios
        .post("logout")
        .then(() => {
          localStorage.clear();
          this.$router.push({
            path: "/login",
          });
        })
        .catch((error) => {
          alert(error);
        });
    },
    getData() {
      axios
        .get("/user/me")
        .then((result) => {
          this.userdetail = result.data.data;
          this.profile = this.userdetail.employees;
        })

        .catch((error) => {
          alert(error);
        });
    },
  },
  mounted() {
    this.getData();
  },
};
</script>
