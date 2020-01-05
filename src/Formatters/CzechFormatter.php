<?php declare(strict_types = 1);

namespace WebChemistry\I18N\Formatters;

final class CzechFormatter extends AbstractFormatter {

	public function getDateTimeFormat(): string {
		return 'd.m.Y H:i:s';
	}

	public function getDateFormat(): string {
		return 'd.m.Y';
	}

	public function getTimeFormat(): string {
		return 'H:i:s';
	}

}
