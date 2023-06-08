<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control form-control-sm" name="username" type="text" placeholder="Input your username" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input class="form-control form-control-sm" name="name" type="text" placeholder="Input your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control form-control-sm" name="email" type="email" placeholder="Input your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control form-control-sm" name="password" type="password" placeholder="Input your password" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordconfirm">Confirm Password:</label>
                        <input class="form-control form-control-sm" name="password_confirmation" type="password" placeholder="Confirm your password" required>
                    </div>
                    <input type="hidden" name="level" value="user">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>