<?php declare(strict_types = 1);

namespace WebChemistry\I18N;

use DateTime;

interface DateFormatterInterface {

	/**
	 * Format day, month, year, hour, minute, second
	 */
	public function getDateTimeFormat(): string;

	/**
	 * Format day, month, year
	 */
	public function getDateFormat(): string;

	/**
	 * Format hour, minute, second
	 */
	public function getTimeFormat(): string;

	////

	/**
	 * Format day, month, year, hour, minute, second
	 */
	public function formatDateTime(DateTime $dateTime): string;

	/**
	 * Format day, month, year
	 */
	public function formatDate(DateTime $dateTime): string;

	/**
	 * Format hour, minute, second
	 */
	public function formatTime(DateTime $dateTime): string;

}
