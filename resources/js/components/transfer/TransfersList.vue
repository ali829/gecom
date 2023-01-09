<template>
  <div v-if="$parent.transfers.length > 0" class="overflow-x-scroll md:overflow-x-hidden">
    <table class="auto-table">
      <thead>
        <tr>
   
          <th class="th-table">Variante</th>
          <th class="th-table">Qté Origine</th>
          <th class="th-table">Qté Destination</th>
          <th class="th-table">Qté Transfert</th>
          <th class="th-table"></th>
        </tr>
      </thead>
      <tbody>
        <template v-for="produit in produits">
          <tr :key="'prod'+produit.id">
            <td class="td-table" colspan="5">
              {{produit.name}}
            </td>
          </tr>
          <transfer-line
            v-for="transfer in produit.variantes"
            :key="'trans'+transfer.variante.id"
            :transfer="transfer"
            @linedeleted="deleteTransfer"
            @lineupdated="updateTransfer"
          ></transfer-line>
        </template>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  methods: {
    deleteTransfer(transfer) {
      this.$emit("transferRemoved", transfer);
    },
    updateTransfer(transfer) {
      this.$emit("transferUpdated", transfer);
    }
  },
  computed: {
    produits() {
      let prods = [];

      for (let i = 0; i < this.$parent.transfers.length; i++) {
        const trans = this.$parent.transfers[i];

        let found = false;

        for (let j = 0; j < prods.length; j++) {
          if (prods[j].id == trans.product.id) {
            found = true;
            break;
          }
        }

        if (!found) {
          let prod = JSON.parse(JSON.stringify(trans.product));
          prod.variantes = [];

          prods.push(prod);
        }

        for (let j = 0; j < prods.length; j++) {
          if (prods[j].id == trans.product.id) {
            prods[j].variantes.push({
              variante: trans.variante,
              qteOrigin: trans.qteOrigin,
              qteDestination: trans.qteDestination,
              qteTransfer: trans.qteTransfer
            });
            break;
          }
        }
      }

      return prods;
    }
  }
};
</script>
