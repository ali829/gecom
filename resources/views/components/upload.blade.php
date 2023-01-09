<?php $image_ids = ''; ?>
<div id="images_container" class="flex flex-wrap justify-center lg:justify-start md:my-3 px-2">
    @foreach($images as $image)
        <div class="slide" data-id="{{$image->id}}">
            <div class="mx-1 my-1 md:my-0">
                <div class="relative">
                    <div class="static">
                        <img src="{{asset('images/uploads/' . $image->image)}}"
                            class="object-cover h-40 w-40 border-dashed border border-gray-800 p-1">
                    </div>
                    <div class="absolute top-0 right-0">
                        <div class="w-full flex justify-center my-1 ">
                            <button type="button" class="text-gray-100 font-semibold rounded mx-auto pr-1" onclick="delete_image({{$image->id}})">
                                <i class="material-icons bg-red-500 hover:bg-red-700 rounded-full">
                                    cancel
                                </i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $image_ids .= ('|' . $image->id); ?>
    @endforeach
</div>
<!-- upload zone -->
<div class="my-1 md:my-0 md:py-3 {{(count($images) >= $max) ? 'hidden' : ''}}" id="upload_zone">
    <button type="button" id="customButton" class="border-dashed border-2 w-40 h-40 rounded mx-auto flex items-center justify-center">
        <div>
            <svg version="1.1" class="h-8 w-8 text-grey  mx-auto" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60"
                style="enable-background:new 0 0 60 60;" xml:space="preserve" >
                <g>
                    <path
                        d="M50.975,20.694c-0.527-9-7.946-16.194-16.891-16.194c-5.43,0-10.688,2.663-13.946,7.008
                    c-0.074-0.039-0.153-0.065-0.228-0.102c-0.198-0.096-0.399-0.188-0.605-0.269c-0.115-0.045-0.23-0.086-0.346-0.127
                    c-0.202-0.071-0.406-0.133-0.615-0.19c-0.116-0.031-0.231-0.063-0.349-0.09c-0.224-0.051-0.452-0.09-0.683-0.124
                    c-0.102-0.015-0.202-0.035-0.305-0.047C16.677,10.523,16.341,10.5,16,10.5c-4.962,0-9,4.037-9,9c0,0.129,0.007,0.255,0.016,0.381
                    C2.857,22.148,0,26.899,0,31.654C0,38.737,5.762,44.5,12.845,44.5H18c0.552,0,1-0.447,1-1s-0.448-1-1-1h-5.155
                    C6.865,42.5,2,37.635,2,31.654c0-4.154,2.705-8.466,6.432-10.253L9,21.13V20.5c0-0.123,0.008-0.249,0.015-0.375l0.009-0.175
                    l-0.012-0.188C9.007,19.675,9,19.588,9,19.5c0-3.859,3.14-7,7-7c0.309,0,0.614,0.027,0.917,0.067
                    c0.078,0.01,0.155,0.023,0.232,0.036c0.268,0.044,0.532,0.102,0.792,0.177c0.034,0.01,0.069,0.016,0.102,0.026
                    c0.286,0.087,0.565,0.198,0.838,0.322c0.069,0.031,0.137,0.065,0.205,0.099c0.242,0.119,0.479,0.251,0.707,0.399
                    C21.72,14.875,23,17.039,23,19.5c0,0.553,0.448,1,1,1s1-0.447,1-1c0-2.754-1.246-5.219-3.2-6.871
                    C24.666,8.879,29.388,6.5,34.084,6.5c7.744,0,14.178,6.135,14.848,13.887c-1.022-0.072-2.553-0.109-4.083,0.125
                    c-0.546,0.083-0.921,0.593-0.838,1.139c0.075,0.495,0.501,0.85,0.987,0.85c0.05,0,0.101-0.004,0.152-0.012
                    c2.224-0.336,4.543-0.021,4.684-0.002C54.49,23.372,58,27.661,58,32.472C58,38.001,53.501,42.5,47.972,42.5H44
                    c-0.552,0-1,0.447-1,1s0.448,1,1,1h3.972C54.604,44.5,60,39.104,60,32.472C60,26.983,56.173,22.06,50.975,20.694z" />
                    <path d="M31.708,30.794c-0.092-0.093-0.203-0.166-0.326-0.217c-0.244-0.101-0.52-0.101-0.764,0
                    c-0.123,0.051-0.233,0.124-0.326,0.217l-7.999,7.999c-0.391,0.391-0.391,1.023,0,1.414C22.488,40.402,22.744,40.5,23,40.5
                    s0.512-0.098,0.707-0.293L30,33.914V54.5c0,0.553,0.448,1,1,1s1-0.447,1-1V33.914l6.293,6.293C38.488,40.402,38.744,40.5,39,40.5
                    s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L31.708,30.794z" />
                </g>
            </svg>
            <p class="block text-grey text-xs font-semibold">Choisir une image</p>
            <p class="block text-grey text-xs font-semibold">(.JPEG, .PNG Ou .GIF)</p>
        </div>
    </button>
</div>
<input type="hidden" name="image_ids" id="image_ids" value="{{$image_ids}}">

@section('script')
@parent
<script>
const realFileBtn = document.getElementById("imageUpload");
const customBtn = document.getElementById("customButton");
const image_prefix = '{{asset('images/uploads/')}}';

@if(isset($product) && count($product->images) > 0)
    let images = <?= json_encode($product->images) ?>;
@else
    let images = [];
@endif

customBtn.addEventListener("click", function() {
    realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
    let formData = new FormData();
    formData.append("image", realFileBtn.files[0]);

    $.ajax({
        url: '{{route('image.upload')}}',
        data: formData,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(data){
            images.push(data.image);
            update_images();
        },
        statusCode: {
            422: function() {
                alert( "Format d'image invalide!" );
            }
        }
    });
});

function delete_image(image_id){
    images = images.filter(function(image){
        return image.id != image_id;
    });

    update_images();
}

function update_images(){
    let html = '';
    let image_ids = '';

    for (image in images) {
        image_ids += '|' + images[image].id;

        let src = image_prefix + '/' + images[image].image;

        html += '<div class="slide" data-id="' + images[image].id + '"><div class="mx-1 my-1 md:my-0"><div class="relative"><div class="static"><img src="' + src + '"class="object-cover w-40 h-40 border-dashed border border-gray-800 p-1"></div><div class="absolute top-0 right-0"><div class="w-full flex justify-center my-1 "><button type="button" class="text-gray-100 font-semibold rounded mx-auto pr-1" onclick="delete_image(' + images[image].id + ')"><i class="material-icons bg-red-500 hover:bg-red-700 rounded-full">cancel</i></button></div></div></div></div></div>';
    }

    $('#image_ids').val(image_ids);
    $('#images_container').html(html);

    let uploadzone_classes = document.getElementById("upload_zone").classList;

    if(images.length >= {{$max}}){
        uploadzone_classes.add('hidden');
    } else {
        uploadzone_classes.remove('hidden');
    }
}

var el = document.getElementById('images_container');
var sortable = new Sortable(el, {
    animation: 150,
    onUpdate: function (evt) {
        let slides = document.getElementsByClassName('slide');
        var order = [];
        for (i = 0; i < slides.length; i++) {
            order.push(slides[i].dataset.id);
        }

        var sorted = [];
        for (i = 0; i < order.length; i++) {
            for(j = 0; j < images.length; j++){
                if(images[j].id == order[i]){
                    sorted.push(images[j]);
                    break;
                }
            }
        }
        images = sorted;
        update_images();
    }
});
</script>
@endsection