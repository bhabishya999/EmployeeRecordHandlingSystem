<script setup>
import { ref } from "vue";
</script>
    <template>
  <Form @submit="onSubmit" :validation-schema="schema">
    <div class="flex">
      <div class="w-2/3 mr-10">
        <div>
          <div class="flex flex-row justify-between mb-2.5">
            <div class="w-full mr-10">
              <single-select
                :options="organizations"
                name="organization"
                v-model="organization"
                key-prop="label"
                label-prop="label"
                label="Organization*"
              />
            </div>
            <div class="w-full">
              <custom-input
                v-model="joindates"
                type="date"
                name="joinDate"
                label="Join Date*"
                placeholder="DD-MM-YYYY"
              />
            </div>
          </div>
        </div>
        <div class="flex flex-row justify-between mb-2.5">
          <div class="w-full mr-10">
            <custom-input
              v-model="position"
              type="text"
              label="Curent Position*"
              name="position"
              placeholder="Enter Current Position"
            />
          </div>
          <div class="w-full">
            <single-select
              :options="workschedules"
              name="workschedule"
              v-model="workschedule"
              key-prop="label"
              label-prop="label"
              label="Work Schedule*"
            />
          </div>
        </div>
        <div class="mb-2.5">
          <single-select
            :options="teams"
            name="team"
            v-model="team"
            key-prop="label"
            label-prop="label"
            label="Team*"
          />
        </div>
        <div class="mb-2.5">
          <manager-singleselect
            :options="managerList"
            name="manager"
            v-model="manager"
            key-prop="label"
            label-prop="label"
            label="Manager*"
          />
        </div>
        <div class="mb-2.5">
          <label class="text-sm text-slate-500">Manages</label>
          <Multiselect
            class="bg-white pb-2 mt-2 pt-2"
            v-model="managesSelected"
            mode="tags"
            placeholder="Enter Manages"
            :close-on-select="true"
            :searchable="true"
            :options="managesList"
            :value="managesSelect"
            :classes="{
              tag: 'bg-[#F5F5F5] font-bold text-primary text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1',
              containerActive: 'ring ring-primary ring-2',
              tagsSearch:
                'absolute inset-0 border-none outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full',
              placeholder:
                'text-sm flex items-center h-full absolute text-slate-500 left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 text-gray-400 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5',
            }"
          >
            <template v-slot:option="{ option }">
              <span class="flex items-center">
                <img :src="option.avatar" class="rounded-full w-12 h-12 mr-3" />
                <div>
                  <p>{{ option.label }}</p>
                  <p class="text-sm text-primary">
                    {{ option.email }}
                  </p>
                </div>
              </span>
            </template>
          </Multiselect>
        </div>
        <div class="mb-2.5">
          <CustomInput
            v-model="powersList"
            type="text"
            label="Superpowers"
            name="superpowers"
            placeholder="Enter Superpowers"
          />
        </div>
      </div>
    </div>
    <div>
      <div class="flex flex-row-reverse items-center px-9 py-2.5">
        <Button
          type="submit"
          :isLoading="isLoading"
          :disabled="isLoading"
          :class="{
            'opacity-80 cursor-not-allowed': isLoading,
          }"
          class="
            bg-primary
            p-[7px]
            rounded-md
            drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)]
            flex
            items-center
            justify-center
            text-white
            font-bold
            text-base
            leading-[150%]
            font-sans
          "
        >
          Save Changes
        </Button>
        <button
          type="button"
          @click="togglePopUp"
          class="
            mr-2.5
            py-3
            px-12
            bg-slate-200
            rounded-md
            shadow
            text-base
            font-bold
          "
        >
          Cancel
        </button>
      </div>
    </div>
    <div
      v-show="showPopUp"
      class="fixed z-50 inset-0 w-full h-screen bg-black bg-opacity-50"
    >
      <div
        class="
          flex
          !items-stretch
          !justify-between
          absolute
          z-10
          top-1/2
          left-1/2
          !transform
          !-translate-x-1/2 !-translate-y-1/2
        "
      >
        <div
          class="p-10 bg-white w-[515px] h-[395px] bg-white flex items-center"
        >
          <div>
            <div class="flex flex-col py-3 items-center">
              <svg
                width="120"
                height="120"
                viewBox="0 0 120 120"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M119.56 59.78C119.56 92.7957 92.7957 119.56 59.78 119.56C26.7643 119.56 0 92.7957 0 59.78C0 26.7643 26.7643 0 59.78 0C92.7957 0 119.56 26.7643 119.56 59.78ZM52.8653 91.4331L97.2182 47.0801C98.7243 45.5741 98.7243 43.132 97.2182 41.6259L91.764 36.1717C90.258 34.6654 87.8159 34.6654 86.3096 36.1717L50.1381 72.343L33.2505 55.4554C31.7444 53.9493 29.3023 53.9493 27.796 55.4554L22.3418 60.9096C20.8357 62.4157 20.8357 64.8577 22.3418 66.3638L47.4109 91.4328C48.9172 92.9391 51.359 92.9391 52.8653 91.4331Z"
                  fill="#4D966F"
                />
              </svg>

              <p
                class="
                  text-indigo-700
                  leading-normal
                  text-2xl
                  font-bold
                  my-[20px]
                "
              >
                Changes have been saved successfully.
              </p>

              <button
                @click="togglePopUp"
                class="
                  font-bold
                  text-base
                  py-[15px]
                  px-[34px]
                  border-indigo-700
                  text-indigo-700
                  border
                  rounded-md
                "
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Form>
</template>
    <script>
import CustomInput from "@/Components/CustomInput.vue";
import Button from "@/Components/Button.vue";
import SingleSelect from "@/Components/SingleSelect.vue";
import ManagerSingleselect from "@/Components/ManagerSingleinput.vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import Multiselect from "@vueform/multiselect";
import axios from "axios";
export default {
  name: "KeyEmployeeDetails",
  Components: {
    CustomInput,
    Multiselect,
    SingleSelect,
    ManagerSingleselect,
    Button,
    Form,
    Yup,
  },
  data() {
    const schema = Yup.object().shape({
      joinDate: Yup.string().required(),
      position: Yup.string().required(),
      organization: Yup.object().required(),
      workschedule: Yup.object().required(),
      team: Yup.object().required(),
      manager: Yup.object().required(),
    });
    const organizations = [
      { label: "Introcept Nepal" },
      { label: "Introcept Australia" },
    ];
    const workschedules = [
      { label: "Monday-Friday(Full time)" },
      { label: "Monday-Friday(Part time)" },
    ];
    const teams = [
      { label: "Development" },
      { label: "Product" },
      { label: "QA" },
      { label: "Sales" },
      { label: "Design" },
      { label: "Marketing" },
    ];
    const organization = null;
    const workschedule = null;
    const team = null;
    const manager = null;
    const managesSelected = [];
    const position = null;
    const joinDate = null;
    return {
      schema,
      showPopUp: false,
      managesSelect: [],
      superpower: [],
      isLoading: false,
      organization,
      organizations,
      workschedule,
      workschedules,
      team,
      teams,
      manager,
      managesSelected,
      position,
      joinDate,
      powers: [],
      managerList: [],
      managesList: [],
      employeeList: [],
    };
  },
  props: {
    userId: Number,
  },

  methods: {
    togglePopUp() {
      const id = this.$route.params.id;
      this.showPopUp = !this.showPopUp;
      this.$router.push({
        path: `/employees/${id}`,
      });
    },
    onSubmit(values) {
      const {
        organization,
        joinDate,
        position,
        workschedule,
        team,
        manager,
        superpowers,
      } = values;
      this.superpower = superpowers.split(" ").map((s) => s.trim());
      const employeeId = this.$route.params.id;
      axios
        .put(`/api/employees/key-employment-details/${employeeId}`, {
          id: employeeId,
          organization: organization.label,
          join_date: joinDate,
          work_schedule: workschedule.label,
          manager: manager.id,
          superpowers: this.employeeSuperpower,
          team: team.label,
          current_position: position,
          manager: manager.id,
          manages: this.selectedManages,
        })
        .then(() => {
          this.showPopUp = true;
        })
        .catch((error) => {
          alert(error);
        })
        .finally(() => (this.isLoading = false));
    },
  },
  computed: {
    selectedManages() {
      return this.managesSelected.map((manages) => manages);
    },
    employeeSuperpower() {
      return this.superpower.map((power) => power);
    },
    joindates() {
      this.joindate = new Date().toISOString().slice(0, 10);
      return this.joindate;
    },
    powersList() {
      return this.powers.join(" ");
    },
  },
  created() {
    const employeeId = this.$route.params.id;
    axios
      .all([
        axios.get(`/api/employees/managers?exclude_ids=${employeeId}`),
        axios.get(`/api/employees/key-employment-details/${employeeId}`),
      ])

      .then(
        axios.spread((manages, KeyEmployeeDetail) => {
          this.employeeList = manages.data.data;
          console.log(this.employeeList);
          this.managerList = this.employeeList.map(
            ({ id, first_name, last_name, email, avatar }) => ({
              id: id,
              label: `${first_name} ${last_name}`,
              email: email,
              avatar: `${avatar}`,
            })
          );
          this.managesList = this.employeeList.map(
            ({ id, first_name, last_name, email, avatar }) => ({
              value: {
                employee_id: id,
              },
              label: `${first_name} ${last_name}`,
              email: email,
              avatar: `${avatar}`,
            })
          );
          const KeyDetaiList =
            KeyEmployeeDetail.data.data.key_employment_details;
          this.organizations.forEach((org, index) => {
            if (KeyDetaiList.organization == org.label) {
              this.organization = this.organizations[index];
            }
          });
          this.joinDate = KeyDetaiList.join_data;
          this.position = KeyDetaiList.current_position;
          this.workschedules.forEach((schedule, index) => {
            if (KeyDetaiList.work_schedule == schedule.label) {
              this.workschedule = this.workschedules[index];
            }
          });
          this.teams.forEach((teamData, index) => {
            if (KeyDetaiList.team == teamData.label) {
              this.team = this.teams[index];
            }
          });
          const managerId = KeyDetaiList.manager.id;
          this.manager = this.managerList[managerId - 1];
          console.log(this.manager);
          this.powers = KeyDetaiList.superpowers;
        })
      )
      .catch((error) => console.log(error));
  },
};
</script>
    <style>
.multiselect-tag.is-user {
  padding: 5px 8px;
  border-radius: 22px;
  background: #4c51bf;
  margin: 3px 3px 8px;
}

.multiselect-tag.is-user img {
  width: 30px;
  border-radius: 50%;
  height: 30px;
  margin-right: 8px;
  border: 2px solid #ffffffbf;
}

.multiselect-tag.is-user i:before {
  color: #ffffff;
  border-radius: 50%;
}

.user-image {
  margin: 0 6px 0 0;
  border-radius: 50%;
  height: 22px;
}
</style>
    <style src="@vueform/multiselect/themes/default.css"></style>
