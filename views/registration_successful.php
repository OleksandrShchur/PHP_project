<div id="id03" class="modal">
    <script>
        document.getElementById('id03').style.display='block';
    </script>

    <form class="modal-content animate">
        <div class="container">
            <h2 class="title">Registration successful. Our congratulation</h2>
            <a class="title" href="http://localhost/PHP/?action=main">Start page</a>
        </div>

    </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
