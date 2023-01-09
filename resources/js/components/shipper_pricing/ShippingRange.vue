<template>
  <div>
    <div class="mb-3 border-b border-gray-300 py-2">
      <div class="flex items-center my-1">
        <label class="w-1/6 text-lg font-semibold">&gt;=</label>
        <span
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-16 text-center py-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 ml-3">
            {{shipping_range.min_weight}} kg
        </span>
      </div>
      <div class="flex items-center my-1">
        <label class="w-1/6 text-lg font-semibold">&lt;</label>
        <span
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-16 text-center py-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 ml-3">
            {{shipping_range.max_weight}} Kg
        </span>
      </div>
    </div>
    <div class="my-1 w-2/3 mx-auto flex justify-center"
        v-for="destination in destinations"
        :key="destination.id">
        <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 ml-3"
            placeholder="0.00"
            type="text"
            :value="getPrice(shipping_range, destination)"
            @change="handleChange($event, destination.id, shipping_range.id)"
        />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    shipping_range: {
      type: Object,
      required: true
    },
    destinations: {
      type: Array,
      required: true
    }
  },
  methods: {
    getPrice(shipping_range, destination) {
      for (let d of shipping_range.destinations) {
        if (d.id === destination.id) {
          return d.pivot.price;
        }
      }
      return "";
    },
    handleChange(e, d, sr) {
      let data = {
        destination_id: d,
        shipment_range_id: sr,
        price: e.target.value
      };

      axios
        .post("/admin/shipment_ranges/update_destination_price", data)
        .then(res => (e.target.value = res.data.price))
        .catch(err => console.log(err));
    }
  }
};
</script>
