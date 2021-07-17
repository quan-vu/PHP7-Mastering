<?php

/**
 * The class constant - using 'const' keyword
 */

class Rift {
    const APP = [
        'name' => 'Rift',
        'edition' => 'Community',
        'version' => '2.1.2',
        'licence' => 'OSL'
    ];
}

/**
 * The class constant - using 'const' keyword
 */

interface IRift {
    const APP = [
        'name' => 'Rift',
        'edition' => 'Community',
        'version' => '2.1.2',
        'licence' => 'OSL'
    ];
}

// Use constant array
print_r(Rift::APP);
print_r(IRift::APP);
