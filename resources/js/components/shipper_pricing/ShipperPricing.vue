<template>
    <div>
        <div class="bg-white border rounded shadow pb-5">
            <p class="w-full border-b border-gray-300 px-4 py-2 text-lg font-semibold text-gray-700">
                Pricing de {{shipper.company_name}}
            </p>

            <div id="ranges_container">
                <div class="flex items-end">
                    <!-- Ville Destination -->
                    <div class="mx-5">
                        <div class=" appearance-none border-2 border-transparent font-semibold   py-2 px-4 text-gray-700 leading-tight  my-1" v-for="destination in destinations" :key="destination.id">
                            {{destination.name}}
                        </div>
                    </div>

                    <!-- DE -- à -->
                    <div class="flex flex-1 self-start">
                        <div class="flex items-start">
                            <shipping-range v-for="shipping_range in shipment_ranges" :shipping_range="shipping_range"
                                :destinations="destinations" :key="shipping_range.id">
                            </shipping-range>
                            <add-shipping-range v-on:added="add"></add-shipping-range>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            shipper: {
                type: Object,
                required: true
            },
            destinations: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                shipment_ranges: this.shipper.shipment_ranges
            }
        },
        methods: {
            add(shipment_range) {

                shipment_range.shipper_id = this.shipper.id;

                axios.post('/admin/shipment_ranges', shipment_range)
                    .then(res => this.shipment_ranges = [...this.shipment_ranges, res.data])
                    .catch(err => console.log(err));

            }
        }
    }

</script>
