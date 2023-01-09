<template>
  <div class="w-full">
    <div class="py-3">
      <h5 class="font-bold uppercase text-gray-600">Nouveau transfert</h5>
    </div>
    <div class="bg-white border rounded shadow mt-5">
      <div class="border-b p-3">
        <h5 class="font-semibold uppercase text-gray-600">Informations</h5>
      </div>
      <div class="px-1 md:px-5 my-3 w-full">
        <div class="flex items-center w-full my-3">
          <span class="uppercase font-semibold text-xs mr-2">Date de Transfert :</span>
          <div
            class="appearance-none w-10/12  w-7/12 md:w-9/12"
          >
            <input
              type="date"
              class="input-zone"
            />
          </div>
        </div>
        <selectentrepot @originUpdated="updateOrigin" @destinationUpdated="updateDestination"></selectentrepot>
      </div>
    </div>
    <add-transfer @updated="updateTransfers"></add-transfer>
  </div>
</template>
<script>
export default {
  props: {
    entrepots: {
      type: Array,
      required: true
    },
    products: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      entrepots_list: [],
      transfers: [],
      selectedOrigin: null,
      selectedDestination: null
    };
  },
  computed: {
    computeData() {
      return {
          transfers: this.transfers.map(transfer => {
              return {
                  variante: transfer.variante.id,
                  qte: transfer.qteTransfer
              }
          }),
        origin: this.selectedOrigin ? this.selectedOrigin.id : null,
        destination: this.selectedDestination
          ? this.selectedDestination.id
          : null
      };
    }
  },
  watch: {
      computeData(newVal, oldVal) {
        this.$emit("updated", this.computeData);
      }
  },
  created() {
    this.entrepots_list = this.entrepots;
  },
  methods: {
    updateTransfers(transfers){
        this.transfers = transfers
    },
    updateOrigin(ent) {
      if (ent == null) {
        this.selectedOrigin = null;
      }
      for (let i = 0; i < this.entrepots.length; i++) {
        const entrepot = this.entrepots[i];
        if (entrepot.id == ent) {
          this.selectedOrigin = entrepot;
          break;
        }
      }
    },
    updateDestination(ent) {
      if (ent == null) {
        this.selectedDestination = null;
      }
      for (let i = 0; i < this.entrepots.length; i++) {
        const entrepot = this.entrepots[i];
        if (entrepot.id == ent) {
          this.selectedDestination = entrepot;
          break;
        }
      }
    }
  }
};
</script>
