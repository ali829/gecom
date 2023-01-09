<template>
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">choix (2 min - 3 max)</h5>
        </div>
        <div class="px-1 md:px-5 my-3 w-full">
            <div class="flex items-center w-full my-3">
            <span class="uppercase font-semibold text-xs mr-2 whitespace-no-wrap" >select les produits :</span>
            <div  class="appearance-none border rounded w-10/12 py-1 px-1 border-purple-500 w-7/12 md:w-9/12 ">
                <model-select  :options="products_" :isDisabled="$parent.packs.length === 3 ? true : false" v-model="Select_produit" placeholder="select item">
                </model-select>
            </div>
                
            </div>
            <modal v-if="showModal">
            <div class="relative" slot="header">
              <button class="absolute top-0 right-0" @click="showModal = false">
                <i class="material-icons">highlight_off</i>
              </button>
            </div>
            <div slot="body">
              <div class="block text-gray-800 flex justify-start font-semibold mb-1">
                <p>selectionnez les variantes </p>
              </div>
              <p>
                  {{Select_produit.text}}
              </p>
              <div v-for="(variante, i) in variantes" :key="i" >
                <input type="radio" name="varriante" :value="variante.value" @change="CheckedHandler(variante.value)"   :id="i">
                <label :for="i" v-text="variante.text"></label>
              </div>
            </div>
            <button
              slot="footer"
              class="text-sm flex items-center text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 mx-1"
              @click="add"
            >valider</button>
          </modal>
        </div>
    </div>
</template>
<script>
import { ModelSelect } from "vue-search-select";
export default {
  watch: {
    Select_produit: function(newValues, oldValues) {
      let vars = [];

      for (let i = 0; i < this.$parent.products.length; i++) {
        if (newValues.value == this.$parent.products[i].id) {
          vars = this.$parent.products[i].variantes;
          break;
        }
      }

this.showModal = true;

      this.variantes = vars.map(variante => {
        return {
          value: variante.id,
          text: variante.name
        };
      });
    }
  },
  computed: {
    products_() {
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
      Select_produit: {},
      variantes: [],
      variantes_checked: "",
      showModal: false
    };
  },
  methods: {
    add() {
    this.showModal = false;
    this.$emit("add" , this.Select_produit.text , this.variantes_checked);
    },
    CheckedHandler(item) {
      this.variantes_checked = item;
    }
  },
  components: {
    ModelSelect
  }
};
</script>