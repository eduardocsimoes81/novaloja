<?php 
	class Options extends model{

		public function getName($id_option){

			$sql = "SELECT name FROM options WHERE id = :id_option";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id_option", $id_option);
			$sql->execute();

			if($sql->rowCount() > 0){
				$data = $sql->fetch();

				return $data['name'];
			}
		}
	}
 ?>