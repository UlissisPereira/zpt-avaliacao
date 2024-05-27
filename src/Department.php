<?php
namespace Department;

require_once './User.php';

class Department {
	private User $user;
    private $db;

	public function __construct() {
        // O erro foi inserido no commit 68d80a9a
        // Sendo um código procedural o nameespace não é necessário
		$this->user = new User();
	}

    public function getGreaterDepartament() {
        return $this->db->q('SELECT dep.name FROM department dep \
            INNER JOIN user_department ud ON dep.id = ud.department \
            INNER JOIN user u ON u.id = ud.user \
            WHERE dep.employees = (SELECT MAX(employees) FROM department)');
    }

    public function setDb($db) {
        if (!$db || $db->isClosed()) {
            return false;
        }

        if ($db->debug) {
            $db->setGeneralLog('on');
            error_log($db);
        }

        if ($db->profiling) {
            $db->setSlowLog('on');
        }

        $this->db = $db;
    }
}
?>
