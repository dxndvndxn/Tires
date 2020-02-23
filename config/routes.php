<?php
return array(
    'tirefit' => 'tireFit/info' ,
    'contacts' => 'contacts/info',
    'storage' => 'storage/info' ,
    'cart' => 'cart/open',
    'width_tire=([0-9]+|b*?)&height=([0-9]+|b*?)&diametr_tire=([0-9]+|b*?)&season=([0-9]+|b*?)' => 'site/outputTire',
    'width_disks=([0-9]+|b*?)&diametr_disks=([0-9]+|b*?)&takeoff=([0-9]+|b*?)&dia=([0-9]+|b*?)&bolt=([0-9]+|b*?)&pcd=([0-9]+|b*?)' => 'site/outputTire',
    '([0-9]+)' => 'site/index',
    '' => 'site/index'
);
