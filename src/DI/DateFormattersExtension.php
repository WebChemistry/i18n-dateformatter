<?php declare(strict_types = 1);

namespace WebChemistry\I18N\DI;

use Nette\DI\CompilerExtension;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use WebChemistry\I18N\DateFormatterInterface;
use WebChemistry\I18N\Formatters\CzechFormatter;

final class DateFormattersExtension extends CompilerExtension {

	public function getConfigSchema(): Schema {
		return Expect::structure([
			'formatter' => Expect::string(CzechFormatter::class),
		]);
	}

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('formatter'))
			->setType(DateFormatterInterface::class)
			->setFactory($this->getConfig()->formatter);
	}

}
