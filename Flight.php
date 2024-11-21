<?php
class Flight {
    public string $flightCode;
    public Airport $origin;
    public Airport $destination;
    public DateTime $departureTime;
    public Aircraft $aircraft;

    public function __construct(string $flightCode, Airport $origin, Airport $destination, DateTime $departureTime, Aircraft $aircraft) {
        $this->flightCode = $flightCode;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->departureTime = $departureTime;
        $this->aircraft = $aircraft;
    }

    public function getDistance(): float {
        $earthRadius = 6371; // km
        $lat1 = deg2rad($this->origin->latitude);
        $lon1 = deg2rad($this->origin->longitude);
        $lat2 = deg2rad($this->destination->latitude);
        $lon2 = deg2rad($this->destination->longitude);

        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;

        $a = sin($dLat/2) * sin($dLat/2) +
             cos($lat1) * cos($lat2) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        return $earthRadius * $c; // distance in km
    }

    public function getDuration(): int {
        $distance = $this->getDistance();
        $flightTime = ($distance / $this->aircraft->averageSpeed) * 60; // in minutes
        return (int) round($flightTime + 30); // Adding 30 minutes for prep
    }
    

    public function getLandingTime(): DateTime {
        $durationMinutes = $this->getDuration();
        $landingTime = clone $this->departureTime;
        return $landingTime->modify("+{$durationMinutes} minutes");
    }
}
?>
