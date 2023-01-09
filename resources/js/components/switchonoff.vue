<template>
    <div class="flex">
        <div class="text-xs text-gray-800 font-bold uppercase" >
                    off
        </div>
        <div class="relative flex rounded-r-full rounded-l-full w-10 mx-2" :class="offon === true  ? 'bg-green-500' :'bg-gray-400'" @click="switchHandler()">
            <div class="h-5  w-5 bg-gray-200 rounded-full switchbtn " :class="offon === true  ? 'on' :''">

            </div>
        </div>
        <div class="text-xs text-gray-800 font-bold uppercase" >
                    on
        </div>
    </div>
</template>
<script>
export default {
    created() {
        this.offon = this.isswitch;
    },
    methods: {
         switchHandler(){
             this.offon = !this.offon
                this.$emit("switch" , this.offon);
            }
    },
    data() {
        return {
            offon: true,
        }
    },
}
</script>