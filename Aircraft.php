<?php
class Aircraft {
    public string $manufacturer;
    public string $model;
    public int $seatCapacity;
    public int $averageSpeed;

    public function __construct(string $manufacturer, string $model, int $seatCapacity, int $averageSpeed) {
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->seatCapacity = $seatCapacity;
        $this->averageSpeed = $averageSpeed;
    }
}
?>
