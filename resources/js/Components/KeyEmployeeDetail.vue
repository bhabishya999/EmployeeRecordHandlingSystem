<script setup>
import { ref } from "vue";
const organization = ref(null);
const workschedule = ref(null);
const team = ref(null);
const manager = ref(null);
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
            :options="managers"
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
            :options="manages"
            :value="managesSelect"
            :classes="{
              tag: 'bg-[#F5F5F5] font-bold text-primary text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1',
              containerActive: 'ring ring-primary',
              tagsSearch:
                'absolute inset-0 border-none outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full',
              placeholder:
                'text-sm flex items-center h-full absolute text-slate-500 left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 text-gray-400 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5',
            }"
          >
            <template v-slot:option="{ option }">
              <span class="flex items-center">
                <img :src="option.avatar" class="rounded-full w-10 h-10 mr-3" />
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
          Save and Continue
        </Button>
        <button
          type="button"
          class="
            mr-2.5
            py-[7px]
            px-2.5
            bg-[#F4F7FA]
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
import { ref } from "vue";
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
    return {
      schema,
      managesSelect: [],
      superpower: [],
      isLoading: false,
      organizations: [
        { label: "Introcep Nepal" },
        { label: "Introcept Australia" },
      ],
      managesSelected: null,
      workschedules: [
        { label: "Monday-Friday(Full time)" },
        { label: "Monday-Friday(Part time) " },
      ],
      teams: [
        { label: "Development" },
        { label: "Product" },
        { label: "QA" },
        { label: "Sales" },
        { label: "Design" },
      ],
      managerList: [],
    };
  },
  props: {
    userId: Number,
  },

  methods: {
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
      this.isLoading = true;
      axios
        .post("employees/key-employment-details", {
          employee_id: this.userId,
          organization: organization.label,
          join_date: joinDate,
          current_position: position,
          work_schedule: workschedule.label,
          team: team.label,
          manager: manager.id,
          manages: this.selectedManages,
          superpowers: this.employeeSuperpower,
        })
        .then(() => {
          localStorage.setItem("showSuccess", true);
          this.$router.push({
            path: "/employees",
          });
        })
        .catch((error) => {
          console.log("error:", error);
        })
        .finally(() => (this.isLoading = false));
    },
  },
  computed: {
    managers() {
      return this.managerList.map(
        ({ id, first_name, last_name, email, avatar }) => ({
          id: id,
          label: `${first_name} ${last_name}`,
          email: email,
          avatar: `http://talent.local${avatar}`,
        })
      );
    },
    manages() {
      return this.managerList.map(
        ({ id, first_name, last_name, email, avatar }) => ({
          value: { id },
          label: `${first_name} ${last_name}`,
          email: email,
          avatar: `http://talent.local${avatar}`,
        })
      );
    },
    selectedManages() {
      return this.managesSelected.map((manages) => manages.id);
    },
    employeeSuperpower() {
      return this.superpower.map((power) => power);
    },
  },
  created() {
    axios
      .get(`employees/managers?exclude_ids=${this.employeeId}`)
      .then(({ data }) => {
        this.managerList = data.data;
      })
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
  
  