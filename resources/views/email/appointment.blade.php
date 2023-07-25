<p>Hello <b>{{ $mailData['name'] }}</b>,</p>
<p>Thank You for Booking your Appointment with RAPSUM FAM Doctor Application.</p>
<p>Please check your Appointment Details below - </p>
<ul>
  <li><b>Time & Date:</b> <span>{{ $mailData['time'] }}, {{ $mailData['date'] }}</span></li>
  <li><b>Name of Doctor:</b> <span>Dr. {{ $mailData['doctorName'] }}</span></li>
</ul>
<br />
<p><b>Address:</b> <span>29, Kabi Mukunda Das Road, Dum Dum Cantonment, Kolkata - 700065</span></p>
<p><b>Email Address:</b> <span><a href="mailto:soukhinbasu97@gmail.com">soukhinbasu97@gmail.com</a></span></p>
<p><b>Contact No:</b> <span><a href="tel:+919874241699">+91 9874241699</a></span></p>