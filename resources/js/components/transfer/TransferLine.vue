<template>
  <tr>
    <td class="td-table">{{transfer.variante.name}}</td>
    <td class="td-table">
      <div
        class="input-zone text-center"
      >
        <span
          class="text-sm text-gray-500"
          :class="qte > 0  ? 'line-through' :''"
        >{{transfer.qteOrigin}}</span>
        <span class="text-md text-gray-900 mx-2" :class="qte === 0  ? 'hidden' :''">{{newQteOrigin}}</span>
      </div>
    </td>
    <td class="td-table">
      <div
        class="input-zone text-center"
      >
        <span
          class="text-sm text-gray-500"
          :class="qte > 0  ? 'line-through' :''"
        >{{transfer.qteDestination}}</span>
        <span
          class="text-md text-gray-900 mx-2"
          :class="qte === 0  ? 'hidden' :''"
        >{{newQteDestination}}</span>
      </div>
    </td>
    <td class="td-table">
      <div
        class="input-zone text-center"
      >
        <number-input
          size="small"
          v-model="qte"
          :min="0"
          :max="transfer.qteOrigin"
          inline
          controls
          center
        ></number-input>
      </div>
    </td>
    <td class="td-table">
      <button class="action-btn-simple" @click="deleteLine">
        <i class="material-icons">delete_forever</i>
      </button>
    </td>
  </tr>
</template>

<script>
import VueNumberInput from "@chenfengyuan/vue-number-input";
export default {
  props: {
    transfer: {
      type: Object,
      required: true
    }
  },
  methods: {
    deleteLine() {
      this.$emit("linedeleted", this.transfer.variante.id);
    }
  },
  data() {
    return {
      qte: 0
    };
  },
  watch: {
      qte(newVal, oldVal){
        this.$emit("lineupdated", {
            variante: this.transfer.variante.id,
            qte: newVal
        });
      }
  },
  created() {
    this.qte = this.transfer.qteTransfer;
  },
  computed: {
    newQteOrigin() {
      return this.transfer.qteOrigin - this.qte;
    },
    newQteDestination() {
      return this.transfer.qteDestination + this.qte;
    }
  },
  components: {
    VueNumberInput
  }
};
</script>
