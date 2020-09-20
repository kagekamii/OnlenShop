<! DAFTAR MODAL>
  <!-- The Modal -->
  <div class="modal" id="myRegister">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-kuning">
          <h5 class="modal-title">Register</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body bg-kuning2">
          <div class="container">

            {{ Form::open(['url' => '/en-home/daftar']) }}
            {{ csrf_field() }}
            <div class="form-group">
              {{ Form::label('username', 'Username:') }}
              {{ Form::text('username', '',
                            ['class'=>'form-control', 'placeholder'=>'max. 191 character', 'autofocus', 'required']) }}
            </div>

            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" placeholder="max. 191 character" name="password" required>
            </div>

            <div class="form-group">
              {{ Form::label('nohp', 'Phone Number:') }}
              {{ Form::text('nohp', '',
              ['class'=>'form-control', 'placeholder'=>'your phone number, not neighbor', 'required']) }}
            </div>

            {{ Form::submit('Register', ['class'=>'btn btn-primary']) }}
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
