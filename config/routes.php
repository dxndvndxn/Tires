<?php
return array(
    'ajax' => 'ajax/index',
    'tirefit' => 'tireFit/info' ,
    'contacts' => 'contacts/info',
    'storage' => 'storage/info' ,
    'cart' => 'cart/open',
    'width_tire=([0-9]+|b*?)&height=([0-9]+|b*?)&diametr_tire=([0-9]+|b*?)&season=([0-9]+|b*?)' => 'site/output',
    'width_disks=([0-9]+|b*?)&diametr_disks=([0-9]+|b*?)&takeoff=([0-9]+|b*?)&dia=([0-9]+|b*?)&bolt=([0-9]+|b*?)&pcd=([0-9]+|b*?)' => 'site/output',
    '([0-9]+)' => 'site/index/$1',
    'cabinet' => 'cabinet/index',
    '' => 'site/index'
);
