<div class="form-group">
  <label for="name" class="col-md-4 control-label">
    Нэр
  </label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="name"
           id="name" value="{{ old('name') }}">
  </div>
</div>
<div class="form-group">
  <label for="email" class="col-md-4 control-label">
    Е-мэйл
  </label>
  <div class="col-md-6">
    <input type="text" class="form-control" name="email"
           id="email" value="{{ old('email') }}">
  </div>
</div>
<div class="form-group">
  <label for="email" class="col-md-4 control-label">
    Нууц үг
  </label>
  <div class="col-md-6">
    <input type="password" class="form-control" name="password"
           id="password">
  </div>
</div>
<div class="form-group">
  <label for="password_confirmation" class="col-md-4 control-label">
    Нууц үгээ дахин оруулна уу
  </label>
  <div class="col-md-6">
    <input type="password" class="form-control" name="password_confirmation"
           id="password_confirmation">
  </div>
</div>
