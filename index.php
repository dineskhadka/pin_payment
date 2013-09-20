<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pin Payment Test</title>

<style>
body 
{   
    margin: 0;
    padding: 0;	
    font-family: Verdana, Tahoma, Arial, sans-serif;
}

fieldset.main 
{  
    margin: 1.5em 0 0 1.5em;  
    padding: 1em 0 0 0;
    width: 400px;
    font-size: .9em;    
}

fieldset.main legend
{  
    margin-left: 1em;  
    color: #000000;  
    font-weight: bold;    
}

fieldset.main ol 
{  
    padding: 1em 1em 0 1em;  
    list-style: none;
}

fieldset.main li 
{  
    padding-bottom: .5em;
}

fieldset.main ol li label 
{  
    float: left;
    width: 10em;        
    margin-right: 1em;
}

/* ----------------------------------------- */

fieldset.nested 
{  
    margin: 0 0 1em 1em;  
    padding: 0;
    width: 93%;
    font-size: .8em;
    border: 1px solid gray;
    background: #B0C4DE;    

}

fieldset.nested legend
{  
    margin-left: 1em;      
    font-weight: normal;
    font-size: .9em; 
    color: black;
    background-color: white;
    padding: 0 1em 0 1em;
    border: 1px solid black;
}

fieldset.nested ol 
{  
    padding: 0 1em 0 1em;  
    list-style: none;
}

fieldset.nested li 
{  
    /* Control leading between rows. */
    padding-bottom: .7em;
}

fieldset.nested ol li label 
{  
    float: left;
    width: 10em;        
    margin-right: 1em;
}

/* ----------------------------------------- */

input.button
{                                  
    /* border-style: none; */
    width: 6em;
    height: 2.5em;
}

div.buttonsContainer
{
    float: right;
    margin: 1em 1em 1em 0;
}

    fieldset.nested 
    {
        position: relative;
        margin-top: 15px;        
    }

    fieldset.nested legend 
    {
        position: absolute; top: -8px; left: 1em;
    }
	
	.info_msg, .success_msg, .warning_msg, .error_msg, .validation {
    border: 1px solid;
    margin: 10px 0px;
    padding:10px 10px 10px 40px;
    background-repeat: no-repeat;
    background-position: 10px center;
	width:380px;
}
.info_msg {
    color: #00529B;
    background-color: #BDE5F8;
}
.success_msg {
    color: #4F8A10;
    background-color: #DFF2BF;
}
.warning_msg {
    color: #9F6000;
    background-color: #FEEFB3;
}
.error_msg {
    color: #D8000C;
    background-color: #FFBABA;
}


</style>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function paynow()
	{
	var cust_name = document.getElementById('cust_name').value;
	var cust_email = document.getElementById('cust_email').value;
	var address_line1 = document.getElementById('address_line1').value;	
	var address_city = document.getElementById('address_city').value;
	var address_postcode = document.getElementById('address_postcode').value;
	var address_state = document.getElementById('address_state').value;
	var address_country	 = document.getElementById('address_country').value;
	
	
	var name_on_card = document.getElementById('name_on_card').value;
	var card_no = document.getElementById('card_no').value;
	var expiry_month = document.getElementById('expiry_month').value;
	var expiry_year = document.getElementById('expiry_year').value;
	var cvc = document.getElementById('cvc').value;
	
	var prod_description = document.getElementById('prod_description').value;
	var amount = document.getElementById('amount').value;
		

		
		var xurl = "remote/payment_process.php?action=addtocart&cust_name="+cust_name+"&cust_email="+cust_email+"&address_line1="+address_line1+"&address_city="+address_city+"&address_postcode="+address_postcode+"&address_state="+address_state+"&address_country="+address_country+"&name_on_card="+name_on_card+"&card_no="+card_no+"&expiry_month="+expiry_month+"&expiry_year="+expiry_year+"&cvc="+cvc+"&prod_description="+prod_description+"&amount="+amount;
		
			  $.ajax({

                        type: "POST",
                        url: xurl,
                        dataType: 'json',
                        success: function(result) {
							 $('#message_box').removeAttr('class').attr('class', '');	
							 if(result[0].response == 'payment_success') 
						 		  {
									$("#message_box").addClass("success_msg");  
									$('#message_box').html( result[0].msg);
									return false;
                           		  }
							 else if(result[0].response == 'payment_failed') 
						 		  {
									$("#message_box").addClass("error_msg");  
									$('#message_box').html( result[0].msg);
									return false;
                           		  }
								  
								  
							}

                    } );


		
		
	}

</script>
</head>

<body>

<div id="message_box">  </div>


<div>    
    <form>

    <fieldset class="main">
        <legend>Pin Payment Test</legend>

        <fieldset class="nested">
            <legend>Customer Information</legend>    
            <ol>
                <li>
                    <label for="textboxName">Name</label>
                    <input id="cust_name" name="cust_name" value="Indra Kr. Yadav" type="text" style="width: 15em;"/>
                </li>
                
                 <li>
                    <label for="textboxName">Email</label>
                    <input id="cust_email" name="cust_email" value="i.yadav@andmine.com" type="text" style="width: 15em;"/>
                </li>
                
                <li>
                    <label for="textboxName" >Street Address</label>
                    <input id="address_line1" name="address_line1" value="Level 1 627 Chapel St" type="text" style="width: 15em;"/>
                </li>
                <li>
                    <label for="textboxCompany">City</label>
                    <input id="address_city" name="address_city" value="South Yarra" type="text" style="width: 15em;"/>
                </li>
                
                  <li>
                    <label for="textboxRegion" >Postcode</label>
                    <input id="address_postcode" name="address_postcode" value="3141" type="text" style="width: 15em;"/>
                </li>
                <li>
                    <label for="textboxPostalCode" >State</label>
                    <input id="address_state" name="address_state" value="VIC" type="text" style="width: 15em;"/>
                </li>
                <li>
                    <label for="textboxCountry" >Country</label>
                    <input id="address_country" name="address_country" value="Australia" type="text" style="width: 15em;"/>
                </li>
                
            </ol>
        </fieldset>        

        <fieldset class="nested">
            <legend>Card Info</legend>    
            <ol>
                 <li>
                    <label for="textboxAddress1" >Name on Card :</label>
                    <input id="name_on_card" name="name_on_card" value="Roland Robot" type="text" style="width: 15em;"/>
                </li>
                
                <li>
                    <label for="textboxAddress1" >Card No. :</label>
                    <input id="card_no" name="card_no" value="5520000000000000" type="text" style="width: 15em;"/>
                </li>
                <li>
                    <label for="textboxAddress2" >Card Exp. Date : </label> 
                    <input id="expiry_month" name="expiry_month" value="05" type="text" style="width: 50px;"/>
                    <input id="expiry_year" name="expiry_year" value="2013" type="text" style="width: 50px;"/>
                </li>
                <li>
                    <label for="textboxCity" >cvc</label>
                    <input id="cvc" name="cvc" type="text" value="123"  style="width: 50px;"/>
                </li>
              
            </ol>
        </fieldset>        

        <fieldset class="nested">
            <legend>General Info</legend>
            <ol>
                <li>
                    <label for="textboxName" >Product Description</label>
                    <input id="prod_description" name="prod_description" value="Pamilya Membership" type="text" style="width: 15em;"/>
                </li>
                <li>
                    <label for="textboxAddress1" >Amount</label>
                    <input id="amount" name="amount" value="1" type="text" style="width: 15em;" />
                </li>

            </ol>    
        </fieldset>        

        <div class="buttonsContainer">
            <input class="button" type="button" value="PAY NOW"  onclick="paynow();" style="cursor:pointer;" /> 
            <input class="button" type="button" value="Cancel"  style="cursor:pointer;" /> 
        </div>

    </fieldset>

    </form>
</div>    









</body>
</html>