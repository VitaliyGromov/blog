@props(['categories' => [], 'category_id' => ''])

<select name="category_id" class="form-control">
    @foreach($categories as $category)
         <option value="{{$category['id']}}" @if ($category_id == $category['id'])
             selected
         @endif>
              {{$category['category_name']}}
         </option>
    @endforeach
</select>