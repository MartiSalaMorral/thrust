<div>
    @if ($imageField->displayPath($object))
        <img src="{{ url($imageField->displayPath($object)) }}" style="max-height:200px; max-width:400px;">
    @endif
</div>


<div class="inline mt4">
    <form action="{{ route('thrust.image.store', [$resourceName, $object->id, $imageField->field]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="image">
        <br>
        <button>{{ __("thrust::messages.save") }}</button>
    </form>
</div>
<div class="inline" style="margin-left: -205px;">
    <form action="{{ route('thrust.image.delete', [$resourceName, $object->id, $imageField->field]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('delete')  }}
        <button class="secondary">@icon(trash) {{ __("thrust::messages.delete") }}</button>
    </form>
</div>
