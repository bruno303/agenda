<?php

namespace Source;

Class Event
{
	public static function listAll($student)
	{
		$sql = new Sql();
		return $sql->select("SELECT ID_EVENT, DESCRIPTION, DATE_FORMAT(DT_EVENT, '%d/%m/%Y') AS DT_EVENT, ACTIVE FROM EVENTS WHERE ID_STUDENT=:student", [':student' => $student]);
	}

	private function nextCode()
	{
		$student = (int)$_SESSION['user']['id_student'];
		$sql = new Sql();
		$result = $sql->select("SELECT COALESCE(MAX(ID_EVENT), 0) + 1 AS CODE FROM EVENTS WHERE ID_STUDENT = :student", [':student' => $student]);
		return $result[0]['CODE'];
	}

	public function add($params = array())
	{
		$description = $params['inpDescription'];
		$date = $params['inpDate'];
		$active = (int)(bool)$params['inpActive'];

		$sql = new Sql();
		$query = "INSERT INTO EVENTS (ID_EVENT, DESCRIPTION, DT_EVENT, ACTIVE, ID_STUDENT)
				  VALUES (:id_event, :description, :date, :active, :id_student);";
		$sql->query($query, [
			":id_event"    => $this->nextCode(),
			":description" => $description,
			":date" 	   => $date,
			":active" 	   => (int)(bool)$active,
			":id_student"  => (int)$_SESSION['user']['id_student']
		]);
	}

	public function alterActive($idEvent, $status)
	{
		$sql = new Sql();
		$sql->query("UPDATE EVENTS SET ACTIVE=:status WHERE ID_EVENT=:idEvent AND ID_STUDENT=:idStudent",
			[":status" => (int)(bool)$status,
			 ":idEvent" => (int)$idEvent,
			 ":idStudent" => (int)$_SESSION['user']['id_student']]);
	}

	public function load($event)
	{
		$sql = new Sql();
		return $sql->select("SELECT ID_EVENT, DESCRIPTION, DT_EVENT, ACTIVE FROM EVENTS WHERE ID_EVENT=:event AND ID_STUDENT=:student", [':event' => (int)$event, ':student' => (int)$_SESSION['user']['id_student']]);
	}

	public function update($params = array())
	{
		$sql = new Sql();
		$sql->query(
			"UPDATE EVENTS
			SET DESCRIPTION = :description,
				DT_EVENT = :dt_event,
				ACTIVE = :active
			WHERE ID_EVENT = :id_event AND ID_STUDENT = :id_student",
			[':description' => $params['inpDescription'],
			':dt_event' => $params['inpDate'],
			':active' => (int)(bool)$params['inpActive'],
			':id_event' => (int)$params['inpId'],
			':id_student' => (int)$_SESSION['user']['id_student']]
		);
	}
}

?>