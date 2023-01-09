<template>
    <div class="fixed w-64 h-screen bg-white shadow-lg  pt-10">
            <div v-for="(type,i) in types" :key="i">
                <!--Ouverte-->
                <button class="link" @click="open(i)">
                    <span class="link-icone">
                        <i class="material-icons">
                            {{type.icon}}
                        </i>
                    </span>
                    <span class="link-title ">
                        {{type.nom}}
                    </span>
                    <span class="link-option ">
                        <i class="material-icons" v-if="type.services.length > 0">
                            keyboard_arrow_down
                        </i>
                    </span>
                </button>
                <div class="bg-gray-300 trans1 overflow-hidden" :class="current === i ? 'open' : 'close'">
                    <div class="link trans" v-for="(service,j) in type.services" :key="j">
                        <span class="sub-link-title">
                            {{service.title}}
                        </span>
                    </div>
                </div>

            </div>
            <!-- settings nd store  -->
            <div class="" >
                <div v-for="(bottom, i) in bottoms" :key="i">
                    <button class="link" :class="bottom.nom === 'Mon Store' ? 'my-16' : 'my-24'">
                    <span class="link-icone">
                        <i class="material-icons">
                            {{bottom.icon}}
                        </i>
                    </span>
                    <span class="link-title ">
                        {{bottom.nom}}
                    </span>
                </button>
                </div>
            </div>
    </div>

</template>
<script>
    export default {
          created() {
    console.log('Component has been created!');
  },
        data() {
            return {
                types: [{
                        "nom": "Dashboard",
                        icon: "multiline_chart",
                        services: []
                    },
                    {
                        "nom": "magazin",
                        icon: "store",
                        services: [{
                                "title": "Catégories",
                                "route": "",
                            },
                            {
                                "title": "Produits",
                                "route": ""
                            },
                            {
                                "title": "Entrepôts",
                                "route": ""
                            },
                        ]
                    },
                    {
                        "nom": "vente",
                        icon: "shopping_cart",
                        services: [{
                                "title": "Commandes",
                                "route": ""
                            },
                            {
                                "title": "Clients",
                                "route": ""
                            },
                            {
                                "title": "Livraison",
                                "route": ""
                            }
                        ]
                    },
                    {
                        "nom": "achat",
                        icon: "attach_money",
                        services: [{
                                "title": "Demandes",
                                "route": ""
                            },
                            {
                                "title": "Fournisseurs",
                                "route": ""
                            },
                            {
                                "title": "Factures",
                                "route": ""
                            },

                        ]
                    },
                    {
                        "nom": "Marketing",
                        icon: "style",
                        services: [{
                                "title": "Packs",
                                "route": "",
                            },
                            {
                                "title": "Promotions",
                                "route": ""
                            },

                        ]
                    },
                ],
                bottoms:[
                    {
                        "nom": "Mon Store",
                        icon: "storefront",
                        services: [

                        ]
                    },
                    {
                        "nom": "Paramètres",
                        icon: "settings",
                        services: [

                        ]
                    },
                ],
                current: -1,
            }
        },
        methods: {
            open(i) {
                this.current = i;
            }
        },
    }

</script>
