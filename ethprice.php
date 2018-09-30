<?php
/*
* Plugin Name: Real Time Ethereum Price 
* Description: Real Time Ethereum Price in 8 Currencies. 
* Version: 1.0
* Author: Abid Hussain 
* Author URI: https://www.earningvalley.com 
*/


function price(){
?>
<div class="container">
	    <h2>Real Time Ethereum Price</h2>
         
  <table class="table">
    <thead>
      <tr style="background:#dfdfdf">
        <th>Currency</th>
        <th>Rate</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>BTC</td>
        <td id="btc"></td>
        
      </tr>
      <tr>
        <td>USD</td>
        <td id="usd"></td>
        
      </tr>
      <tr>
        <td>EUR</td>
        <td id="eur"></td>
        
      </tr>
       <tr>
        <td>PKR</td>
        <td id="pkr"></td>
      </tr>
       <tr>
        <td>INR</td>
        <td id="inr"></td>
        
      </tr>
       <tr>
        <td>BHD</td>
        <td id="bhd"></td>
        
      </tr>
       <tr>
        <td>GBP</td>
        <td id="gbp"></td>
        
      </tr>
       <tr>
        <td>CHF</td>
        <td id="chf"></td>
      </tr>
    </tbody>
  </table>
</div>
<?php
}
add_shortcode('ethprice', 'price');
?>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var array= this.responseText;
      obj = JSON.parse(array);
      document.getElementById("btc").innerHTML =obj.BTC;
	  document.getElementById("usd").innerHTML =obj.USD;
	  document.getElementById("eur").innerHTML =obj.EUR;
	  document.getElementById("pkr").innerHTML =obj.PKR;
	  document.getElementById("inr").innerHTML =obj.INR;
	  document.getElementById("bhd").innerHTML =obj.BHD;
	  document.getElementById("gbp").innerHTML =obj.GBP;
	  document.getElementById("chf").innerHTML =obj.CHF;
    }
  };
  xhttp.open("POST", "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,EUR,PKR,BHD,INR,KWD,GBP,CHF,AUD", true);
  xhttp.send();
}

setInterval(function(){ 
    // run every 1 second.    
    loadDoc();
}, 1000);

</script>