<form action='/your_purchase_url' class='pin' method='post'>
  <div class='errors' style='display:none'>
    <h3></h3>
    <ul></ul>
  </div>
  <fieldset>
    <legend>Billing</legend>
    <!--
      The lack of 'name' attributes on these inputs prevents
      the browser from submitting them to your server
    -->
    <label for='address-line1'>Address 1</label>
    <input id='address-line1' />
    <label for='address-line2'>Address 2</label>
    <input id='address-line2' />
    <label for='address-city'>City</label>
    <input id='address-city' />
    <label for='address-state'>State</label>
    <input id='address-state' />
    <label for='address-postcode'>Postcode</label>
    <input id='address-postcode' />
    <label for='address-country'>Country</label>
    <input id='address-country' />
  </fieldset>
  <fieldset>
    <legend>Payment</legend>
    <!--
      The lack of 'name' attributes on these inputs prevents
      the browser from submitting them to your server
    -->
    <label for='cc-number'>Credit Card Number</label>
    <input id='cc-number' type='text' />
    <label for='cc-name'>Name on Card</label>
    <input id='cc-name' type='text' />
    <label for='cc-expiry-month'>Expiry Month</label>
    <input id='cc-expiry-month' />
    <label for='cc-expiry-year'>Expiry Year</label>
    <input id='cc-expiry-year' />
    <label for='cc-cvc'>CVC</label>
    <input id='cc-cvc' />
  </fieldset>
  <input type='submit' value='Pay now' />
</form>