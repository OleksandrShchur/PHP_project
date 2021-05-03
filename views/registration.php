<div id="id02" class="modal">
  <script>
	document.getElementById('id02').style.display='block';
  </script>
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
    </div>
	<h2 class="title">Registration form</h2>

    <div class="container">
	    <label for="userName">Username</label>
		<input type="text" placeholder="Enter Username" name="userName" required>
		<div class="error">
			<?php
				echo $userName_error;
			?>
		</div>
	</div>
	<div class="container">
	    <label for="userName">Password</label>
		<input type="password" placeholder="Enter Password" name="password" required>
		<div class="error">
			<?php
				echo $password_error;
			?>
		</div>
	</div>
	   
	<div class="container">
	    <label for="userName">Repeat password</label>
		<input type="password" placeholder="Repeat Password" name="password_again" required>
		<div class="error">
			<?php
				echo $password_again_error;
			?>
		</div>
	</div>

	<div class="container">
	    <label for="userName">Email</label>
		<input type="text" placeholder="Enter Email" name="email" required>
		<div class="error">
			<?php
				echo $email_error;
			?>
		</div>
	</div>
	<div class="container">
	    <label for="userName">Region </label>
		<select name="region" id="region">
			<?php
				$regionNumber = fopen("views/data/regionNumber.dat","r");
				$regionName = fopen("views/data/regionName.dat","r");
				echo($regionName);
				while(!feof($regionNumber)){
					echo "<option value='".fgets($regionNumber)."'>".fgets($regionName)."</option><br/>";
				}
				fclose($regionNumber);
				fclose($regionName);
			?>
        </select>
		<div class="error">
			<?php
				echo $region_error;
			?>
		</div>
	</div>
	<div class="container">
		<input type="submit" value="Sign in" name="button">
	</div>

  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>