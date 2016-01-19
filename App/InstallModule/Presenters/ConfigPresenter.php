<?php

namespace App\InstallModule\Presenters;

use Nette;

class ConfigPresenter extends Nette\Application\UI\Presenter
{


	public function actionDefault()
	{

	}

	public function renderDefault()
	{

	}


	/**
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentConfigForm()
	{
		$form = new Nette\Application\UI\Form();

		$form->addGroup('Server related');

		$form->addText('ServerName', 'Server name')
			->setRequired();

		$form->addSelect('timeZone', 'Time zone', [
			'Africa',
			'America',
			'Antarctica',
			'Arctic',
			'Asia',
			'Atlantic',
			'Australia',
			'Europe (Bucharest)',
			'Europe (London)',
			'Indian',
			'Pacific',
		]);

		$form->addText('speed', 'Speed')
			->setDefaultValue(1);

		$form->addText('troopSpeed', 'Troop speed')
			->setDefaultValue(1);

		$form->addText('evasionSpeed', 'Evasion speed')
			->setDefaultValue(1);

		$form->addText('traderMultiplier', 'Trader multiplier')
			->setDefaultValue(1);

		$form->addText('crannyMultiplier', 'Cranny multiplier')
			->setDefaultValue(1);

		$form->addText('storageMultiplier', 'Storage multiplier')
			->setDefaultValue(1);

		$form->addText('trapMultiplier', 'Trap multiplier')
			->setDefaultValue(1);

		$form->addText('natarMultiplier', 'Natar multiplier')
			->setDefaultValue(1);

		$form->addText('worldSize', 'World size (square)')
			->setDefaultValue(100);

		$form->addCheckbox('registrationOpen', 'Open registrations')
			->setDefaultValue(TRUE);

		$form->addSelect('beginnerProtection', 'Beginner protection', [
			Nette\Utils\DateTime::HOUR * 2 => '2 Hours',
			Nette\Utils\DateTime::HOUR * 6 => '6 Hour',
			Nette\Utils\DateTime::HOUR * 12 => '12 Hour',
			Nette\Utils\DateTime::DAY * 1 => '1 Day',
			Nette\Utils\DateTime::DAY * 2 => '2 Days',
			Nette\Utils\DateTime::DAY * 3 => '3 Days',
			Nette\Utils\DateTime::DAY * 7 => '7 Days',
		]);

		$form->addSelect('plusLength', 'Plus length', [
			Nette\Utils\DateTime::HOUR * 12 => '12 Hour',
			Nette\Utils\DateTime::DAY * 1   => '1 Day',
			Nette\Utils\DateTime::DAY * 2   => '2 Days',
			Nette\Utils\DateTime::DAY * 3   => '3 Days',
			Nette\Utils\DateTime::DAY * 7   => '7 Days',
		]);

		$form->addSelect('productionBoostLength', 'Production boost length', [
			Nette\Utils\DateTime::HOUR * 12 => '12 Hour',
			Nette\Utils\DateTime::DAY * 1   => '1 Day',
			Nette\Utils\DateTime::DAY * 2   => '2 Days',
			Nette\Utils\DateTime::DAY * 3   => '3 Days',
			Nette\Utils\DateTime::DAY * 7   => '7 Days',
		]);

		$form->addSelect('natureRegeneration', 'Nature troops regeneration time', [
			Nette\Utils\DateTime::HOUR * 2  => '2 Hours',
			Nette\Utils\DateTime::HOUR * 6  => '6 Hour',
			Nette\Utils\DateTime::HOUR * 12 => '12 Hour',
			Nette\Utils\DateTime::DAY * 1   => '1 Day',
		]);

		$form->addSelect('medalInterval', 'Medal interval', [
			Nette\Utils\DateTime::DAY * 1 => '1 Day',
			Nette\Utils\DateTime::DAY * 2 => '2 Days',
			Nette\Utils\DateTime::DAY * 3 => '3 Days',
			Nette\Utils\DateTime::DAY * 7 => '7 Days',
		]);

		$form->addText('tourThreshold', 'Tour threshold')
			->setDefaultValue(20);

		$form->addCheckbox('greatWorkshop', 'Great workshop');

		$form->addCheckbox('worldWonder', 'World wonder');

		$form->addCheckbox('showNatarStatistics', 'Show natars in statistics');

		$form->addSelect('peaceSystem', 'Peace system', [
			'None',
			'Normal',
			'Christmas',
			'New year',
			'Easter',
		]);

		$form->addGroup('Admin account');

		$form->addText('adminName', 'Admin name');
		$form->addText('adminEmail', 'Admin email');

		$form->addCheckbox('showAdminStatistics', 'Show admin in statistics');

		$form->addGroup('Sql related');

		$form->addText('hostname', 'Hostname');
		$form->addText('username', 'Username');
		$form->addPassword('password', 'Password');
		$form->addText('dbName', 'Database name');

		$form->addGroup('Other');
		$form->addCheckbox('newsBoxOne', 'Newsbox 1');
		$form->addCheckbox('newsBoxTwo', 'Newsbox 2');
		$form->addCheckbox('newsBoxThree', 'Newsbox 3');

		$form->addCheckbox('log', 'Log actions');

		$form->addCheckbox('quest', 'Enable quests');
		$form->addCheckbox('questExtended', 'Enable extended quests');

		$form->addCheckbox('autoActivate', 'Auto activate accounts');

		$form->addGroup('Start time');
		$form->addText('startDate', 'Start date Year-month-day format')
			->setDefaultValue(Nette\Utils\DateTime::from('now')->format('Y-m-d'));
		$form->addText('startTime', 'Start time')
			->setDefaultValue(Nette\Utils\DateTime::from('now')->format('H:i'));

		$form->onSuccess[] = [$this, 'processConfig'];

		$form->addSubmit('Next', 'Next');

		return $form;
	}


	/**
	 * @param Nette\Application\UI\Form $form
	 */
	public function processConfig(Nette\Application\UI\Form $form)
	{
		$data = $form->getValues();
		$text = file_get_contents(__DIR__ . '/../../Config/local.neon.temp');

		$text = preg_replace("'%SERVERNAME%'", $data->ServerName, $text);
		$text = preg_replace("'%STIMEZONE%'", $data->timeZone, $text);
		$text = preg_replace("'%SSTARTDATE%'", $data->startDate, $text);
		$text = preg_replace("'%SSTARTTIME%'", $data->startTime, $text);
		$text = preg_replace("'%SPEED%'", $data->speed, $text);
		$text = preg_replace("'%INCSPEED%'", $data->troopSpeed, $text);
		$text = preg_replace("'%EVASIONSPEED%'", $data->evasionSpeed, $text);
		$text = preg_replace("'%TRADERCAP%'", $data->traderMultiplier, $text);
		$text = preg_replace("'%CRANNYCAP%'", $data->crannyMultiplier, $text);
		$text = preg_replace("'%TRAPPERCAP%'", $data->trapMultiplier, $text);
		$text = preg_replace("'%STORAGE_MULTIPLIER%'", $data->storageMultiplier, $text);
		$text = preg_replace("'%MAX%'", $data->worldSize, $text);

		$text = preg_replace("'%SSERVER%'", $data->hostname, $text);
		$text = preg_replace("'%SUSER%'", $data->username, $text);
		$text = preg_replace("'%SPASS%'", $data->password, $text);
		$text = preg_replace("'%SDB%'", $data->dbName, $text);

		$text = preg_replace("'%AEMAIL%'", $data->adminEmail, $text);
		$text = preg_replace("'%ANAME%'", $data->adminName, $text);
		$text = preg_replace("'%LOG%'", $data->log, $text);
		$text = preg_replace("'%ACTIVATE%'", $data->autoActivate, $text);
		$text = preg_replace("'%ARANK%'", $data->showAdminStatistics, $text);
		$text = preg_replace("'%QUEST%'", $data->quest, $text);
		$text = preg_replace("'%BEGINNER%'", $data->beginnerProtection, $text);

		$text = preg_replace("'%BOX1%'", $data->newsBoxOne, $text);
		$text = preg_replace("'%BOX2%'", $data->newsBoxTwo, $text);
		$text = preg_replace("'%BOX3%'", $data->newsBoxThree, $text);

		$text = preg_replace("'%PLUS_TIME%'", $data->plusLength, $text);
		$text = preg_replace("'%PLUS_PRODUCTION%'", $data->productionBoostLength, $text);
		$text = preg_replace("'%MEDALINTERVAL%'", $data->medalInterval, $text);
		$text = preg_replace("'%GREAT_WKS%'", $data->greatWorkshop, $text);
		$text = preg_replace("'%TS_THRESHOLD%'", $data->tourThreshold, $text);
		$text = preg_replace("'%WW%'", $data->worldWonder, $text);
		$text = preg_replace("'%SHOW_NATARS%'", $data->showNatarStatistics, $text);
		$text = preg_replace("'%NATARS_UNITS%'", $data->natarMultiplier, $text);
		$text = preg_replace("'%NATURE_REGTIME%'", $data->natureRegeneration, $text);
		$text = preg_replace("'%REG_OPEN%'", $data->registrationOpen, $text);
		$text = preg_replace("'%PEACE%'", $data->peaceSystem, $text);

		file_put_contents(__DIR__ . '/../../Config/local.neon', $text);

		$this->redirect('Install:DataForm:default');
	}
}