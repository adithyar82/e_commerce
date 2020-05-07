
<?php
include('connect_db.php');
$sql = "SELECT * FROM shipping;";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $address_1 = $row['address_1'];
        $city = $row['city'];
        $state = $row['state'];
        $zipcode = $row['zipcode'];
        $country = $row['country'];
    }
}
$abc = $address_1.' '.$city.' '.$state.' '.$zipcode.' '.$country;
echo'<address>';
// $abc = "1049, 49th Street, Apt # 213 Norfolk VA 23508 United States";
echo' <a href="http://maps.google.com/maps?q='.$abc.'" target="_blank">'.
    $address_1.','.$city.','.$state.','.$zipcode.','.$country.'
   </a>
</address>';
?>
<script> 
$("address").each(function(){
        var address = $(this).text().replace(/\,/g, ' '); // get rid of commas
        var url = address.replace(/\ /g, '%20'); // convert address into approprite URI for google maps
        
        $(this).wrap('<a href="http://maps.google.com/maps?q=' + url + '" target="_blank"></a>');
  
    });
</script>
