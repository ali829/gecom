<template>
    <div v-if="$parent.packs.length > 0" class="bg-white  border rounded shadow mt-5">
        <div  class="flex">
            <div class="mx-1 my-1 " v-for="(pack, i) in packs_" :key="i">
                <div class="relative">
                    <div class="static">
                        <img src="https://picsum.photos/200"
                            class="object-cover h-40 w-40 border-dashed border border-gray-800 p-1">
                    </div>
                    <div class="absolute top-0 right-0">
                        <div class="w-full flex justify-center my-1 ">
                            <button type="button" class="text-gray-100 font-semibold rounded mx-auto pr-1" @click="remove(i)">
                                <i class="material-icons bg-red-500 hover:bg-red-700 rounded-full">
                                    cancel
                                </i>
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <p>produit :{{pack.name}} </p>
                    <p>variante :{{pack.variante}}</p>
                    <p>prix :{{pack.price}}</p>
                </div>
            </div>
        </div>
        <div class="w-full p-3 flex justify-end">
            <p>
                Total : <span v-text="this.$parent.total"></span>
            </p>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            remove(i){
                var index = i ;
                this.$emit("remove", index);
            }
        },
        computed: {
            packs_() {
                return this.$parent.packs.map(pack => {
                    return {
                        name: pack.name,
                        variante: pack.variante,
                        price: pack.price,
                    };
                });
            }
        },
    }

</script>
