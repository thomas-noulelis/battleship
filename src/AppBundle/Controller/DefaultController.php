<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Factory\ShipFactory;

class DefaultController extends Controller
{

    const BOARD_WIDTH = 10;
    const BOARD_HEIGHT = 10;

    private $boardWithHead;
    private $boardHeightHead;

    private $ships;
    private $hits;
    private $miss;

    public function __construct()
    {
        $this->boardWithHead = range(1,10);
        $this->boardHeightHead = range('A', 'J');
    }

    /**
     * @Route("/", name="homepage")
     * @Method({"GET"})
     */
    public function indexAction(Request $request)
    {

        $shipsList = array(
            ShipFactory::create('Battleship'),
            ShipFactory::create('Destroyer'),
            ShipFactory::create('Destroyer'),
        );

        $ships = [];

        /*
         * Place ships on the grid at random
         */
        foreach ($shipsList as $ship) {

            $not_found = true;

            while ($not_found) {

                $coordinates = $ship->generateCoords(self::BOARD_WIDTH, self::BOARD_HEIGHT);
                $ship->setCoordinates($coordinates);

                $overlaps = $this->shipOverlaps($ship, $ships);
                if (!$overlaps) {
                    $not_found = false;
                    $ships[] = $ship;
                }
            }
        }

        $this->setShips($ships);

        $this->saveSetting();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'outputGrid' => $this->outputGrid(),
            'message' => 'Are you ready? Good luck!'
        ));
    }

    /**
     * @Route("/", name="strike")
     * @Method({"POST"})
     */
    public function strikeAction(Request $request)
    {

        $curr_board = json_decode($_COOKIE['battleship'], true);
        $ships = $curr_board['ships'];
        $hits = $curr_board['hits'];
        $miss = $curr_board['miss'];

        $this->setHits($hits);
        $this->setMiss($miss);

        $ship_objs = array();
        foreach ($ships as $ship) {

            $currentShip = ShipFactory::create($ship['name']);
            $currentShip->setCoordinates($ship['coordinates']);
            $currentShip->setLength(count($ship['coordinates']));
            $ship_objs[] = $currentShip;
        }

        $this->setShips($ship_objs);

        $message = $this->checkCoordinates($request->request->get('coordinates'));

        $this->saveSetting();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'outputGrid' => $this->outputGrid(),
            'message'   => $message
        ));
    }

    /**
     *  Processes the coordinate given by user.
     *
     *  @param $coordinates array
     *  @return string
     *
     */
    public function checkCoordinates($coordinates)
    {
        if (!$this->isValidCoord($coordinates)) {
            return  'Error: Please enter a valid coordinate';
        } else {
            if ($this->getSuccessHits() == 13) {
                return 'You won! It took you '.$this->getAttempts().' turns to win.  Refresh the page to start a new game.';
            } else {
                $converted_coord = $this->convertCoord($coordinates);
                $hit = $this->checkHit($converted_coord);
                if ($hit) {
                    $this->addHits($converted_coord);
                    if ($this->getSuccessHits() == 13) {
                        return 'You won! It took you '.$this->getAttempts().' turns to win.  Refresh the page to start a new game.';
                    }
                    if ($this->checkSunkShip($converted_coord)) {
                        return 'Congratulation! You have sunk a ship!';
                    } else {
                        return 'Hit!';
                    }
                } else {
                    $this->addMiss($converted_coord);
                    return 'Miss!';
                }
            }
        }
    }

    /**
     * Returns the HTML of the grid table
     *
     */
    public function outputGrid()
    {
        $grid = '<table>';
        $x = 0;
        while ($x <= self::BOARD_HEIGHT) {
            $y = 0;
            $grid .= ($x == 0) ? "<thead><th></th>":"<tr>";
            while ($y <= self::BOARD_WIDTH) {
                if ($x == 0 && $y> 0) {
                    $grid .= "<td>".$this->boardWithHead[$y-1]."</td>";
                } elseif ($x > 0 && $y == 0) {
                    $grid .= "<th>".$this->boardHeightHead[$x-1]."</th>";
                } elseif ($x > 0 && $y > 0) {
                    $grid .= "<td>".$this->outputElem(array($x,$y))."</td>";
                }
                $y++;
            }
            $grid .= ($x == 0) ? "</thead>":"</tr>";
            $x++;
        }
        $grid .= "</table>";
        return $grid;
    }

    /**
     *
     * Helper function to process each point on the grid, and return the
     * correct display
     *
     * @param $coordinate array
     * @return string
     *
     */
    private function outputElem($coordinate)
    {

        foreach ((array) $this->getHits() as $hit_coord) {
            if ($hit_coord === $coordinate) {
                return 'X';
            }
        }
        foreach ((array) $this->getMiss() as $miss_coord) {
            if ($miss_coord === $coordinate) {
                return '-';
            }
        }
        return '.';
    }

    /**
     *
     * Helper function to check if the user inputed value is valid
     *
     * @param $coord array
     * @return boolean
     */
    private function isValidCoord($coord)
    {
        // Is only 2 characters
        if (empty($coord)) {
            return false;
        }

        $len = (strlen($coord) == 2);
        if ($len) {
            $int = (ctype_digit($coord[1]));
            $alpha = (ctype_alpha($coord[0]));
            $less_than_j = (strcasecmp($coord[0], 'K') < 0);
        }
        return (($len && $int && $alpha && $less_than_j));
    }

    /**
     *
     * Helper function to convert the user coordinate, into grid format
     *
     * @param $coord array
     * @return string
     *
     */
    private function convertCoord($coord)
    {
        $int_coord = ($coord[1] == 0) ? 10 : $coord[1];
        $col_map = array_flip($this->boardHeightHead);
        $val = array($col_map[strtoupper($coord[0])] + 1, (int)$int_coord);
        if ($val[1] == 0) {
            return $val[0]."10";
        } else {
            return $val;
        }
    }

    /**
     *
     * Helper function to check if a coordinate hits any ship on the board
     *
     * @param $coord array
     * @return boolean
     *
     */
    private function checkHit($coord)
    {
        foreach ($this->getShips() as $ship) {
            $hit = $ship->overlaps($coord);
            if ($hit) {
                return true;
            }
        }
        return false;
    }

    public function saveSetting() {

        $setup = array(
            'ships' => $this->getShipsCoordinates(),
            'hits' => $this->getHits(),
            'miss' => $this->getMiss());

        return setcookie("battleship", json_encode($setup));

    }

    /**
     *  Returns the list of ship's coordinates on the board
     */
    public function getShipsCoordinates()
    {

        $ships = array();
        foreach ($this->ships as $ship) {

            array_push($ships, [
                'name' => $ship->getName(),
                'coordinates' => $ship->getCoordinates()
            ]);
        }

        return $ships;
    }

    public function getHits()
    {
        return $this->hits;
    }

    public function getMiss()
    {
        return $this->miss;
    }

    public function getShips()
    {
        return $this->ships;
    }

    public function setShips($ships)
    {
        $this->ships = $ships;
    }

    public function setHits($hits)
    {
        $this->hits = $hits;
    }

    public function setMiss($miss)
    {
        $this->miss = $miss;
    }

    public function addHits($hits)
    {
        $this->hits[$hits[0].$hits[1]] = $hits;
    }

    public function addMiss($miss)
    {
        $m = $this->miss;
        $key = $miss[0].$miss[1];
        $m[$key] = $miss;
        $this->miss = $m;
    }

    public function getAttempts()
    {
        return count($this->getHits()) + count($this->getMiss());
    }

    public function getSuccessHits()
    {
        return count($this->getHits());
    }

    /**
     *
     * Check if any ship is sunk by this hit
     */
    public function checkSunkShip($coord)
    {
        foreach ($this->getShips() as $ship) {
            if ($ship->overlaps($coord)) {
                return $ship->isSunk($this->getHits());
            }
        }
        return false;
    }

    /**
     * Checks if a ship overlaps with a list of other ships
     *
     * @param $ship array
     * @param $all_ships array
     * @return boolean
     *
     */
    public function shipOverlaps($ship, $all_ships)
    {
        foreach ($all_ships as $test_s) {
            $overlaps = $test_s->overlapsWith($ship);
            if ($overlaps) {
                return true;
            }
        }
        return false;
    }

}
