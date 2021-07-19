<?php 
require 'model/ConnectionModel.php';
	
class ConnectionServices {

	private $contactsGateway    = NULL; 
	public function __construct() {
		$this->contactsGateway = new ConnectionModel();
	}
	public function handleRequest(){
		$action = "";
		if (! empty($_GET["action"])) {
			$action = $_GET["action"];
		}
		switch ($action) {
			case "add":
				require_once "view/addstudent.php";
				break;
			case "insert":
				//echo "<pre>"; print_r($_POST); echo "</pre>"; die();
				unset($_POST['submit']);
				$data = $_POST;
				if(isset($_POST['name']) && $_POST['name']!=null){
					if(isset($_FILES['image']) && $_FILES['image']!=null){
						$directory = "./upload/";
						$path = $directory . basename($_FILES['image']['name']); 
					
						$imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
						//echo $imageFileType; die();
						
						if(!move_uploaded_file($_FILES['image']['tmp_name'],$path)){
							echo "error";die();
						}else{
							$data['name'] =  basename($_FILES['image']['name']); 	
						}
						
					}
					
					$res = $this->contactsGateway->insertStudent($data);
					if($res){
						 header("Location: index.php");
					}
				}
				break;
			case "edit":
				if(isset($_GET['id']) && $_GET['id']!=null){
					$res = $this->contactsGateway->selectById($_GET['id']);
					//echo "<pre>"; print_r($res); die();
				}else{
					 header("Location: index.php");
				}
			
				require_once "view/editstudent.php";
				break;
			case "update":
				//echo "<pre>"; print_r($_POST); echo "</pre>"; die();
				unset($_POST['submit']);
				$data = $_POST;
				if(isset($_POST['name']) && $_POST['name']!=null){
					$res = $this->contactsGateway->updateStudent($data);
					if($res){
						 header("Location: index.php");
					}
				}
				break;	
			case "delete":
				//echo "<pre>"; print_r($_POST); echo "</pre>"; die();
				
				$data = $_POST;
				if(isset($_GET['id']) && $_GET['id']!=null){
					$res = $this->contactsGateway->delStudent($_GET['id']);
					if($res){
						 header("Location: index.php");
					}
				}
				break;	
			default:
			
			$res = $this->contactsGateway->selectAll();
			
			require_once "view/student.php";
			break;	
		}
	}
}
