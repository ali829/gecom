<template>
  <div class="forme-zone-1">
    <div class="zone-title">
      sélectionner produits 
    </div>
    <div class="container-item-1">
      <div class="row">
        <div class="flex w-full">
          <div class="relative input-zone">
            <model-select
              :options="produits"
              v-model="selectedProduit"
              placeholder="selectionnez produit"
            ></model-select>
          </div>
          <modal v-if="showModal">
            <div class="relative" slot="header">
              <button class="absolute top-0 right-0" @click="showModal = false">
                <i class="material-icons">highlight_off</i>
              </button>
            </div>
            <div slot="body">
              <div class="block text-sm text-gray-800 flex justify-start uppercase mb-3">
                <p>slélectionnez les variantes à transferer</p>
              </div>
              <tree-checkbox :node="selectedProduit.text" :children="variantes" @change="change"></tree-checkbox>
            </div>
            <button
              slot="footer"
              class="action-btn"
              @click="add"
            >Ajouter</button>
          </modal>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ModelSelect } from "vue-search-select";
export default {
  watch: {
    selectedProduit: function(newValues, oldValues) {
      let vars = [];

      for (let i = 0; i < this.$parent.products.length; i++) {
        if (newValues.value == this.$parent.products[i].id) {
          vars = this.$parent.products[i].variantes;
          break;
        }
      }

      this.variantes = vars.map(variante => {
        return {
          value: variante.id,
          text: variante.name
        };
      });

      if (newValues.value != oldValues.value) {
        this.showModal = true;
      }
    }
  },
  computed: {
    produits() {
      return this.$parent.products.map(produit => {
        return {
          value: produit.id,
          text: produit.name
        };
      });
    }
  },
  data() {
    return {
      selectedProduit: {},
      selectedVariantes: [],
      variantes: [],
      showModal: false
    };
  },
  methods: {
    add() {
      this.showModal = false;
      this.$emit("add", this.selectedVariantes);
    },
    change(variantes) {
      this.selectedVariantes = variantes;
    }
  },
  components: {
    ModelSelect
  }
};
</script>
