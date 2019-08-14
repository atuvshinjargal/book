<div class="row">
  <div class="col-md-8">
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
  <div class="col-md-4">
    <div class="form-group">
      <label for="image" class="col-md-4 control-label">
        Зураг
      </label>
      <div class="col-md-7">
        <select name="image" id="image" class="form-control" >
          @foreach ($files as $file)
            @if (Storage::mimeType($file) == 'image/jpeg')
              <option @if ($file==$image) selected @endif
              value="{{ $file }}" >
                {{ $file }}
              </option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="start_date" class="col-md-4 control-label">
        Эхлэх өдөр
      </label>
      <div class="col-md-7">
        <input class="form-control" name="start_date" id="start_date"
               type="text" value="{{ $start_date }}">
      </div>
    </div>
    <div class="form-group">
      <label for="duration_time" class="col-md-4 control-label">
        Үргэлжлэх 7 хоног
      </label>
      <div class="col-md-7">
        <select name="duration_time" id="duration_time" class="form-control" >
          @for ($i=1;$i<17;$i++)
            <option @if ($i==16) selected @endif
            value="{{ $i }}">
              {{ $i }}
            </option>
          @endfor
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="stop_date" class="col-md-4 control-label">
        Дуусах өдөр
      </label>
      <div class="col-md-7">
        <input class="form-control" name="stop_date" id="stop_date"
               type="text" value="{{ $stop_date }}">
      </div>
    </div>
  </div>
</div>