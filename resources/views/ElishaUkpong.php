<?php
namespace SoftwareDeveloper\WebDeveloper;

use PHP;
use CSS3;
use HTML5;
use JavaScript;

class ElishaUkpong extends RebeccaUkpong implements NseobongUkpong
{
    public $sleepStatus;
    public function __construct( $sleepStat ) {
        $this->sleepStatus = $sleepStat;
    }

    public function isSleepForTheWeak(  )
    {
        return $this->sleepStatus;
    }
}