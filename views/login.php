<div id="id01" class="modal">
  <script>
	  document.getElementById("id01").style.display='block';
  </script>
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
    </div>
	<h2 class="title">Authorization</h2>
    <div class="container">
      <label for="userName"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="userName" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="login">Login</button>
    </div>
    <div class="error">
	    <?php
            echo $error;
    ?>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      	<span class="psw">Don't have a profile? 
	  		<a href="?action=registration" onclick="document.getElementById('id02').style.display='block'">Registrarion</a>
		</span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>