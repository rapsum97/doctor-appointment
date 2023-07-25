@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Doctor</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Doctor</li>
          <li class="breadcrumb-item active">Update Doctor</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if (Session::has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <i class="icon fas fa-check"></i>{{ Session::get('message') }}
      </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Doctor</h3>
          </div>
          <form class="form-horizontal" action="{{ route('doctor.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Full Name" value="{{ $user->name }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email Address" value="{{ $user->email }}">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password" value="{{ old('password') }}">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Gender</label>
                    <select id="gender" name="gender" class="form-control custom-select @error('gender') is-invalid @enderror">
                      <option value="" {{ "" === $user->gender ? 'selected' : '' }}>Please Select Gender</option>
                      @foreach (['male', 'female'] as $gender)
                        <option value="{{ $gender }}" {{ $user->gender === $gender ? 'selected' : '' }}>{{ ucfirst($gender) }}</option>
                      @endforeach
                    </select>
                    @error('gender')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" class="form-control @error('education') is-invalid @enderror" id="education" name="education" placeholder="Enter Doctor Higest Qualification" value="{{ $user->education }}">
                    @error('education')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="address">Full Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter Full Address">{{ $user->address }}</textarea>
                    @error('address')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="country">Country</label>
                    <!-- Country Names -->
                    <select class="form-control custom-select @error('country') is-invalid @enderror" id="country" name="country">
                      <option value="" {{ "" === $user->country ? 'selected' : '' }}>Please Select Country</option>
                      @foreach (['Afghanistan', 'Aland Islands', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bonaire, Sint Eustatius and Saba', 'Bosnia and Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo', 'Congo, Democratic Republic of the Congo', 'Cook Islands', 'Costa Rica', 'Cote D\'Ivoire', 'Croatia', 'Cuba', 'Curacao', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard Island and Mcdonald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran, Islamic Republic of', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, Democratic People\'s Republic of', 'Korea, Republic of', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Lao People\'s Democratic Republic', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macao', 'Macedonia, the Former Yugoslav Republic of', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia, Federated States of', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestinian Territory, Occupied', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Barthelemy', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Martin', 'Saint Pierre and Miquelon', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Serbia and Montenegro', 'Seychelles', 'Sierra Leone', 'Singapore', 'Sint Maarten', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and the South Sandwich Islands', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Taiwan, Province of China', 'Tajikistan', 'Tanzania, United Republic of', 'Thailand', 'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Viet Nam', 'Virgin Islands, British', 'Virgin Islands, U.s.', 'Wallis and Futuna', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe'] as $country)
                        <option value="{{ $country }}" {{ $user->country === $country ? 'selected' : '' }}>{{ ucwords($country) }}</option>
                      @endforeach
                    </select>
                    @error('country')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Enter City" value="{{ $user->city }}">
                    @error('city')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="text" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" placeholder="Enter Pincode" value="{{ $user->pincode }}">
                    @error('pincode')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ $user->phone }}">
                    @error('phone')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="department">Specialist</label>
                    <select id="department" name="department" class="form-control custom-select @error('department') is-invalid @enderror">
                      <option value="" {{ "" === $user->department ? 'selected' : '' }}>Please Select Specialisation</option>
                      @foreach (App\Models\Department::all() as $department)
                        <option value="{{ $department->department }}" {{ $user->department === $department->department ? 'selected' : '' }}>{{ ucwords($department->department) }}</option>
                      @endforeach
                    </select>
                    @error('department')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="user_image">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="user_image" name="image" role="button" value="{{ old('image') }}">
                        <label class="custom-file-label" for="user_image" role="button">Browse Image</label>
                      </div>
                    </div>
                    @if ($user->image != '')
                      <div class="mt-1"><a href="{{ asset('images') }}/{{ $user->image }}" target="_blank" class="text-primay font-weight-normal">View Image</a></div>
                    @endif
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Role</label>
                    <select id="role" name="role" class="form-control custom-select @error('role') is-invalid @enderror">
                      <option value="" {{ "" === $user->role->id ? 'selected' : '' }}>Please Select Role</option>
                      @foreach (App\Models\Role::where('name', '!=', 'patient')->get() as $role)
                        <option value="{{ $role->id }}" {{ $role->id === $user->role->id ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                      @endforeach
                    </select>
                    @error('role')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="description">About/Bio</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter Doctor Bio" rows="4">{{ $user->description }}</textarea>
                    @error('description')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn bg-gradient-success mr-1">Update</button>
              <a href="{{ route('doctor.index') }}" class="btn bg-gradient-info">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection