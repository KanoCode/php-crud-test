  <div class="modal fade" id="usermodal" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Adding and Updating Users</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="./partials/user.php" method="POST" enctype="multipart/form-data" id="addform">
                  <div class="modal-body">

                      <div class="form-group">

                          <label for="">Name</label>

                          <div class="input-group">

                              <div class="input-group-prepend">

                                  <span class="input-group-text bg-dark">
                                      <i class="fas fa-user-alt text-light"></i>
                                  </span>
                              </div>

                              <input name="username" autocomplete="off" required id="username" type="text" placeholder="search user" class="form-control">
                          </div>
                      </div>

                      <!-- email -->

                      <div class="form-group">

                          <label for="">Email: </label>

                          <div class="input-group">

                              <div class="input-group-prepend">

                                  <span class="input-group-text bg-dark">
                                      <i class="fas fa-envelope-open text-light"></i>
                                  </span>
                              </div>

                              <input name="email" autocomplete="off" required id="email" name="email" type="email" placeholder="email" class="form-control">
                          </div>
                      </div>

                      <!-- phone number -->


                      <div class="form-group">

                          <label for="">Phone Number:</label>

                          <div class="input-group">

                              <div class="input-group-prepend">

                                  <span class="input-group-text bg-dark">
                                      <i class="fas fa-phone text-light"></i>
                                  </span>
                              </div>

                              <input name="phone_number" autocomplete="off" required id="phonenumber" name="phonenumber" type="text" placeholder="search user" class="form-control">
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-dark">Submit</button>
                  </div>

              </form>
          </div>
      </div>
  </div>