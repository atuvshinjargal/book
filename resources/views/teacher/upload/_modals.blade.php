{{-- Delete File Modal --}}
<div class="modal fade" id="modal-file-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Анхаар!</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i>  
          Та устгахдаа итгэлтэй байна уу? Устгах файлын нэр:
          <kbd><span id="delete-file-name1">file</span></kbd>
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/teacher/upload/file">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_file" id="delete-file-name2">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete File
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Delete Folder Modal --}}
<div class="modal fade" id="modal-folder-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Анхаар!</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i>  
          Та устгахдаа итгэлтэй байна уу? Устгах файлын нэр:
          <kbd><span id="delete-folder-name1">folder</span></kbd>
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/teacher/upload/folder">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_folder" id="delete-folder-name2">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete Folder
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Upload File Modal --}}
<div class="modal fade" id="modal-file-upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="/teacher/upload/file"
            class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            ×
          </button>
          <h4 class="modal-title">Шинээр файл хуулах</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="file" class="col-sm-3 control-label">
              Файл
            </label>
            <div class="col-sm-8">
              <input type="file" id="file" name="file">
            </div>
          </div>
          <div class="form-group">
            <label for="file_name" class="col-sm-3 control-label">
              Файлын нэрыг солих
            </label>
            <div class="col-sm-4">
              <input type="text" id="file_name" name="file_name"
                     class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Болих
          </button>
          <button type="submit" class="btn btn-primary">
            Файл хуулах
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- View Image Modal --}}
<div class="modal fade" id="modal-image-view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Зураг харах</h4>
      </div>
      <div class="modal-body">
        <img id="preview-image" src="" class="img-responsive">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>