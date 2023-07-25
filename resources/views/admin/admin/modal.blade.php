<div class="modal fade" id="adminModal{{ $item->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Admin Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        @if ($item->image != '')
          <p><img src="{{ asset('images/users') }}/{{ $item->image }}" class="profile-user-img-modal img-fluid img-circle"></p>
        @else
          <p><img src="{{ asset('images/users/profile-default.svg') }}" class="profile-user-img-modal img-fluid img-circle"></p>
        @endif
        <p class="badge badge-pill badge-dark">{{ ucfirst($item->role->name) }}</p>
        <div class="style1 mt-3">
          <p><b>Full Name:</b> {{ $item->name }}</p>
          <p><b>Email Address:</b> {{ $item->email }}</p>
          <p><b>Gender:</b> {{ ucfirst($item->gender) }}</p>
          @if ($item->address != '')
            <p><b>Address:</b> {{ $item->address }}, {{ $item->country }}, {{ $item->city }} - {{ $item->pincode }}</p>
          @else
            <p><b>Address:</b> -</p>
          @endif
          @if ($item->phone != '')
            <p><b>Contact Number:</b> {{ $item->phone }}</p>
          @else
            <p><b>Contact Number:</b> -</p>
          @endif
          @if ($item->education != '')
            <p><b>Highest Qualification:</b> {{ $item->education }}</p>
          @else
            <p><b>Highest Qualification:</b> -</p>
          @endif
          @if ($item->description != '')
            <p><b>About/Bio:</b> {{ $item->description }}</p>
          @else
            <p><b>About/Bio:</b> -</p>
          @endif
        </div>
      </div>
      <div class="modal-footer justify-content-right">
        <button type="button" class="btn bg-gradient-primary" data-dismiss="modal">Close Information</button>
      </div>
    </div>
  </div>
</div>