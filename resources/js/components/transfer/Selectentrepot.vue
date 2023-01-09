<template>
  <div class="row-zone">
    <div class="container-item-2">
      <label class="label-title" for="">Origine</label>
      <div class="input-zone">
        <basic-select
          :options="entrepots1"
          :selected-option="selectedOrigine"
          placeholder="Origine"
          :isDisabled="$parent.transfers.length>0"
          @select="handleChange($event, 1)"
        ></basic-select>
      </div>
    </div>
    <div class="container-item-2">
      <label class="label-title" for="">Destination</label>
      <div class="input-zone">
        <basic-select
          :options="entrepots2"
          :selected-option="selectedDestination"
          placeholder="Destination"
          :isDisabled="$parent.transfers.length>0"
          @select="handleChange($event, 2)"
        ></basic-select>
      </div>
    </div>
  </div>
</template>

<script>
import { BasicSelect } from "vue-search-select";
export default {
  data() {
    return {
      entrepots1: [],
      entrepots2: [],
      selectedOrigine: {},
      selectedDestination: {}
    };
  },
  created() {
    this.entrepots1 = this.$parent.entrepots_list.map(function(entrepot) {
      return {
        value: entrepot.id,
        text: entrepot.nom
      };
    });
    this.entrepots2 = this.$parent.entrepots_list.map(function(entrepot) {
      return {
        value: entrepot.id,
        text: entrepot.nom
      };
    });
  },
  methods: {
    handleChange(item, id) {
      if (id == 1) {
        this.selectedOrigine = item;

        if (this.selectedOrigine.value == this.selectedDestination.value) {
          this.selectedDestination = {};
          this.$emit("destinationUpdated", null);
        }

        this.entrepots2 = this.$parent.entrepots_list
          .map(function(entrepot) {
            return {
              value: entrepot.id,
              text: entrepot.nom
            };
          })
          .filter(e => e.value != item.value);

        let products = [];

        this.$emit("originUpdated", item.value);
      } else if (id == 2) {
        this.selectedDestination = item;
        this.$emit("destinationUpdated", item.value);
      }
    }
  },
  components: {
    BasicSelect
  }
};
</script>
