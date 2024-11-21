<?php
require_once 'Aircraft.php';
require_once 'Airport.php';
require_once 'Flight.php';

$aircraft = new Aircraft("Airbus", "A220-300", 120, 850);
$origin = new Airport("RIX", 56.924, 23.971);
$destination = new Airport("LHR", 51.470, -0.4543);
$departureTime = new DateTime("2024-12-25 12:00:00");

$flight = new Flight("SA503", $origin, $destination, $departureTime, $aircraft);

echo "Distance: " . $flight->getDistance() . " km\n";
echo "Duration: " . $flight->getDuration() . " minutes\n";
echo "Landing Time: " . $flight->getLandingTime()->format('Y-m-d H:i:s') . "\n";
?>
