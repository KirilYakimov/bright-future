 <!-- Password Update Modal -->
 <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="passwordModalLabel">Change password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" autocomplete="off">
                                @method('PATCH')

                                @csrf

                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Current Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password" name="new_password" required>

                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password-comfig" type="password" class="form-control" placeholder="Confirm Password" name="new_password_confirmation" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update_password" class="btn btn-primary">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
