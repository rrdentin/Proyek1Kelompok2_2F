<div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control form-control-sm" name="username" type="text"
                            placeholder="Input your username" value="{{ $user->username }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input class="form-control form-control-sm" name="name" type="text"
                            placeholder="Input your name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control form-control-sm" name="email" type="email"
                            placeholder="Input your email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" @checked($user->level == 'admin') name="level"
                                id="option1" value="admin" ariadescribedby="admin" required>
                            <label class="form-check-label" for="admin">
                                Admin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" @checked($user->level == 'panitia') name="level"
                                id="option2" value="panitia" ariadescribedby="user" required>
                            <label class="form-check-label" for="panitia">
                                Panitia
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" @checked($user->level == 'user') name="level"
                                id="option3" value="user" ariadescribedby="user" required>
                            <label class="form-check-label" for="user">
                                User
                            </label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>
