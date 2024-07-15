<?php
if(isset($_SESSION['flash_message'])) {
    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            ' . htmlspecialchars($_SESSION['flash_message']) . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    unset($_SESSION['flash_message']);
}
?>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
  <div class="container-fluid">
    <span class="navbar-light">SARI | POINT OF SALE AND INVENTORY MANAGEMENT SYSTEM</span>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-3 d-none d-lg-inline text-gray-600 small" style="margin-right: 15px;">
            <?php 
            if(isset($_SESSION['username'])) {
              echo htmlspecialchars($_SESSION['username']);
            } else {
              echo "User";
            }
            ?>
          </span>
        <div class="profile-pic-container">
          <img class="img-profile rounded-circle" id="profilePicture" 
              src="<?php echo isset($_SESSION['profile_picture']) && !empty($_SESSION['profile_picture']) 
                        ? htmlspecialchars($_SESSION['profile_picture']) 
                        : 'assets/img/prof.png'; ?>" 
              alt="Profile Picture">
        </div>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changeProfilePicModal">
            <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Picture
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./functions/logout.php">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- Change Profile Picture Modal -->
<div class="modal fade" id="changeProfilePicModal" tabindex="-1" aria-labelledby="changeProfilePicModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeProfilePicModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="profilePicForm" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="profilePicInput" class="form-label">Select new profile picture</label>
            <input class="form-control" type="file" id="profilePicInput" name="profile_pic" accept="image/*">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="uploadProfilePic">Upload</button>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('uploadProfilePic').addEventListener('click', function(e) {
  e.preventDefault();
  var formData = new FormData(document.getElementById('profilePicForm'));
  
  fetch('./functions/upload-profile-pic.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      return response.text().then(text => {
        throw new Error(`HTTP error! status: ${response.status}, message: ${text}`);
      });
    }
    return response.text();
  })
  .then(text => {
    console.log('Server response:', text);
    alert('Success: ' + text);
    window.location.reload();
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Error: ' + error.message);
  });
});
</script>