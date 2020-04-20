<?php
defined('BASEPATH') or exit('No direct script access allowed');

function agent_cost($distance)
{
	return 'Rp ' . number_format((float) $distance * 1000, 0, '.', ',')  . ' ,-';
}

function distance($location)
{
	if (($location['lat_cust'] == $location['lat_zero']) && ($location['long_cust'] == $location['long_zero'])) {
		return 0;
	} else {
		$theta = $location['long_cust'] - $location['long_zero'];
		$dist = sin(deg2rad($location['lat_cust'])) * sin(deg2rad($location['lat_zero'])) +  cos(deg2rad($location['lat_cust'])) * cos(deg2rad($location['lat_zero'])) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515 * 1.609344;
		return number_format($miles, 2, '.', ',');
	}
}

function price($mitra)
{
	if ($mitra == 'mitra')
		return 2000;
	else if ($mitra == 'mitra bisnis')
		return 2500;
}
