<?php 
class ConnectionModel {
	
	private function openDb() {
		$this->condb=mysqli_connect("localhost", "root", "","test");
		if ($this->condb->connect_error) 
		{
			die("Erron in connection: " . $this->condb->connect_error);
		}		
	}

	private function closeDb() {
			$this->condb->close();
	}
	public function selectAll(){
		$this->openDb();     
		$query=$this->condb->prepare("SELECT * FROM tbl_student");
		$query->execute();
		$res=$query->get_result();	
		$this->closeDb(); 		
		return $res;
	}
	public function selectById($id){
		$this->openDb();     
		$query=$this->condb->prepare("SELECT * FROM tbl_student where id='".$id."'");
		$query->execute();
		$result_1=$query->get_result();
	 
		while($row=$result_1->fetch_assoc())
		{
			 $res = $row;
		} 
		$this->closeDb();	
		return $res;
	}
	public function insertStudent($data =array()){
		
		
		$this->openDb();   
		$query=$this->condb->prepare("INSERT INTO tbl_student set name='".$data['name']."'");
		$query->execute();
        $insertId = $query->insert_id;
        return $insertId;
	}
	public function updateStudent($data =array()){
		$this->openDb();   
		$query=$this->condb->prepare("UPDATE tbl_student set name='".$data['name']."' where id='".$data['id']."'");
		return $query->execute();
    }
	public function delStudent($id){
		$this->openDb();   
		$query=$this->condb->prepare("DELETE FROM tbl_student where id='".$id."'");
		return $query->execute(); 
    }

}
