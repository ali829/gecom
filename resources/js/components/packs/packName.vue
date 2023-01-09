<template>
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">Informations</h5>
        </div>
        <div class="px-1 md:px-5 my-3 w-full">
            <div class="flex items-center w-full my-3">
            <span class="uppercase font-semibold text-xs mr-2 whitespace-no-wrap" >nom du pack :</span>

                <input type="text" placeholder="nom du pack"  class="appearance-none border rounded w-10/12 py-1 px-1 border-purple-500 w-7/12 md:w-9/12">
            
            </div>
        </div>
        <div class="px-1 md:px-5 my-3 w-full">
            <div class="flex items-start w-full my-3">
            <span class="uppercase font-semibold text-xs mr-2 whitespace-no-wrap">description :</span>
                <textarea name="" id="" cols="30" rows="10" class="appearance-none border rounded w-10/12 py-1 px-1 border-purple-500 w-7/12 md:w-9/12"></textarea>
            </div>
        </div>
        <div class="px-1 md:px-5 my-3 w-full">
            <div class="flex items-center w-full my-3">
                <span class="uppercase font-semibold text-xs mr-2 whitespace-no-wrap" >duration du pack: :</span>
                <div class="w-1/2">
                    <div class="block text-gray-800 font-semibold  mb-1 capitalize">
                        <label for="">debut :</label>
                    </div>
                    <input type="date"   class="border rounded w-10/12 py-1 px-1 border-purple-500 w-full md:w-9/12"> 
                </div>
                <div class="w-1/2">
                    <div class="block text-gray-800 font-semibold  mb-1 capitalize">
                        <label for="">fin :</label>
                    </div>
                    <input type="date"   class="border rounded w-10/12 py-1 px-1 border-purple-500 w-full md:w-9/12"> 
                </div>
            </div>
        </div>
        <div class="px-1 md:px-5 my-3 w-full">
            <div class="flex items-start w-full my-3">
                <span class="uppercase font-semibold text-xs mr-2 whitespace-no-wrap">statut :</span>
                <switchonoff @switch="changeStatut"></switchonoff>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        changeStatut(k){
            this.$parent.statut = k ;
        }
    },
}
</script>