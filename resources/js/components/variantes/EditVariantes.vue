<template>
    <div>
        <!-- champs -->
        <div class="my-3 w-full">
            <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                Options
            </label>
            <!-- option -->
            <div v-for="(champ, number) in champs" :key="champ.id" class="border-t border-gray-300 py-1 my-2">
                <champ v-on:updated="handleUpdate($event, champ.id)" :show_delete="showDelete" v-on:deleted="handleDelete(champ.id)" :number="number+1">
                </champ>
            </div>
            <button v-show="showAdd" type="button" @click="handleAdd"
                class=" text-sm flex items-center  text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 my-1">
                <i class="material-icons mr-1">
                    add_circle_outline
                </i>
                Ajouter Nouvelle Option
            </button>
        </div>
        <!-- Preview -->
        <preview :variantes="variantes"></preview>
    </div>
</template>
<script>
export default {
    data() {
        return {
            champs: [
                {
                    id:1,
                    label: '',
                    tags: []
                }
            ],
            variantes: []
        }
    },
    computed: {
        showDelete() {return this.champs.length > 1},
        showAdd() {return this.champs.length < 3},
        options() {return this.champs.map((champ) => {return champ.label}).join('/')}
    },
    methods: {
        handleAdd() {
            this.champs = [...this.champs, {
                id:this.champs[this.champs.length-1].id+1,
                label: '',
                tags: []
            }]
        },
        handleUpdate(data, id) {
            this.champs = this.champs.map(champ => {
                if(champ.id != id){
                    return champ;
                }
                return {
                    id: id,
                    label: data.label,
                    tags: data.tags
                }
            });

            this.updateVariantes();
        },
        updateVariantes(){
            let tags = [];
            for (let i = 0; i < this.champs.length; i++) {
                if(this.champs[i].tags.length > 0){
                    tags.push(this.champs[i].tags)
                }
            }

            let variantes = tags.length>0?tags[tags.length - 1]:[];

            for (let i = tags.length - 2; i >= 0; i--) {
                let temp = [];

                for (let j = 0; j < tags[i].length; j++) {
                    for (let k = 0; k < variantes.length; k++) {
                        temp.push(tags[i][j] + '/' + variantes[k]);
                    }
                }

                variantes = temp;
            }

            this.variantes = variantes.map(function(variante){
                return {nom: variante}
            })
        },
        handleDelete(id) {
            this.champs = this.champs.filter(e => e.id != id);
            this.updateVariantes();
        }
    },
    watch: {
        variantes(newVal, oldVal) {
            this.$emit("updated" , {options: this.options, variantes: this.variantes});
        },
        options(newVal, oldVal){
            this.$emit("updated" , {options: this.options, variantes: this.variantes});
        }
    }
}
</script>
