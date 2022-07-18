<style>
.modal-header {
    background-color: #213d77;
    color: white;

}

.btn-primary {
    background-color: #213d77;
}
</style>
<!-- Modal -->
<div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white fw-bold " id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-xs-4 col-xs-offset-4">
                    <form method="POST" action="Settings_script.php">
                        <div class="mb-3">

                            <input type="password" class="form-control mt-3" placeholder="Old Password"
                                name="old_password" pattern=".{6,}" required="true">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="New Password (Min. 6 characters)"
                                name="new_password" pattern=".{6,}" required="true">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Re-type New Password"
                                name="re_type_new_password" pattern=".{6,}" required="true">

                        </div>



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="Submit">Change</button>
            </div>
            </form>
        </div>
    </div>
</div>