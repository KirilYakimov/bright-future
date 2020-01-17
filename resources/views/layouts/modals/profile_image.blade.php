<!-- ProfileImage Update Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Change profile picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="POST" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data" autocomplete="off">
                @method('PATCH')

                @csrf

                <div class="modal-body">
                    <div class="row">

                        <div class="custom-file ml-2 mr-2">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Upload image</label>
                        </div>

                        @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_image_profile" class="btn btn-primary">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>