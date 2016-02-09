<?php

namespace AppBundle\Entity;

/**
 *  Ship Abstract class
 */
abstract class Ship
{

    protected $length;

    protected $name;

    protected $coordinates;

    public function __construct($length, $name) {
        $this->length = $length;
        $this->name = $name;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getName() {
        return $this->name;
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }
    public function setCoordinates($coord)
    {
        $this->coordinates = $coord;
    }

    /**
     *
     *  Generate the coordinates for this ship
     *
     *
     *  Uses the given params to generate a randomized ship, contained within the
     *  given column and row counts
     *
     *  @param int $max_col
     *  @param int $max_row
     *  @return array
     *
     */
    public function generateCoords($max_col, $max_row)
    {
        $is_horiz = (rand(0,1));
        $start = ($is_horiz) ? array(rand(1, $max_col - $this->getLength()), rand(1, $max_row)) : array( rand(1, $max_col), rand(1, $max_row - $this->getLength()));
        $ship = array($start);
        $inc = 1;
        while ($inc < $this->getLength()) {
            if ($is_horiz) {
                $ship[] = array($start[0] + $inc, $start[1]);
            } else {
                $ship[] = array($start[0], $start[1] + $inc);
            }
            $inc++;
        }
        return $ship;
    }

    /**
     *
     * Checks if the given ship overlaps with this ship
     *
     * @param $other_ship array
     * @return boolean
     *
     */
    public function overlapsWith($other_ship)
    {
        foreach ($other_ship->getCoordinates() as $ship_coord) {
            if ($this->overlaps($ship_coord)) {
                return true;
            }
        }
        return false;
    }

    /**
     *  Checks if the given coordinate overlaps this ship
     *
     * @param $coord array
     * @return boolean
     *
     */
    public function overlaps($coord)
    {
        foreach ($this->getCoordinates() as $s_coord) {
            if ($coord === $s_coord) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if this ship has been sunk
     *
     * @param $hits array
     * @return boolean
     */
    public function isSunk($hits)
    {
        $total_hits = 0;
        foreach ($this->getCoordinates() as $s_coord) {
            foreach ($hits as $hit) {
                if ($hit === $s_coord) {
                    $total_hits++;
                }
            }
        }
        return ($total_hits == $this->getLength());
    }

}