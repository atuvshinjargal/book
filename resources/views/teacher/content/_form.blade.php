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
      <label for="text" class="col-md-2 control-label">
        Текст
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="text" rows="14"
                  id="text">{{ $text }}</textarea>
      </div>
    </div>
  </div>
  <div class="col-md-4">
     <div class="form-group">
      <label for="checkVideo" class="col-md-4 control-label">
        Видео оруулах эсэх.
      </label>
      <div class="col-md-7">
          <input type="checkbox" name="checkVideo" id="checkVideo" class="form-control" @if ($video) checked @endif>
      </div>
    </div>
    <div class="form-group">
      <label for="video" class="col-md-4 control-label">
        Видео
      </label>
      <div class="col-md-7">
        <select name="video" id="video" class="form-control" @if (!$video) disabled @endif>
          @foreach ($files as $file)
            @if (Storage::mimeType($file) == 'application/x-shockwave-flash')
              <option @if ($file==$video) selected @endif
              value="{{ $file }}" >
                {{ $file }}
              </option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="week" class="col-md-4 control-label">
        Нээгдэх 7 хоног
      </label>
      <div class="col-md-7">
        <select name="week" id="week" class="form-control" >
          @for ($i=1;$i<$lesson->duration_time+1;$i++)
            <option @if ($i==$week) selected @endif
            value="{{ $i }}">
              {{ $i }}
            </option>
          @endfor
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="homework" class="col-md-4 control-label">
        Оюутнаас файлаар даалгавар авах 
      </label>
      <div class="col-md-7">
          <input type="checkbox" value="1" name="homework" id="homework" class="form-control" @if ($homework) checked @endif>
      </div>
    </div>
  </div>
</div>
