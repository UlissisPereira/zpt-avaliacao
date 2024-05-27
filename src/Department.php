<?php
namespace Department;

require_once './User.php';

class Department {
	private User\User $user;

	public function __construct() {
		$this->user = new User\User(); // @todo fixme
	}

    public function getGreaterDepartament() {
        $db = $this->user->getDb();

        return $db->q('SELECT dep.name FROM department dep \
            INNER JOIN user_department ud ON dep.id = ud.department \
            INNER JOIN user u ON u.id = ud.user \
            WHERE dep.employees = (SELECT MAX(employees) FROM department)');
    }
}
?>
