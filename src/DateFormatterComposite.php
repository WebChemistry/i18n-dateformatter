<?php declare(strict_types = 1);

namespace WebChemistry\I18N;

use DateTime;
use Nette\SmartObject;
use WebChemistry\I18N\Exceptions\DateFormatterException;

final class DateFormatterComposite implements DateFormatterInterface {

	use SmartObject;

	/** @var DateFormatterInterface[] */
	private $formatters;

	/** @var string|null */
	private $locale;

	/**
	 * @param DateFormatterInterface[] $formatters
	 */
	public function __construct(array $formatters, ?string $locale = null) {
		$this->locale = $locale;

		foreach ($formatters as $locale => $formatter) {
			$this->addFormatter($locale, $formatter);
		}
	}

	protected function getFormatter(): DateFormatterInterface {
		if ($this->locale) {
			if (!isset($this->formatters[$this->locale])) {
				throw new DateFormatterException(sprintf('Formatter for %s not exists', $this->locale));
			}

			return $this->formatters[$this->locale];
		}

		throw new DateFormatterException('Locale must be set');
	}

	public function setLocale(string $locale): void {
		$this->locale = $locale;
	}

	public function addFormatter(string $locale, DateFormatterInterface $dateFormatter): self {
		$this->formatters[$locale] = $dateFormatter;

		return $this;
	}

	public function formatDateTime(DateTime $dateTime): string {
		return $this->getFormatter()->formatDateTime($dateTime);
	}

	public function formatDate(DateTime $dateTime): string {
		return $this->getFormatter()->formatDate($dateTime);
	}

	public function formatTime(DateTime $dateTime): string {
		return $this->getFormatter()->formatTime($dateTime);
	}

}
