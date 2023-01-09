<template>
  <div>
    <div class="flex items-center">
      <input type="checkbox" @change="check($event)" :checked="fullyChecked" :indeterminate.prop="halfChecked"/>
      <span class="pl-1 capitalize font-semibold">{{node}}</span>
    </div>
    <div class="pl-4" v-for="(child, i) in children" :key="i+'checkbox'">
      <div class="my-1 flex items-center">
        <input v-model="checkedValues" :value="child.value" type="checkbox" />
        <span class="pl-1 capitalize">{{child.text}}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    node: {
      type: String,
      required: true
    },
    children: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      checkedValues: []
    };
  },
  computed: {
      fullyChecked() {
        let checked = true;
        for (let i = 0; i < this.children.length; i++) {
            if(this.checkedValues.indexOf(this.children[i].value) == -1){
                checked = false;
                break;
            }
        }
        return checked;
      },
      halfChecked(){
        if(this.fullyChecked){
            return false;
        }
        let checked = false;
        for (let i = 0; i < this.children.length; i++) {
            if(this.checkedValues.indexOf(this.children[i].value) > -1){
                checked = true;
                break;
            }
        }
        return checked;
      }
  },
  watch: {
    checkedValues: function (newValues, oldValues) {
      this.$emit('change', newValues);
    }
  },
  methods: {
    check(event) {
      if(event.target.checked){
          this.checkedValues = this.children.map((c) => c.value)
      } else {
        this.checkedValues = [];
      }
    }
  }
};
</script>
