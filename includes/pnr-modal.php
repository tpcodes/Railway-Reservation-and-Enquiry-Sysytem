
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
.btn-status
{
    border-radius:45px;
    
}

</style>
<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
<!-- Modal -->
<div class="modal fade" id="pnr-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="pnrstatus.php" method="post">
        <h4 class="modal-title text-center mb-5 fw-bold" id="staticBackdropLabel">CHECK PNR STATUS</h4>
        <div class="form-floating mb-3 mx-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="pnr">
  <label for="floatingInput">Enter PNR Number: </label>
</div>
 

<div class="d-grid gap-2">
  <button class="btn btn-warning text-white fw-bold search-btn btn-status mx-3 mb-4" type="submit">Get status</button>
  
</div>



        </form>
   
      </div>
     
    </div>
  </div>
</div>