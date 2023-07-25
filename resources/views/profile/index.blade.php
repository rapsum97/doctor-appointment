@extends('layouts.app')

@section('content')
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      @if (auth()->check())
        <div class="col-md-4">
          <div class="card card-info">
            <div class="card-header">{{ __('User Profile') }}</div>
            <div class="card-body">
              <strong><i class="fas fa-user mr-1"></i> Name</strong>
              <p class="text-muted mt-2">{{ ucwords(auth()->user()->name) }}</p>
              <hr>
              <strong><i class="fas fa-envelope mr-1"></i> Email Address</strong>
              <p class="text-muted mt-2"><a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a></p>
              <hr>
              <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
              <p class="text-muted mt-2"><a href="tel:{{ auth()->user()->phone }}">{{ auth()->user()->phone }}</a></p>
              <hr>
              <strong><i class="fas fa-venus-mars mr-1"></i> Gender</strong>
              <p class="text-muted mt-2">{{ ucwords(auth()->user()->gender) }}</p>
              <hr>
              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
              <p class="text-muted mt-2">
                @if (auth()->user()->address != '')
                  {{ auth()->user()->address }}<br />
                  {{ auth()->user()->country }}, {{ auth()->user()->city }} - {{ auth()->user()->pincode }}
                @else
                -
                @endif
              </p>
              <hr>
              <strong><i class="fas fa-university mr-1"></i> Education</strong>
              <p class="text-muted mt-2">{{ auth()->user()->education }}</p>
              <hr>
              <strong><i class="fas fa-address-card mr-1"></i> Bio/About</strong>
              <p class="text-muted mt-2 mb-0">{{ auth()->user()->description }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <i class="icon fas fa-check"></i>{{ Session::get('message') }}
            </div>
          @endif
          <div class="card card-secondary">
            <div class="card-header">{{ __('Update Profile Image') }}</div>
            <div class="card-body">
              <form action="{{ route('profile.image') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-5">
                    <p class="mb-0">
                      @if (auth()->user()->image != '')
                        <img src="{{ asset('images/users') }}/{{ auth()->user()->image }}" alt="{{ auth()->user()->image }}" class="profile-user-img-profile img-fluid img-circle" width="250">
                      @else
                        <img src="{{ asset('images/users/profile-default.svg') }}" alt="Profile Picture" class="profile-user-img-profile img-fluid img-circle" width="250">
                      @endif
                    </p>
                  </div>
                  <div class="col-md-7 mt-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="user_image">Upload Image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="user_image" name="image" role="button" value="{{ auth()->user()->image }}">
                            <label class="custom-file-label" for="user_image" role="button">Browse Image</label>
                            @error('image')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-0 col-md-12">
                        <button type="submit" class="btn bg-gradient-primary"><i class="fas fa-image mr-2"></i>{{ __('Update Profile Image') }}</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card card-secondary">
            <div class="card-header">{{ __('Update Profile') }}</div>
            <div class="card-body">
              <form action="{{ route('profile.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" autocomplete="name" autofocus placeholder="{{ __('Full Name') }}">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                  <input id="phone" type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}" autocomplete="phone" autofocus placeholder="{{ __('Phone Number') }}">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-venus-mars"></span>
                    </div>
                  </div>
                  <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                    <option value="">Please Select Your Gender</option>
                    <option value="male" @if (auth()->user()->gender === 'male') selected @endif>Male</option>
                    <option value="female" @if (auth()->user()->gender === 'female') selected @endif>Female</option>
                    <option value="other" @if (auth()->user()->gender === 'other') selected @endif>Other</option>
                  </select>
                  @error('gender')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-address-book"></span>
                    </div>
                  </div>
                  <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="2" autocomplete="address" autofocus placeholder="{{ __('Full Address') }}">{{ auth()->user()->address }}</textarea>
                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-globe"></span>
                    </div>
                  </div>
                  <select class="form-control custom-select @error('country') is-invalid @enderror" id="country" name="country">
                    <option value="">Please Select Country</option>
                    @foreach (['Afghanistan', 'Aland Islands', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bonaire, Sint Eustatius and Saba', 'Bosnia and Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo', 'Congo, Democratic Republic of the Congo', 'Cook Islands', 'Costa Rica', 'Cote D\'Ivoire', 'Croatia', 'Cuba', 'Curacao', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard Island and Mcdonald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran, Islamic Republic of', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, Democratic People\'s Republic of', 'Korea, Republic of', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Lao People\'s Democratic Republic', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macao', 'Macedonia, the Former Yugoslav Republic of', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia, Federated States of', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestinian Territory, Occupied', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Barthelemy', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Martin', 'Saint Pierre and Miquelon', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Serbia and Montenegro', 'Seychelles', 'Sierra Leone', 'Singapore', 'Sint Maarten', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and the South Sandwich Islands', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Taiwan, Province of China', 'Tajikistan', 'Tanzania, United Republic of', 'Thailand', 'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Viet Nam', 'Virgin Islands, British', 'Virgin Islands, U.s.', 'Wallis and Futuna', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe'] as $country)
                      <option value="{{ $country }}" {{ $country === auth()->user()->country ? 'selected' : '' }}>{{ ucwords($country) }}</option>
                    @endforeach
                  </select>
                  @error('country')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-city"></span>
                    </div>
                  </div>
                  <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ auth()->user()->city }}" autocomplete="city" autofocus placeholder="{{ __('City') }}">
                  @error('city')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-map-marker-alt"></span>
                    </div>
                  </div>
                  <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ auth()->user()->pincode }}" autocomplete="pincode" autofocus placeholder="{{ __('Pincode') }}">
                  @error('pincode')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-university"></span>
                    </div>
                  </div>
                  <input id="education" type="text" class="form-control" name="education" value="{{ auth()->user()->education }}" autocomplete="education" autofocus placeholder="{{ __('Higest Qualification') }}">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fas fa-address-card"></span>
                    </div>
                  </div>
                  <textarea id="description" class="form-control" name="description" rows="3" autocomplete="description" autofocus placeholder="{{ __('Bio/About') }}">{{ auth()->user()->description }}</textarea>
                </div>
                <div class="row mb-0">
                  <div class="col-12">
                    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-user mr-2"></i>{{ __('Update Profile') }}</button>
                    <button type="reset" class="btn bg-gradient-info"><i class="fas fa-times mr-2"></i>{{ __('Reset') }}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
