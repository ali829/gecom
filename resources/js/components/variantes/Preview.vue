<template>
    <div v-if="variantes.length>0" class="py-2 my-3 w-full border-t border-gray-300">
        <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
            Preview
        </label>
        <div class="px-1 my-3 w-full flex overflow-x-scroll md:overflow-hidden">
            <table class="table-fixed ">
                <thead>
                    <tr>
                        <th class="w-1/2 md:w-1/5 px-8 md:px-4 py-2">Variante</th>
                        <th class="w-1/2 md:w-1/5 px-8 md:px-4 py-2">Prix</th>
                        <th class="w-1/2 md:w-1/5 px-8 md:px-4 py-2">Quantité</th>
                        <th class="w-1/2 md:w-1/5 px-8 md:px-4 py-2">Réf.</th>
                        <th class="w-1/2 md:w-1/5 px-8 md:px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <variante v-for="(variante, i) in variantes" :key="i" :variante="variante"></variante>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        variantes: {
            type: Array,
            required: true
        }
    }
}
</script>
