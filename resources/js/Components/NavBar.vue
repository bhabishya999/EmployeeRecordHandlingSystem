<template>
  <div class="h-[87px]] flex justify-between items-center px-10 bg-white">
    <div>
      <h1 class="text-2xl text-[#4A5568] pt-5 pl-5 font-bold">
        <slot name="headerName"></slot>
      </h1>
    </div>

    <div class="mt-10">
      <div class="flex items-center">
        <div class="border p-2 rounded-full mr-5">
          <svg
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M12.857 15.082C14.7202 14.8614 16.5509 14.4217 18.311 13.772C16.8204 12.1208 15.9967 9.9745 16 7.75V7.05V7C16 5.4087 15.3679 3.88258 14.2426 2.75736C13.1174 1.63214 11.5913 1 10 1C8.4087 1 6.88258 1.63214 5.75736 2.75736C4.63214 3.88258 4 5.4087 4 7V7.75C4.00302 9.97463 3.17899 12.121 1.688 13.772C3.421 14.412 5.248 14.857 7.143 15.082M12.857 15.082C10.959 15.3071 9.04101 15.3071 7.143 15.082M12.857 15.082C13.0011 15.5319 13.0369 16.0094 12.9616 16.4757C12.8862 16.942 12.7018 17.384 12.4234 17.7656C12.1449 18.1472 11.7803 18.4576 11.3592 18.6716C10.9381 18.8856 10.4724 18.9972 10 18.9972C9.52762 18.9972 9.06192 18.8856 8.64081 18.6716C8.21969 18.4576 7.85507 18.1472 7.57662 17.7656C7.29817 17.384 7.11376 16.942 7.03841 16.4757C6.96306 16.0094 6.9989 15.5319 7.143 15.082"
              stroke="black"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <div class="flex border rounded-full px-2 py-1">
          <div class="pr-3">
            <p class="font-bold text-base">
              {{ userdetail.name }}
            </p>
            <p class="float-right text-sm text-[#BAB1B1]">Admin</p>
          </div>
          <div class="h-[44px] w-[44px]">
            <img :src="profile.avatar" class="rounded-full" />
          </div>
        </div>
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
