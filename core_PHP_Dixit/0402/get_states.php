<?php

$country = array(

    "india" => array(
        "Gujrat" => array("Surat", "Ahmedabad", "Mehsana", "baroda"),
        "Madhya Pradesh " => array("Ujjain", "Dewas", "Shivpuri", "Bhopal"),
        "Chhattisgarh" => array("Raipur", "Bilaspur", "Korba", "Raigarh")
    ),
    "US" => array(
        "California" => array("Los Angeles", "San Francisco", "San Diego", "Sacramento"),
        "New York" => array("New York City", "Buffalo", "Rochester", "Albany"),
        "Florida" => array("Miami", "Tampa", "Orlando", "Jacksonville")
    ),
    "Canada" => array(
        "Ontario" => array("Toronto", "Ottawa", "Mississauga", "Brampton"),
        "Quebec" => array("Montreal", "Quebec City", "Laval", "Gatineau"),
        "British Columbia" => array("Vancouver", "Victoria", "Surrey", "Burnaby")
    ),
    "Australia" => array(
        "New South Wales" => array("Sydney", "Newcastle", "Wollongong", "Central Coast"),
        "Victoria" => array("Melbourne", "Geelong", "Ballarat", "Bendigo"),
        "Queensland" => array("Brisbane", "Gold Coast", "Sunshine Coast", "Cairns")
    ),
    "UK" => array(
        "England" => array("London", "Manchester", "Birmingham", "Leeds"),
        "Scotland" => array("Edinburgh", "Glasgow", "Aberdeen", "Dundee"),
        "Wales" => array("Cardiff", "Swansea", "Newport", "Bangor")
    )

);

if (isset($_POST['country'])) {
    $states = $country[$_POST['country']];
    foreach ($states as $state => $cities) {
        echo '<option value="' . $state . '">' . $state . '</option>';
    }
    
}

?>