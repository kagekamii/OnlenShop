<! DAFTAR MODAL>
  <!-- The Modal -->
  <div class="modal" id="myRegister">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-kuning">
          <h5 class="modal-title">Daftar</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body bg-kuning2">
          <div class="container">

            {{ Form::open(['url' => 'home/daftar']) }}
            {{ csrf_field() }}
            <div class="form-group">
              {{ Form::label('username', 'Username:') }}
              {{ Form::text('username', '',
                            ['class'=>'form-control', 'placeholder'=>'maks. 191 karakter', 'autofocus', 'required']) }}
            </div>

            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" placeholder="maks. 191 karakter" name="password" required>
            </div>

            <div class="form-group">
              {{ Form::label('nohp', 'No. Handphone:') }}
              {{ Form::text('nohp', '',
              ['class'=>'form-control', 'placeholder'=>'nomor hp anda, bkn teman anda', 'required']) }}
            </div>

            {{ Form::submit('Daftar', ['class'=>'btn btn-primary']) }}
            {{ Form::close() }}

          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer bg-kuning">
        </div>

      </div>
    </div>
  </div>

  <script src="{{ asset('js/autofocusModal.js') }}"></script>
