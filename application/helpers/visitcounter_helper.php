<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Visit Counter Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		SEDCI Dev Team
 * @link		Uhm... None.
 */

// ------------------------------------------------------------------------

if ( ! function_exists('count_visit'))
{
	/**
	 * Count Visit
	 *
	 * Updates visit count on a txt file.
	 *
	 * @param	none
	 * @return	none
	 */
	function count_visit()
	{
		$CI =& get_instance();

		if ($CI->session->userdata('hasVisited') == '') {
			$CI->load->helper('file');

			$counter_dir = APPPATH.'logs/counter/';
			$totalcount = 0;

			if (!file_exists($counter_dir)) {
				mkdir($counter_dir);
			}

			if (file_exists($counter_dir.'totalcount')) {
				$totalcount = trim(read_file($counter_dir.'totalcount'));
			}

			$totalcount++;

			write_file($counter_dir.'totalcount', $totalcount);

			if (file_exists($counter_dir.date('Ym'))) {
				$monthcountlist = trim(read_file($counter_dir.date('Ym')));
				$dailycount_arr = explode("\r\n", $monthcountlist);
				$findcurdate = preg_grep("/".date('Ymd')."/", $dailycount_arr);

				if (count($findcurdate) > 0) {
					foreach ($findcurdate as $k => $v) {
						$dc = explode(' ', $v);
						$dc[1]++;
						$dailycount_arr[$k] = implode(' ', $dc);
					}
				} else {
					$dailycount_arr[] = date('Ymd').' 1';
				}

				asort($dailycount_arr);

				$monthcountlist = implode("\r\n", $dailycount_arr);
			} else {
				$monthcountlist = date('Ymd').' 1';
			}

			write_file($counter_dir.date('Ym'), $monthcountlist);
		}
	}
}

if ( ! function_exists('get_total_visits'))
{
	/**
	 * Get Total Visits
	 *
	 * Fetches the total number of visits.
	 *
	 * @param	none
	 * @return	none
	 */
	function get_total_visits()
	{
		$CI =& get_instance();

		$CI->load->helper('file');

		$counter_dir = APPPATH.'logs/counter/';
		$totalcount = 0;

		if (file_exists($counter_dir.'totalcount')) {
			$totalcount = trim(read_file($counter_dir.'totalcount'));
		}

		return $totalcount;
	}
}

if ( ! function_exists('get_today_visits'))
{
	/**
	 * Get Today Visits
	 *
	 * Fetches the total number of visits for the day.
	 *
	 * @param	none
	 * @return	none
	 */
	function get_today_visits()
	{
		$CI =& get_instance();

		$CI->load->helper('file');

		$counter_dir = APPPATH.'logs/counter/';
		$dailycount = 0;

		if (file_exists($counter_dir.date('Ym'))) {
			$content = trim(read_file($counter_dir.date('Ym')));
			$dailycount_arr = explode("\r\n", $content);
			$findcurdate = preg_grep("/".date('Ymd')."/", $dailycount_arr);

			if (count($findcurdate) > 0) {
				foreach ($findcurdate as $k => $v) {
					$dc = explode(' ', $v);
				}

				$dailycount = $dc[1];
			}
		}

		return $dailycount;
	}
}
