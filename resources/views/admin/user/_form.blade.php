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
      <label for="email" class="col-md-2 control-label">
        Е-мэйл
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="email"
               id="email" value="{{ $email }}">
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="role_id" class="col-md-4 control-label">
        Хандах эрх
      </label>
      <div class="col-md-7">
        <select name="role_id" id="role_id" class="form-control" >
          @foreach ($roles as $role)
            <option @if ($role['id'] == $role_id) selected @endif
            value="{{ $role['id'] }}">
              {{ $role['name'] }}
            </option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>