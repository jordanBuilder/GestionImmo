@php
  
  $class = $class ?? null;
  $name  = $name ?? ''; 
  $value = $value ??''; 
  $label  = ucfirst($name);
@endphp

<div @class(["form-group",$class])>
    <label for="{{$name}}">{{$label}}</label>
    <select name="{{name}}" id="{{name}}"></select>
    @error($name)
        <div class="invalid-feedback">
          {{$message}}
        </div>
    @enderror
</div>