<template>
    <div class="w-full">
        <div class="py-3">
             <h5 class="font-bold uppercase text-gray-600">Nouveau pack</h5>
        </div>
        <pack-name></pack-name>
        <product-choice @add="addProduct"></product-choice>
        <pack-list @remove="removeItem"></pack-list>
        <discount-pack :total="total" ></discount-pack>
    </div>
</template>
<script>
export default {
    props: {
    products: {
      type: Array,
      required: true
    },
  },
  methods: {
      addProduct(produit , variante){
          
          
          for (let i = 0; i < this.products.length; i++) {
                if (this.products[i].name == produit ) {
                    console.log(this.products[i].name);
                    for (let j = 0; j < this.products[i].variantes.length; j++) {
                        if (this.products[i].variantes[j].id == variante) {
                            console.log(this.products[i].variantes[j].id );
                            this.packs.push({
                             name: this.products[i].name,
                             variante: this.products[i].variantes[j].name,
                             price: this.products[i].variantes[j].price,
                                });
                        }
                    }
                }
            } 
            this.total = 0;
            for (let k = 0; k < this.packs.length; k++) {
                this.total += parseInt(this.packs[k].price);
                
            }
      },
      removeItem(index){
          this.packs.splice(index, 1);
          this.total = 0;
          for (let k = 0; k < this.packs.length; k++) {
                this.total += parseInt(this.packs[k].price);
            }
      },
      
  },
  data() {
      return {
          packs:[],
          total : 0,
          statut : true
      }
  },
}
</script>