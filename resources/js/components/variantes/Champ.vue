<template>
    <div>
        <div class="flex justify-between">
            <label class="block text-sm text-gray-800 font-semibold  mb-1" :for="'inline-full-name'+number">
                Option {{number}}
            </label>
            <button type="button" v-show="show_delete == true" @click="remove()">
                <i class="material-icons">
                    delete_forever
                </i>
            </button>
        </div>
        <!-- variante selctioné -->
        <div class="md:flex items-start">
            <input v-model="input" @blur="handleUpdate"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full md:w-1/4 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                :id="'inline-full-name'+number" type="text" placeholder="Caractéristique">
            <div class="w-full md:w-3/4 px-0 md:px-4 py-2 md:py-0">
                <div class="px-4 py-2 border border-purple-500 rounded flex flex-wrap ">
                    <vue-tags-input
                        class="w-full"
                        placeholder="Ajouter option"
                        v-model="tag"
                        :tags="tags"
                        @tags-changed="updateTags"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
    props: {
        show_delete: {
            type: Boolean,
            required: true
        },
        number: {
            type: Number,
            required: true
        },
    },
    data() {
        return {
        input: '',
        tag: '',
        tags: [],
        };
    },
    methods: {
        handleUpdate() {
            this.$emit('updated', {
                label: this.input,
                tags: this.tags.map(function(tag){
                    return tag.text
                })
            })
        },
        updateTags(newTags) {
            this.tags = newTags
            this.handleUpdate();
        },
        remove() {
            this.$emit('deleted')
        }
    },
}
</script>
