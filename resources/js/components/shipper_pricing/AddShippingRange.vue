<template>
    <div class="w-1/4 flex items-start">
        <form class="flex items-center justify-start">
            <div >
                <div class="flex items-center my-1">
                    <label class="w-1/5 text-lg font-semibold" for="a">&gt;=</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-16 text-center py-2  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 ml-3"
                        type="text" v-model="de" id="de" placeholder="0">
                </div>
                <div class="flex items-center my-1">
                    <label class="w-1/5 text-lg font-semibold" for="a">&lt;</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-16 text-center py-2  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 ml-3"
                        type="text" v-model="a" id="a" placeholder="0">
                </div>
            </div>
            <div class="py-1">
            <button type="submit" @click="handleClick" class="text-sm text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 flex items-center mx-1">
                <i class="material-icons mr-1">
                    add_circle_outline
                </i>Ajouter
            </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                de: '',
                a: ''
            }
        },
        methods: {
            handleClick(e) {
                e.preventDefault();
                this.$emit('added', {
                    min_weight: this.de,
                    max_weight: this.a
                });
                this.de = this.a = '';
            }
        }
    }

</script>

