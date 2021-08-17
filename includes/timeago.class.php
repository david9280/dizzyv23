<?php 
/******************************************************************
Projectname:   PHP Time Ago Class
Version:       1.0
Author:        Radovan Janjic <rade@it-radionica.com>
Last modified: 07 11 2012
Copyright (C): 2012 IT-radionica.com, All Rights Reserved
* GNU General Public License (Version 2, June 1991)
*
* This program is free software; you can redistribute
* it and/or modify it under the terms of the GNU
* General Public License as published by the Free
* Software Foundation; either version 2 of the License,
* or (at your option) any later version.
*
* This program is distributed in the hope that it will
* be useful, but WITHOUT ANY WARRANTY; without even the
* implied warranty of MERCHANTABILITY or FITNESS FOR A
* PARTICULAR PURPOSE. See the GNU General Public License
* for more details.
Description:
PHP Time Ago Class
This class can compute the difference between two time values.
It compares two timestamp values and returns an English string that 
expresses the difference between the time values in years, months, 
weeks, days, hours, minutes or seconds.
If the second timestamp value is omitted, the class returns the time 
difference relatively to the current time.
For example:
 - now
 - a second ago
 - 10 seconds ago
 - a minute ago
 - 3 minutes ago
 - about an hour ago
 - 5 hours ago
 - yesterday
 - on Sunday
 - week ago
 - 2 weeks ago
 - a month ago
 - 7 months ago
 - a year ago
 - 4 years ago
Example:
******************************************************************
echo "I was born ", TimeAgo::ago('1988-04-26'), ".<br>";
echo TimeAgo::ago('2012-11-07 11:13:30', '2012-11-07 11:14:30');
******************************************************************/

class TimeAgo {
	/** Seconds in minute
	 * @var	Integer 
	 */
	private static $m = 60;
	
	/** Seconds in hour
	 * @var	Integer 
	 */
	private static $h = 3600;
	
	/** Seconds in day
	 * @var	Integer 
	 */
	private static $d = 86400;
	
	/** Seconds in week
	 * @var	Integer 
	 */
	private static $w = 604800;
	
	/** Seconds in mounth
	 * @var	Integer 
	 */
	private static $mo = 2629800;
	
	/** Seconds in year
	 * @var	Integer 
	 */
	private static $y = 31557600;
	
	/** Tamplates for language expressions stored in array
	 * @var Array 
	 */
	public static $string = array(
		  "now" 		=> "now",
		  "second" 		=> "a second ago",
		  "seconds" 	=> "%d seconds ago",
		  "minute" 		=> "a minute ago",
		  "minutes" 	=> "%d minutes ago",
		  "hour" 		=> "about an hour ago",
		  "hours" 		=> "%d hours ago",
		  "yesterday" 	=> "yesterday",
		  "days" 		=> "%d days ago",
		  "on" 			=> "on %s",
		  "week" 		=> "week ago",
		  "weeks" 		=> "%d weeks ago",
		  "month" 		=> "a month ago",
		  "months" 		=> "%d months ago",
		  "year" 		=> "a year ago",
		  "years" 		=> "%d years ago"
	);
						
	/** String days of week stored in array (0 is Sunday, 6 is Saturday)
	 *  @var Array 
	 */
	public static $weekDays = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
	
	/** Function to calcuate elapsed time (Check link for valid formats)
	 * @param 	String 	$time			- Time
	 * @param 	String 	$calculateFrom 	- Start time difference calculation from 
	 * @return 	String 	- Language expression of time difference
	 * @link	http://www.php.net/manual/en/datetime.formats.php
	 */
	public static function ago($time, $calculateFrom = 'now') {
	
		// Calculate to
		$t = strtotime($time);
		// Calculate from
		$c = strtotime($calculateFrom);
		// Elapsed
		$e = $c - $t;
		// Elapsed that day
		$de = date("H", $c) * TimeAgo::$h + date("i", $c) * TimeAgo::$m + date("s", $c);
		
		if ($e < TimeAgo::$m) {
			// Now / Second / Seconds
			return ($e == 0) ? TimeAgo::$string['now'] : ($e == 1 ? TimeAgo::$string['second'] : sprintf(TimeAgo::$string['seconds'], $e));			
		} elseif ($e < TimeAgo::$h) { 
			// Minutes
			return (($m = intval($e / TimeAgo::$m)) && $m == 1) ? TimeAgo::$string['minute'] : sprintf(TimeAgo::$string['minutes'], $m);
		} elseif ($e < TimeAgo::$d) { 
			// Today - Hours
			return (($h = intval($e / TimeAgo::$h)) && $h == 1) ? TimeAgo::$string['hour'] : sprintf(TimeAgo::$string['hours'], $h);
		} elseif ($e <= TimeAgo::$d + $de) { 
			// Yesterday
			return TimeAgo::$string['yesterday'];
		} elseif ($e < TimeAgo::$d * 6 + $de) { 
			// Last week
			return sprintf(TimeAgo::$string['on'], TimeAgo::$weekDays[date( "w", $t)]);
		} elseif ($e < TimeAgo::$mo) {  // less then month
			// Weeks
			if ($e < TimeAgo::$w * 2) {
				// Last seven days
				return TimeAgo::$string['week'];
			} elseif ($e < TimeAgo::$w * 3) {
				// 2 weeks
				return sprintf(TimeAgo::$string['weeks'], 2);
			} else {
				// 3 weeks
				return sprintf(TimeAgo::$string['weeks'], 3);
			}
		} elseif ($e < TimeAgo::$y) { // less then year
			// Month / Months
			return ($e < TimeAgo::$mo * 2) ? TimeAgo::$string['month'] : sprintf(TimeAgo::$string['months'], intval($e / TimeAgo::$mo));
		} else {
			// Year / Years
			return ($e >= TimeAgo::$y && $e < TimeAgo::$y * 2) ? TimeAgo::$string['year'] : sprintf(TimeAgo::$string['years'], intval($e / TimeAgo::$y));			
		}
	}
}
?>