
  <! LOGIN MODAL>
  <!-- The Modal -->
  <div class="modal" id="myLogin">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-green1">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body bg-green2">
          <div class="container">

            <form action="/en-home/login" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" placeholder="max. 191 character" name="username" autofocus required>
              </div>

              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="max. 191 character" name="password"
                  required>
              </div>

              <button id="loginClick" type="submit" class="btn btn-primary">Login</button>
            </form>

          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer bg-green1">
        </div>

      </div>
    </div>
  </div>

  <script src="{{ asset('js/autofocusModal.js') }}"></script>
