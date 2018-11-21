<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="<?php echo base_url();?>restapi/Flightsgi/getbookingrequest" method="post">
    <div class="form-group">
      <label for="email">usertrackid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="usertrackid" value="RMWVO97099459983927981886465651796040165">
    </div>
    <div class="form-group">
      <label for="email">title:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="title" value="">
    </div>
    <div class="form-group">
      <label for="email">name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="name" value="Test">
    </div>
    <div class="form-group">
      <label for="email">address:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="address" value="text">
    </div>
    <div class="form-group">
      <label for="email">city:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="city" value="Chennai">
    </div>
    <div class="form-group">
      <label for="email">countryid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="countryid" value="91">
    </div>
    <div class="form-group">
      <label for="email">contactnumber:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="contactnumber" value="9999999999">
    </div>
    <div class="form-group">
      <label for="email">emailid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="emailid" value="velmurugan@hermes-it.in">
    </div><div class="form-group">
      <label for="email">pincode:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="pincode" value="600032">
    </div>
    <div class="form-group">
      <label for="email">specialremarks:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="specialremarks" value="">
    </div>
    <div class="form-group">
      <label for="email">notifybymail:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="notifybymail" value="0">
    </div>
    <div class="form-group">
      <label for="email">notifybysms:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="notifybysms" value="0">
    </div>
    <div class="form-group">
      <label for="email">adultcount:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="adultcount[]" value="1">
      <div class="form-group">
      <label for="email">adultcount:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="adultcount[]" value="1">
    </div>
    </div>
    <div class="form-group">
      <label for="email">childcount:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="childcount[]" value="1">
    </div>
    <div class="form-group">
      <label for="email">childcount:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="childcount[]" value="1">
    </div>
    <div class="form-group">
      <label for="email">infantcount:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="infantcount" value="0">
    </div>
    <div class="form-group">
      <label for="email">bookingtype:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="bookingtype" value="0">
    </div>
    <div class="form-group">
      <label for="email">totalamount:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="totalamount" value="3254">
    </div>
    <div class="form-group">
      <label for="email">airlinecode:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="airlinecode" value="SG">
    </div>
    <div class="form-group">
      <label for="email">currencycode:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="currencycode" value="INR">
    </div><div class="form-group">
      <label for="email">amount:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="amount" value="3254">
    </div>

    <div class="form-group">
      <label for="email">tourcode:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="tourcode" value="">
    </div>
    <div class="form-group">
      <label for="email">passengertype:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="passengertype" value="ADULT">
    </div>
    <div class="form-group">
      <label for="email">cus_title:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="cus_title" value="Mr">
    </div>
    <div class="form-group">
      <label for="email">firstname:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="firstname" value="TEST">
    </div>
    <div class="form-group">
      <label for="email">lastname:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="lastname" value="TEST">
    </div>
    <div class="form-group">
      <label for="email">gender:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="gender" value="M">
    </div>
    <div class="form-group">
      <label for="email">age:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="age" value="12">
    </div>
    <div class="form-group">
      <label for="email">dateofbirth:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="dateofbirth" value="12/12/2018">
    </div>
    <div class="form-group">
      <label for="email">identityproofid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="identityproofid" value="">
    </div>
    <div class="form-group">
      <label for="email">identityproofnumber:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="identityproofnumber" value="">
    </div>
    <div class="form-group">
      <label for="email">flightid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="flightid" value="11">
    </div>

    <div class="form-group">
      <label for="email">classcode:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="classcode" value="CCSAVER">
    </div>
    <div class="form-group">
      <label for="email">specialservicecode:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="specialservicecode" value="">
    </div>
    <div class="form-group">
      <label for="email">frequentflyerid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="frequentflyerid" value="">
    </div>
    <div class="form-group">
      <label for="email">frequentflyernumber:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="frequentflyernumber" value="">
    </div>
    <div class="form-group">
      <label for="email">mealcode:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="mealcode" value="">
    </div>
    <div class="form-group">
      <label for="email">seatpreferid:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="seatpreferid" value="32">
    </div>
    <div class="form-group">
      <label for="email">lccbaggagerequest:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="lccbaggagerequest" value="">
    </div>
    <div class="form-group">
      <label for="email">lccmealsrequest:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="lccmealsrequest" value="">
    </div>
    <div class="form-group">
      <label for="email">otherssrrequest:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="otherssrrequest" value="">
    </div>
    <div class="form-group">
      <label for="email">seatrequest:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="seatrequest" value="">
    </div>
    



    
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
