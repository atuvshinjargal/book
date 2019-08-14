<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="code" class="col-md-2 control-label">
        Код
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="code" autofocus
               id="code" value="{{ $code }}">
      </div>
    </div>
    <div class="form-group">
      <label for="firstname" class="col-md-2 control-label">
        Овог
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="firstname"
               id="firstname" value="{{ $firstname }}">
      </div>
    </div>
     <div class="form-group">
      <label for="lastname" class="col-md-2 control-label">
        Нэр
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="lastname"
               id="lastname" value="{{ $lastname }}">
      </div>
    </div>
    <div class="form-group">
      <label for="work" class="col-md-2 control-label">
        Албан тушаал
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="work"
               id="work" value="{{ $work }}">
      </div>
    </div>
    <div class="form-group">
      <label for="graduate" class="col-md-2 control-label">
        Төгссөн сургууль
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="graduate" rows="5"
                  id="graduate">{{ $graduate }}</textarea>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="form-group">
      <label for="degree" class="col-md-2 control-label">
        Эрдмийн цол, зэрэг
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="degree" rows="5"
                  id="degree">{{ $degree }}</textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="direction" class="col-md-2 control-label">
        Судалгааны чиглэл
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="direction" rows="5"
                  id="direction">{{ $direction }}</textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="schooling" class="col-md-2 control-label">
        Сургалтын үйл ажиллагаа
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="schooling" rows="5"
                  id="schooling">{{ $direction }}</textarea>
      </div>
    </div>
  </div>
</div>