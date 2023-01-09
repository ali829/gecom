<template>
    <div id="side-bar" v-bind:class="{ hide : hidden }"   class="antialiased bg-gray-200 h-full py-4 px-1  fixed shadow-lg  zindex">
        <div class="absolute top-0 right-0  my-3 -mr-6 ">
            <button @click="hidden = !hidden" class="flex items-center justify-center  bg-purple-500 text-gray-100 rounded-r shadow text-xs font-bold  focus:outline-none">
                <i class="material-icons" v-bind:class="{ slideicon : hidden }">
                    menu_open
                </i>
            </button>
        </div>
        <div>
            <span class="font-semibold text-gray-700">
                Twidlo
            </span>
            <nav id="nav" class="maw-w-sm relative px-1">


                <ul class="relative">

                    <li v-for="(type,i) in types" :key="i" >
                        <span class="text-sm uppercase font-semibold text-left  text-purple-600">
                                {{type.nom}}
                        </span>
                        <div v-for="(service,j) in type.services" :key="j" :class="service.title === 'Parametres'  ? 'border-t border-purple-300' :''">
                        <button  type="button" class="py-1 my-1 px-3 w-full  flex items-center focus:outline-none focus-visible:underline text-xs hover:text-purple-600 hover:rounded hover:bg-gray-300  " :class="selected === service.title ? 'text-purple-600 rounded bg-gray-100 shadow ' : 'text-gray-600'"  @click="handleClick(service)">
                           <i class="material-icons mx-1">
                               {{service.icon}}
                           </i>
                            <span
                                class="ml-2  font-semibold capitalize">
                                {{service.title}}
                            </span>
                        </button>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            types: [
                    {
                        "nom":"",
                        services:[
                            {
                                "title":"Dashboard",
                                "route":"/admin",
                                icon:"multiline_chart"
                            }
                        ]
                    },
                    {
                        "nom":"magazin",
                        services:[
                            {
                                "title":"Catégories",
                                "route":"/admin/categorie/",
                                icon:"account_tree"
                            },
                            {
                                "title":"Produits",
                                "route":"/admin/product/",
                                icon:"devices_other"
                            },
                            {
                                "title":"Entrepôts",
                                "route":"/admin/entrepot/",
                                icon:"business"
                            },
                            {
                                "title":"Transferts",
                                "route":"/admin/transfert/",
                                icon:"compare_arrows"
                            },
                        ]
                    },
                    {
                         "nom":"vente",
                        services:[
                            {
                                "title":"Commandes",
                                "route":"/admin/order/",
                                icon:"shopping_basket"
                            },
                            {
                                "title":"Clients",
                                "route":"/admin/client/",
                                icon:"wc"
                            },
                            {
                                "title":"Livraison",
                                "route":"/admin/shipper/",
                                icon:"local_shipping"
                            }
                        ]
                    },
                    {
                         "nom":"achat",
                        services:[
                            {
                                "title":"Demandes",
                                "route":"#",
                                icon:"local_mall"
                            },
                            {
                                "title":"Fournisseurs",
                                "route":"/admin/supplier",
                                icon:"people"
                            },
                            {
                                "title":"Factures",
                                "route":"#",
                                icon:"description"
                            },

                        ]
                    },
                    {
                         "nom":"Marketing",
                        services:[
                            {
                                "title":"Packs",
                                "route":"/admin/bundle/",
                                icon:"view_column"
                            },
                            {
                                "title":"Promotions",
                                "route":"/admin/promotion",
                                icon:"attach_money"
                            },

                        ]
                    },
                    {
                        "nom":"",
                        services:[
                            {
                                "title":"Paramètres",
                                "route":"/admin/settings/create",
                                icon:"phonelink_setup"
                            }
                        ]
                    },
            ],


            selected: "/admin",
            hidden: false
        }
    },
    methods: {
        handleClick(service){
            window.location = service.route;
        }
    },
    created() {
        for (let i = 0; i < this.types.length; i++) {
            for (let j = 0; j < this.types[i].services.length; j++) {
                if(window.location.pathname.startsWith(this.types[i].services[j].route)){
                    this.selected = this.types[i].services[j].title;
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
