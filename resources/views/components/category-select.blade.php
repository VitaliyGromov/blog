@props(['categories' => []])

<select name="category_id" class="form-control">
    @foreach($categories as $category)
         <option value="{{$category['id']}}">
              {{$category['category_name']}}
         </option>
    @endforeach
</select>