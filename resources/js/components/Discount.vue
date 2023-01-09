<template>
    <div class="flex justify-center">
        <!-- montant  -->
        <div class="mx-auto w-1/5 mx-1">
        <div class="block text-gray-800 font-semibold  mb-1 capitalize">
            <label for="">Montant</label>
        </div>

        <div class="flex">
            <div class="relative w-3/4">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-r-none  md:w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="chiffre" @input="chiffre_champ" placeholder="0.00">
                    <span class="absolute right-0 top-0 py-2  mr-2" :class="parseFloat(total) < chiffre ? 'block ' : 'hidden'">
                        <i class="material-icons text-red-400">
                            info
                        </i>
                    </span>
            </div>
            <span
                class="flex items-center leading-normal bg-purple-500 rounded rounded-l-none border border-l-0 border-gray-400 px-3 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                {{devise}}
            </span>

        </div>
        </div>
        <!--end of chiffre  -->
        <!-- percentage  -->
        <div class="mx-auto w-1/5 mx-1">
        <div class="block text-gray-800 font-semibold  mb-1 capitalize">
            <label for="">Pourcentage</label>
        </div>

        <div class="flex">
            <div class="relative w-3/4">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-r-none  md:w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="percentage" @input="percentage_champ" placeholder="0.00">
                    <span class="absolute right-0 top-0 py-2  mr-2" :class="percentage < 0 || percentage > 100 ? 'block ' : 'hidden'">
                        <i class="material-icons text-red-400">
                            info
                        </i>
                    </span>
            </div>
            <span
                class="flex items-center leading-normal bg-purple-500 rounded rounded-l-none border border-l-0 border-gray-400 px-3 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                %
            </span>

        </div>
        </div>
        <!-- end of percentage  -->
       <!-- total final  -->
     <div class="mx-auto w-1/5 mx-1">
        <div class="block text-gray-800 font-semibold  mb-1 capitalize">
            <label for="">Prix final</label>
        </div>

        <div class="flex">
            <div class="relative w-3/4">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-r-none  md:w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="total_s" @input="total_champ"
>
                    <span class="absolute right-0 top-0 py-2  mr-2" :class="parseFloat(total) < total_s || total_s < 0 ? 'block ' : 'hidden'" >
                        <i class="material-icons text-red-400">
                            info
                        </i>
                    </span>
            </div>
            <span
                class="flex items-center leading-normal bg-purple-500 rounded rounded-l-none border border-l-0 border-gray-400 px-3 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                {{devise}}
            </span>

        </div>
        </div>
       <!-- end total final  -->
    </div>
</template>
<script>
export default {
    props:{
       total: {
            type: Number,
            required: true
        },
        devise: {
            type: String,
            required: true
        }
    },
    created() {
        this.total_s =(this.total).toFixed(2);
    },
    data() {
        return {
            chiffre : '',
            percentage : '',
            total_s : 0
        }
    },
    methods: {
        chiffre_champ(){
            this.total_s = (this.total - this.chiffre).toFixed(2);
            this.percentage = (((this.total - this.total_s) / this.total) * 100).toFixed(2);
        },
        total_champ(){
            this.percentage = (((this.total - this.total_s) / this.total) * 100).toFixed(2);
            this.chiffre =  (this.total - this.total_s).toFixed(2);
        },
        percentage_champ(){
            var tot = this.total;
            var per = this.percentage / 100;
            var tot_s = this.total_s ;
            var per_tot = tot * per;
            tot_s =    tot - per_tot;
            this.total_s =    (tot - per_tot).toFixed(2);
            this.chiffre = (tot - tot_s).toFixed(2);

        },
    },
}
</script>
