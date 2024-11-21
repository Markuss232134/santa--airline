<?php
class Airport {
    public string $iataCode;
    public float $latitude;
    public float $longitude;

    public function __construct(string $iataCode, float $latitude, float $longitude) {
        $this->iataCode = $iataCode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
?>
