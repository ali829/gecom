@extends('dashboard.layout')

@section('title', $title)

@section('content')
<!-- table Card-->
<input type="file" name="image" accept="image/*" id="imageUpload" hidden>
<form action="{{$form_action}}" method="POST" class="w-full lg:max-w-3xl">
    <input type="hidden" name="hasVariants" value="false">
    <input type="hidden" name="variants" value="{&quot;options&quot;:&quot;&quot;,&quot;variantes&quot;:[]}">
    @csrf
    @if(isset($product->id))
    <input type="hidden" name="_method" value="PUT">
    @endif
    <p class="font-bold uppercase text-xl text-gray-600">
        {{$title}}
    </p>
    <!-- Générale -->
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">Général</h5>
        </div>
        <!-- champs -->
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Désignation
                </label>

                <input
                    class="@error('name') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="name" name="name" type="text" value="{{old_value('name', $product ?? null)}}"
                    placeholder="Désignation">
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="px-5 my-3">
            <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                Description
            </label>
            <textarea
                class="@error('description') border-red-500 @enderror resize-none bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full h-32 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="description" name="description" type="text" value="{{old_value('description', $product ?? null)}}"
                placeholder="Description"></textarea>
            @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class=" px-5 my-3">
            <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                Catégorie
            </label>
            <div class="relative">
                <select
                    class="@error('categorie_id') border-red-500 @enderror block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="categorie" name="categorie_id">
                    @foreach ($categories as $cat)
                    @if (isset($product->id) && $product->categorie_id==$cat->id)
                    <option value="{{$cat->id}}" selected> {{$cat->nom}}</option>
                    @endif
                    <option value="{{$cat->id}}"> {{$cat->nom}}</option>
                    @endforeach
                </select>
                @error('categorie_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Variantes -->
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">Variantes</h5>
        </div>
        <!-- champs -->
        <div class=" px-5 my-3 w-full">
            <div id="variantes">
                <div>
                    <switchonoff v-on:switch="hasVariants=$event"></switchonoff>
                    <span>Ce produit a des variantes.</span>
                </div>
                <edit-variantes v-show="hasVariants" @updated="updateData"></edit-variantes>
            </div>
        </div>
    </div>

    <!-- images -->
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">Images</h5>
        </div>
        <!-- image ajouter a modifier -->

        <div class="py-3 md:py-0 md:flex mx-auto w-11/12">
            @include('components.upload', ['images' => $product->images ?? [], 'max' => 4])
        </div>

    </div>

    <!-- Vente -->
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">Vente</h5>
        </div>
        <!-- champs -->
        <div class=" px-5 my-3 w-full">
            <label class="block text-gray-800 font-semibold mb-1" for="inline-full-name">
                Quantité
            </label>
            <div class="md:flex justify-center">
                <div class=" my-1 md:my-0">
                    <div class="flex">
                        <span
                            class="flex items-center leading-normal bg-purple-500 rounded rounded-r-none border border-l-0 border-gray-400 px-3 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                            Min
                        </span>
                        <input
                            class="@error('qte_min') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-l-none w-2/3 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="qte_min" name="qte_min" type="text" value="{{old_value('qte_min', $product ?? null)}}"
                            placeholder="Qté Min.">
                    </div>
                    @error('qte_min')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" my-1 md:my-0">
                    <div class="flex">
                        <span
                            class="flex items-center leading-normal bg-purple-500 rounded rounded-r-none border border-l-0 border-gray-400 px-3 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                            Max
                        </span>
                        <input
                            class="@error('qte_max') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-l-none w-2/3 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="qte_max" name="qte_max" type="text" value="{{old_value('qte_max', $product ?? null)}}"
                            placeholder="Qté Max.">
                    </div>
                    @error('qte_max')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Logistique -->
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">Logistique</h5>
        </div>
        <!-- champs -->
        <div class=" px-5 my-3 w-full">
            <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                Poids
            </label>
            <div class="md:flex w-full">
                <div class=" px-5 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Net
                    </label>

                    <div class="flex">
                        <input
                            class="@error('weight') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-r-none w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="weight" name="weight" type="text" value="{{old_value('weight', $product ?? null)}}"
                            placeholder="0.00">
                        <span
                            class="flex items-center leading-normal bg-purple-500 rounded rounded-l-none border border-l-0 border-gray-400 px-3 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                            Kg
                        </span>
                    </div>
                    @error('weight')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" px-5 w-full">

                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Emballé
                    </label>
                    <div class="flex">
                        <input
                            class="@error('weight_package') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded rounded-r-none w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="weight_package" type="text" name="weight_package"
                            value="{{old_value('weight_package', $product ?? null)}}" placeholder="0.00">
                        <span
                            class="flex items-center leading-normal bg-purple-500 rounded rounded-l-none border border-l-0 border-gray-400 px-3 whitespace-no-wrap text-sm text-gray-100 font-semibold">
                            Kg
                        </span>
                    </div>
                    @error('weight_package')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="w-full flex justify-end my-1">
        <button type="submit"
            class=" text-sm flex items-center  text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1">
            {{isset($product)?'Modifier':'Ajouter'}}
            <i class="material-icons ml-1">
                add_circle_outline
            </i>
        </button>
    </div>
</form>
<!--/table Card-->
@endsection

@section('script')
<script>
    new Vue({
        el: "#variantes",
        data(){
            return {
                hasVariants: false
            }
        },
        methods: {
            updateData(data){
                document.getElementsByName('variants')[0].value = JSON.stringify(data);
            }
        },
        watch:{
            hasVariants(newVal, oldVal){
                document.getElementsByName('hasVariants')[0].value = newVal;
            }
        }
    });
</script>
@endsection
