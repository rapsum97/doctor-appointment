<div class="modal fade" id="prescriptionModal{{ $booking->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Patient Prescription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" class="mb-0 form-horizontal" action="{{ route('prescription') }}">
        @csrf
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-disease"></span>
              </div>
            </div>
            <input id="disease" type="text" class="form-control" name="disease" value="" autocomplete="disease" autofocus placeholder="{{ __('Name of the Diseases') }}" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-sign"></span>
              </div>
            </div>
            <textarea id="symptoms" class="form-control" name="symptoms" rows="3" autocomplete="symptoms" autofocus placeholder="{{ __('Write the Symptoms') }}" required></textarea>
          </div>
          <div id="app">
            <add-btn></add-btn>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-diagnoses"></span>
              </div>
            </div>
            <textarea id="medicine_procedure" class="form-control" name="medicine_procedure" rows="3" autocomplete="medicine_procedure" autofocus placeholder="{{ __('Procedure to Use Medicines') }}" required></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-comments"></span>
              </div>
            </div>
            <textarea id="feedback" class="form-control" name="feedback" rows="3" autocomplete="feedback" autofocus placeholder="{{ __('Write Your Feedback') }}" required></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fas fa-signature"></span>
              </div>
            </div>
            <input id="signature" type="text" class="form-control" name="signature" value="" autocomplete="signature" autofocus placeholder="{{ __('Signature Here...') }}" required>
          </div>
          <input type="hidden" name="user_id" class="form-control" value="{{ $booking->user_id }}">
          <input type="hidden" name="doctor_id" class="form-control" value="{{ $booking->doctor_id }}">
          <input type="hidden" name="date" class="form-control mb-3" value="{{ $booking->date }}">
          <div class="row mb-0">
            <div class="col-12">
              <button type="submit" class="btn btn-sm bg-gradient-success"><i class="fas fa-user mr-2"></i>{{ __('Update Profile') }}</button>
              <button type="reset" class="btn btn-sm bg-gradient-info"><i class="fas fa-times mr-2"></i>{{ __('Reset') }}</button>
            </div>
          </div>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-primary" data-dismiss="modal">Close Prescription</button>
      </div>
    </div>
  </div>
</div>