<?php


namespace Hook\A\B;

class C {

	/**
	 * @param string $table
	 * <code>
	 * $orm = Hook\Db\OrmConnect::getInstance('hp_iot_config')
	 * </code>
	 *
	 * @return bool
	 */
	public function initTable($table = '') {
		return true;
	}


	/**
	 * @param string $table
	 * <code>
	 * $orm = Hook\Db\OrmConnect::getInstance('hp_iot_config')
	 * $data = $orm->select()
	 * ->where(['id' => 1])
	 * ->limit(1)
	 * ->fetchColumn() > 0;
	 * </code>
	 *
	 * @return bool
	 */
	private function checkTable($table = '') {
		return true;
	}


}

