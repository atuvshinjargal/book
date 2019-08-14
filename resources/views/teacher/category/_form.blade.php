<div class="row">
  <div class="col-md-8">
    <div class="form-group">
      <label for="name" class="col-md-2 control-label">
        Нэр
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="name"
               id="name" value="{{ $name }}">
      </div>
    </div>
    <div class="form-group">
      <label for="description" class="col-md-2 control-label">
        Тодорхойлолт
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="description" rows="14"
                  id="description">{{ $description }}</textarea>
      </div>
    </div>
  </div>
</div>