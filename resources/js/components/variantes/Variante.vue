<template>
    <tr class="border-t border-gray-300 py-2 my-1">
        <td class="px-8 md:px-1 py-2">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-xs py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                 type="text" v-model="variante.nom" placeholder="Variante">
        </td>
        <td class="px-8 md:px-2 py-2">
            <div class="flex">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-r-none w-3/4 text-xs py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                     type="text" placeholder="Prix">
                <span
                    class="flex items-center leading-normal bg-purple-500 rounded rounded-l-none border border-l-0 border-gray-400 p-1 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                    Dhs
                </span>
            </div>
        </td>

        <td class="px-8 md:px-1 py-2">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-xs py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                 type="text" value="" placeholder="Réf.">
        </td>
        <td class="px-8 md:px-1 py-2">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-xs py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                 type="text" value="" placeholder="Quantité">
        </td>
    </tr>
</template>

<script>
export default {
    props: {
        variante: {
            type: Object,
            required: true
        }
    }
}
</script>
