<?php $this->view('/admin/admin-header', $data); ?>


<?php if(!empty($row)):?>
<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
      <li class="breadcrumb-item active"><?= esc($row->firstname); ?> <?= esc($row->lastname); ?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <img src="<?= ROOT ?>/<?= $row->image; ?>" alt="Profile" class="rounded-circle" style="width:100px; max-width: 100px; height: 100px; object-fit:cover;" >
          <h2><?= esc($row->firstname); ?> <?= esc($row->lastname); ?></h2>
          <h3><?= esc($row->role); ?> </h3>
          <div class="social-links mt-2">
            <a href="<?= esc($row->twitter_link); ?>" class="twitter" target=_blank><i class="bi bi-twitter"></i></a>
            <a href="<?= esc($row->facebook_link); ?>" class="facebook" target=_blank><i class="bi bi-facebook"></i></a>
            <a href="<?= esc($row->instagram_link); ?>" class="instagram" target=_blank><i class="bi bi-instagram"></i></a>
            <a href="<?= esc($row->linkedin_link); ?>" class="linkedin" target=_blank><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">
    	<?php show($row); ?>
      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" id="profile-overview-tab">Overview</button>
            </li>

            <li class="nav-item">
              <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" id="profile-edit-tab">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings" id="profile-settings-tab">Settings</button>
            </li>

            <li class="nav-item">
              <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" id="profile-change-password-tab">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic"><?= esc($row->about); ?></p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8"><?= esc($row->firstname); ?> <?= esc($row->lastname); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company</div>
                <div class="col-lg-9 col-md-8"><?= esc($row->company); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Job</div>
                <div class="col-lg-9 col-md-8"><?= esc($row->job); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Country</div>
                <div class="col-lg-9 col-md-8"><?= esc($row->country); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8"><?= esc($row->address); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8"><?= esc($row->phone); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?= esc($row->email); ?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">

                    <div class="d-flex">
                      <img class="js-image-preview" src="<?= ROOT ?>/<?= $row->image; ?>" alt="Profile" 
                      style="width:200px; max-width: 200px; height: 200px; object-fit:cover; ">
                      <div class="js-filename m-2"> Selected File : None</div>  
                    </div>
                    

                    <div class="pt-2">
                      <label class="btn btn-primary btn-sm" title="Upload new profile image">
                        <i class="text-white bi bi-upload"></i>
                        <input onchange="load_image(this.files[0])" type="file" name="image" style="display:none">                           
                      </label>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="firstname" type="text" class="form-control" id="firstname" value="<?= set_value('firstname', $row->firstname); ?>">
                  </div>
                   <?php if(!empty($errors['firstname'])):?>
                      <small class="text-danger"><?= $errors['firstname']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                  <label for="lastname" class="col-md-4 col-lg-3 col-form-label">last Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="lastname" type="text" class="form-control" id="lastname" value="<?= set_value('lastname', $row->lastname); ?>">
                  </div>
                  <?php if(!empty($errors['lastname'])):?>
                      <small class="text-danger"><?= $errors['lastname']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px"><?= set_value('about', $row->about); ?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" type="text" class="form-control" id="company" value="<?= set_value('company', $row->company); ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control" id="Job" value="<?= set_value('job', $row->job); ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" type="text" class="form-control" id="Country" value="<?= set_value('country', $row->country); ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="Address" value="<?= set_value('address', $row->address); ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="<?= set_value('phone ', $row->phone ); ?>">
                  </div>
                  <?php if(!empty($errors['phone'])):?>
                      <small class="text-danger"><?= $errors['phone']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="<?= set_value('email ', $row->email ); ?>">
                  </div>
                  <?php if(!empty($errors['email'])):?>
                      <small class="text-danger"><?= $errors['email']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                  <label for="twitter_link" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter_link" type="text" class="form-control" id="twitter_link" value="<?= set_value('twitter_link ', $row->twitter_link ); ?>">
                  </div>

                  <?php if(!empty($errors['twitter_link'])):?>
                      <small class="text-danger"><?= $errors['twitter_link']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                  <label for="facebook_link" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook_link" type="text" class="form-control" id="facebook_link" value="<?= set_value('facebook_link ', $row->facebook_link ); ?>">
                  </div>
                  <?php if(!empty($errors['facebook_link'])):?>
                      <small class="text-danger"><?= $errors['facebook_link']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                  <label for="instagram_link" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instagram_link" type="text" class="form-control" id="instagram_link" value="<?= set_value('instagram_link ', $row->instagram_link ); ?>">
                  </div>
                  <?php if(!empty($errors['instagram_link'])):?>
                      <small class="text-danger"><?= $errors['instagram_link']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                  <label for="linkedin_link" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin_link" type="text" class="form-control" id="linkedin_link" value="<?= set_value('linkedin_link ', $row->linkedin_link ); ?>">
                  </div>
                  <?php if(!empty($errors['linkedin_link'])):?>
                      <small class="text-danger"><?= $errors['linkedin_link']; ?></small>
                    <?php endif; ?>
                </div>

                <div class="js-prog progress my-3 hide">
                  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Saving.. 50%</div>
                </div>
                <div class="text-center">
                  <a href="<?= ROOT ?>/admin">
                      <button type="button" class="btn btn-primary float-start">Back</button>
                  </a>
                  <button type="submit" class="btn btn-danger float-end">Save Changes</button>

                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End settings Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form>

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>

  </div>
</section>

<?php else: ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	That Profile was not found!
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>


<script type="text/javascript">
  


  var tab = sessionStorage.getItem('tab') ? sessionStorage.getItem('tab') : "#profile-overview";

  function show_tab(tab_name){

    const someTabTriggerE1 = document.querySelector(tab_name+"-tab");
    const tab = new bootstrap.Tab(someTabTriggerE1);
    tab.show();

  }

  function set_tab(tab_name){
      tab = tab_name
      sessionStorage.setItem('tab', tab_name);
  }

  //function to show image name and image preview on image change
  function load_image(file){
    document.querySelector('.js-filename').innerHTML = "Selected File:" + file.name;

    var mylink = window.URL.createObjectURL(file);
    document.querySelector('.js-image-preview').src = mylink;

  }  

  window.onload= function(){
    show_tab(tab);
  }


  //upload function

  function save_profile(){
    
  }
</script>

<?php $this->view('admin/admin-footer', $data) ?>