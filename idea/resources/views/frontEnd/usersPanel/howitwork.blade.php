 @extends('frontEnd.master')

@section('title','How it Work')

<style type="text/css">
	
	.iframe-container{
  position: relative;
  width: 80%;
  padding-bottom: 56.25%; 
  height: 0;
}
.iframe-container iframe{
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
}


</style>

@section('body')



<section id="intro" class="clearfix">
 
 <div class="container mt-5">

	<div class="row">



	    <h2></h2>

		<div class="col-md-12 iframe-container text-center">
          
          <iframe width="800" height="400" src="https://www.youtube.com/embed/0fSNUgZ-jC0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

		</div>


   <div class="col-md-12">
   <h2 class="text-center"><b>How it work</b></h2>

            <p>
					            	
					 <b>Step 1: Fill up your, payment & other details.</b><br><br>

					<b>Click the link <a href="https://epeakup.com/register">https://epeakup.com/register</a>  Please fill up your details with your correct mobile number with country code, contacts in Bangladesh, total amount of payment to transfer, e-mail address and personal information.</b><br>

					<B>Please click “Send” button after filling all details.</B><br><br>


					<B>Step 2: Check all details and click “Pay Now” button</B><br><br>


					At this step, please check all the information you have provided us in previous step. Please double check your contact number, bank details and contact number in Bangladesh. We may send you six digits OTP in your mobile number or e-mail address. After your confirmation of OTP we are sending your bkash/Roket/Or any operator mobile Top-up in Bangladesh.<br><br>

					<b>Please click <i>“Pay Now”</i> button after double checking all details.</b><br><br>


					<b>Sign in Poli or Paypal for Pay & use your credit, debit card or bank account</b><br><br>

					If you have a Poli/ Paypal account, please sign in and pay the amount and wait 10 seconds to return to our site to get the confirmation. You can also pay by use your credit or debit card. Please fill up all information including your VISA, AMEX, and MASTERCARD. It may take 4-7 working days to clear the amount if you pay by your bank account. Please wait 10 seconds to return to our site to get the confirmation.<br><br>

					Wait 1-2 business days and money will be in your account! Thank you for using e-Peakup  for bkash/Roket & Mobile Top-up service to send for Bangladesh.<br><br>

            </p>

         </div>
	</div>
</div>
</section>
@endsection