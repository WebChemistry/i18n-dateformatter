<?php declare(strict_types = 1);

namespace WebChemistry\I18N\Formatters;

use DateTime;
use Nette\SmartObject;
use WebChemistry\I18N\DateFormatterInterface;

abstract class AbstractFormatter implements DateFormatterInterface {

	use SmartObject;

	public function formatDateTime(DateTime $dateTime): string {
		return $dateTime->format($this->getDateTimeFormat());
	}

	public function formatDate(DateTime $dateTime): string {
		return $dateTime->format($this->getDateFormat());
	}

	public function formatTime(DateTime $dateTime): string {
		return $dateTime->format($this->getTimeFormat());
	}

}
