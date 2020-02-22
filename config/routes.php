<?php
return array(
    'tirefit' => 'tireFit/info' ,// TireFitController , actionTireFitInfo
    'contacts' => 'contacts/info', //ContactsController ,actionContactInfo
    'storage' => 'storage/info' ,//StorageController , actionStorageInfo
    'width_tire=([0-9]+|b*?)&height=([0-9]+|b*?)&diametr_tire=([0-9]+|b*?)&season=([0-9]+|b*?)' => 'site/outputTire',
    'width_disks=([0-9]+|b*?)&diametr_disks=([0-9]+|b*?)&takeoff=([0-9]+|b*?)&dia=([0-9]+|b*?)&bolt=([0-9]+|b*?)&pcd=([0-9]+|b*?)' => 'site/outputTire',
    '([0-9]+)' => 'site/index',
    '' => 'site/index'
);
