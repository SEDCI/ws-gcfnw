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

		$ua = $CI->input->server('HTTP_USER_AGENT');

		if ($CI->session->userdata('hasVisited') == '' && !empty($ua) && (strpos($ua, 'ISPConfig') === false)) {
			$CI->load->helper('file');

			$totalcount = 0;

			if (!file_exists(COUNTER_DIRECTORY)) {
				mkdir(COUNTER_DIRECTORY);
			}

			if (file_exists(COUNTER_DIRECTORY.'totalcount')) {
				$totalcount = trim(read_file(COUNTER_DIRECTORY.'totalcount'));
			}

			$totalcount++;

			write_file(COUNTER_DIRECTORY.'totalcount', $totalcount);

			if (file_exists(COUNTER_DIRECTORY.date('Ym'))) {
				$monthcountlist = trim(read_file(COUNTER_DIRECTORY.date('Ym')));
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

			write_file(COUNTER_DIRECTORY.date('Ym'), $monthcountlist);

			$CI->session->set_userdata('hasVisited', 'y');
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
	 * @return	int
	 */
	function get_total_visits()
	{
		$CI =& get_instance();

		$CI->load->helper('file');

		$totalcount = 0;

		if (file_exists(COUNTER_DIRECTORY.'totalcount')) {
			$totalcount = trim(read_file(COUNTER_DIRECTORY.'totalcount'));
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
	 * @return	int
	 */
	function get_today_visits()
	{
		$CI =& get_instance();

		$CI->load->helper('file');

		$dailycount = 0;

		if (file_exists(COUNTER_DIRECTORY.date('Ym'))) {
			$content = trim(read_file(COUNTER_DIRECTORY.date('Ym')));
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

if ( ! function_exists('get_monthly_visits'))
{
	/**
	 * Get Monthly Visits
	 *
	 * Fetches the total number of visits per month.
	 *
	 * @param	int
	 * @return	array
	 */
	function get_monthly_visits($past_months_count = 12)
	{
		$CI =& get_instance();

		$CI->load->helper('file');
		$CI->load->helper('date');

		$dailycount = 0;

		$tmp_date = date('Y-m-d');
		$tmp_timestamp = strtotime($tmp_date);
		$tmp_file = date('Ym');

		for ($i = 0; $i < $past_months_count; $i++) {
			$monthly_sum = 0;

			if (file_exists(COUNTER_DIRECTORY.$tmp_file)) {
				$content = read_file(COUNTER_DIRECTORY.$tmp_file);
				$daily_count_arr = explode("\r\n", $content);

				foreach ($daily_count_arr as $daily_count) {
					$count_data = explode(' ', trim($daily_count));
					$monthly_sum += $count_data[1];
				}
			}

			$months[] = date('M', $tmp_timestamp);
			$counts[] = $monthly_sum;
			$tmp_timestamp = strtotime('-1 month', strtotime($tmp_date));
			$tmp_date = date('Y-m-d', $tmp_timestamp);
			$tmp_file = date('Ym', $tmp_timestamp);
		}

		$monthly_count['months'] = array_reverse($months);
		$monthly_count['counts'] = array_reverse($counts);

		return array_reverse($monthly_count);
	}
}
