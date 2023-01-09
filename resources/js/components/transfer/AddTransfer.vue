<template>
  <div
    v-if="$parent.selectedDestination != null && $parent.selectedOrigin != null"
    class="bg-white border rounded shadow mt-5"
  >
    <select-produit @add="addTransfer"></select-produit>
    <transfers-list @transferRemoved="removeTransfer" @transferUpdated="updateTransfer"></transfers-list>
  </div>
</template>

<script>
export default {
  methods: {
    addTransfer(variantes) {
      let vars = this.$parent.selectedOrigin.variantes;
      let varsDest = this.$parent.selectedDestination.variantes;
      let products = this.$parent.products;

      for (let i = 0; i < variantes.length; i++) {
        let add = true;

        for (let j = 0; j < this.transfers.length; j++) {
          if (variantes[i] == this.transfers[j].variante.id) {
            add = false;
            break;
          }
        }

        if (add) {
          let transfer = {
            qteTransfer: 0,
            qteDestination: 0
          };

          for (let j = 0; j < vars.length; j++) {
            const element = vars[j];
            if (element.id == variantes[i]) {
              transfer.variante = element;
              transfer.qteOrigin = element.pivot.qte;
              break;
            }
          }

          for (let j = 0; j < varsDest.length; j++) {
            const element = varsDest[j];
            if (element.id == variantes[i]) {
              transfer.qteDestination = element.pivot.qte;
              break;
            }
          }

          for (let j = 0; j < products.length; j++) {
            const element = products[j];
            if (element.id == transfer.variante.product_id) {
              transfer.product = element;
              break;
            }
          }

          this.transfers = [...this.transfers, transfer];
        }
      }
    },
    removeTransfer(variante) {
      this.transfers = this.transfers.filter(transfer => transfer.variante.id != variante)
    },
    updateTransfer(variante){
        for (let i = 0; i < this.transfers.length; i++) {
            if(this.transfers[i].variante.id == variante.variante){
                this.transfers[i].qteTransfer = variante.qte
                break
            }
        }
    }
  },
  computed: {
    products() {
      let variantes = this.$parent.selectedOrigin.variantes;

      let products = this.$parent.products.filter(product => {
        for (let i = 0; i < variantes.length; i++) {
          if (variantes[i].product_id == product.id) {
            return true;
          }
        }
        return false;
      });

      for (let i = 0; i < products.length; i++) {
        for (let j = 0; j < variantes.length; j++) {
          if (products[i].id == variantes[j].product_id) {
            (products[i].variantes = products[i].variantes || []).push(
              variantes[j]
            );
          }
        }
      }

      return products;
    }
  },
  watch: {
      transfers(newData, oldData){
        this.$emit("updated", this.transfers);
      }
  },
  data() {
    return {
      transfers: []
    };
  }
};
</script>
