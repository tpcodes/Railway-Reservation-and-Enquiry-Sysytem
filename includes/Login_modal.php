
<style>
    .modal-title
{
    color: #213d77;
}
.modal-header {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: none;
    border-top-left-radius: calc(0.3rem - 1px);
    border-top-right-radius: calc(0.3rem - 1px);
}
.btn-foot
{
    background-color:#213d77;
    color:white;
    
}

</style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- Modal -->
<div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="login_script.php" method="post">
        <h3 class="modal-title text-center mb-3 fw-bold" id="staticBackdropLabel">LOGIN</h3>
        <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
  <label for="floatingInput">Email address/Username</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
  <label for="floatingPassword">Password</label>
</div> 

<div class="g-recaptcha mb-3 mt-3 " data-sitekey="6LffrWwgAAAAAOrNpm5pZrVpv-0bDwDjTSNTf7_o"></div>

<div class="d-grid gap-2">
  <button class="btn btn-warning text-white fw-bold search-btn "  id='login' type="submit">SIGN IN</button>
  
</div>



        </form>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-foot"><a href="register.php" class=" text-decoration-none text-white">REGISTER</a></button>

      </div>
    </div>
  </div>
</div>

