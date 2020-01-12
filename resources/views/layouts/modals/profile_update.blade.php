 <!-- User Update Modal -->
 <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title text-center" id="passwordModalLabel">Edit user details</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" autocomplete="off">
                 @method('PATCH')

                 @csrf

                 <div class="modal-body">
                     <div class="form-row">
                         <div class="col-md-6 mb-3">
                             <label for="username">{{ __('Username') }}</label>

                             <div>
                                 <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" id="validationServer02" placeholder="Username" name="username" value="{{ old('username') ?? $user['username'] }}" required autocomplete="username" autofocus>

                                 @error('username')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="col-md-6 mb-3">
                             <label for="email">{{ __('Email address') }}</label>

                             <div>
                                 <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') ?? $user['email'] }}" required autocomplete="email" autofocus>

                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>
                     </div>

                     <div class="form-row">
                         <div class="col-md-6 mb-3">
                             <label for="firstname">{{ __('First name') }}</label>

                             <div>
                                 <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First name" name="firstname" value="{{ old('firstname') ?? $user['firstname'] }}" required autocomplete="firstname" autofocus>

                                 @error('firstname')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="col-md-6 mb-3">
                             <label for="lastname">{{ __('Last name') }}</label>

                             <div>
                                 <input id="lastname" value="{{ $user['lastname'] }}" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="First name" name="lastname" value="{{ old('lastname') ?? $user['lastname'] }}" required autocomplete="lastname" autofocus>

                                 @error('lastname')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                         </div>
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" id="update_profile" name="update_profile" class="btn btn-primary">Update profile</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>