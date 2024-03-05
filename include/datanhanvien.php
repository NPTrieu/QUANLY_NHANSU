<?php  
class nhanvieno{

	//DB Stuff
	private $conn;
	private $table = "nhanvien";

	// Properties
	//public $n_nhanvien_id;		
	public $maNV;
	public $maBP;
	public $maBH;
	public $DiaChi;
	public $SDT;
	public $Email;
	public $CCCD;
	public $tinhTrangHonNhan;
	public $ngaycap;
	public $HovaTen;
	public $Gioitinh;
	public $ngayVaoLam;
	public $trinhDoHocVan;
    public $trinhDoChuyenMon;
	public $tinhTrang;
	public $noiCap;
    public $tenChucVu;


	//Constructor with DB
	public function __construct($db){
		$this->conn = $db;
	}

	//Read multi records
	public function read(){
		$sql = "SELECT * FROM $this->table";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	//Read one record
	public function read_single(){
		$sql = "SELECT * FROM $this->table WHERE maNV = :get_maNV";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_maNV',$this->maNV);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//Set Properties
		//$this->n_nhanvien_id = $row['maNV'];
		$this->maNV = $row['maNV'];
		$this->HovaTen = $row['TenNV'];
		$this->NgaySinh = $row['NgaySinh'];
		$this->DiaChi = $row['DiaChi'];
		$this->DienThoai = $row['DienThoai'];

		$this->TinhTP = $row['TinhTP'];
		$this->CCCD = $row['CCCD'];
		$this->TTHonNhan = $row['TTHonNhan'];
		$this->MaBH = $row['MaBH'];

	
		$this->GioiTinh = $row['GioiTinh'];
		$this->NgayVaoLam = $row['NgayVaoLam'];
		$this->TrinhDo = $row['TrinhDo'];
		$this->TinhTrangLamViec = $row['TinhTrangLamViec'];
		$this->GhiChu = $row['GhiChu'];



		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET maNV = :maNV,
		          	  TenNV = :TenNV,
		          	  NgaySinh = :NgaySinh,
					  DiaChi = :DiaChi,
					  DienThoai = :DienThoai,
					  TinhTP = :TinhTP,
					  CCCD = :CCCD,
					  TTHonNhan = :TTHonNhan,
					  MaBH = :MaBH,

					  
					  GioiTinh = :GioiTinh,
					  NgayVaoLam = :NgayVaoLam,
					  TrinhDo = :TrinhDo,
					  TinhTrangLamViec = :TinhTrangLamViec, 
					  GhiChu = :GhiChu,
					 
		          	   = :date_created,
		          	   = :time_created";		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->maNV = htmlspecialchars(strip_tags($this->maNV));
		$this->TenNV = htmlspecialchars(strip_tags($this->TenNV));
		$this->NgaySinh = htmlspecialchars(strip_tags($this->NgaySinh));
		$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
		$this->DienThoai = htmlspecialchars(strip_tags($this->DienThoai));
		$this->TinhTP = htmlspecialchars(strip_tags($this->TinhTP));
		$this->CCCD = htmlspecialchars(strip_tags($this->CCCD));
		$this->TTHonNhan = htmlspecialchars(strip_tags($this->TTHonNhan));
		$this->MaBH = htmlspecialchars(strip_tags($this->MaBH));

		
		$this->GioiTinh = htmlspecialchars(strip_tags($this->GioiTinh));
		$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
		$this->TrinhDo = htmlspecialchars(strip_tags($this->TrinhDo));
		$this->TinhTrangLamViec = htmlspecialchars(strip_tags($this->TinhTrangLamViec));
		$this->GhiChu = htmlspecialchars(strip_tags($this->GhiChu));
		



		//Bind data
		$stmt->bindParam(':maNV',$this->maNV);
		$stmt->bindParam(':TenNV',$this->TenNV);
		$stmt->bindParam(':NgaySinh',$this->NgaySinh);
		$stmt->bindParam(':DiaChi',$this->DiaChi);
		$stmt->bindParam(':DienThoai',$this->DienThoai);
		$stmt->bindParam(':TinhTP',$this->TinhTP);
		$stmt->bindParam(':CCCD',$this->CCCD);
		$stmt->bindParam(':TTHonNhan',$this->TTHonNhan);
		$stmt->bindParam(':MaBH',$this->MaBH);

		
		$stmt->bindParam(':GioiTinh',$this->GioiTinh);
		$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
		$stmt->bindParam(':TrinhDo',$this->TrinhDo);
		$stmt->bindParam(':TinhTrangLamViec',$this->TinhTrangLamViec);
		$stmt->bindParam(':GhiChu',$this->GhiChu);


		$stmt->bindParam(':date_created',$this->);
		$stmt->bindParam(':time_created',$this->);

		//Execute query
		if($stmt->execute()){
			return true;
		}
		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;
	}

	//Update employee
	public function update(){
		//Create query
		$query = "UPDATE $this->table
		          SET 
		          	  TenNV = :TenNV,
		          	  NgaySinh = :NgaySinh,
					  DiaChi = :DiaChi,
					  DienThoai = :DienThoai,
					  TinhTP = :TinhTP,
					  CCCD = :CCCD,
					  TTHonNhan = :TTHonNhan,
					  MaBH = :MaBH,
					  
					  
					  GioiTinh = :GioiTinh,
					  NgayVaoLam = :NgayVaoLam,
					  TrinhDo = :TrinhDo,
					  TinhTrangLamViec = :TinhTrangLamViec, 
					  GhiChu = :GhiChu,

		          	   = :date_created,
		          	   = :time_created
		          WHERE 
		          	  maNV = :get_maNV";
		//Prepare statement
		$stmt = $this->conn->prepare($query);
		//Clean data
		$this->maNV = htmlspecialchars(strip_tags($this->maNV));
		$this->TenNV = htmlspecialchars(strip_tags($this->TenNV));
		$this->NgaySinh = htmlspecialchars(strip_tags($this->NgaySinh));
		$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
		$this->DienThoai = htmlspecialchars(strip_tags($this->DienThoai));
		$this->TinhTP = htmlspecialchars(strip_tags($this->TinhTP));
		$this->CCCD = htmlspecialchars(strip_tags($this->CCCD));
		$this->TTHonNhan = htmlspecialchars(strip_tags($this->TTHonNhan));
		$this->MaBH = htmlspecialchars(strip_tags($this->MaBH));

		
		$this->GioiTinh = htmlspecialchars(strip_tags($this->GioiTinh));
		$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
		$this->TrinhDo = htmlspecialchars(strip_tags($this->TrinhDo));
		$this->TinhTrangLamViec = htmlspecialchars(strip_tags($this->TinhTrangLamViec));
		$this->GhiChu = htmlspecialchars(strip_tags($this->GhiChu));

		//Bind data
//		$stmt->bindParam(':get_id',$this->maNV);
		$stmt->bindParam(':get_maNV',$this->maNV);
		$stmt->bindParam(':TenNV',$this->TenNV);
		$stmt->bindParam(':NgaySinh',$this->NgaySinh);
		$stmt->bindParam(':DiaChi',$this->DiaChi);
		$stmt->bindParam(':DienThoai',$this->DienThoai);
		$stmt->bindParam(':TinhTP',$this->TinhTP);
		$stmt->bindParam(':CCCD',$this->CCCD);
		$stmt->bindParam(':TTHonNhan',$this->TTHonNhan);
		$stmt->bindParam(':MaBH',$this->MaBH);

		
		$stmt->bindParam(':GioiTinh',$this->GioiTinh);
		$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
		$stmt->bindParam(':TrinhDo',$this->TrinhDo);
		$stmt->bindParam(':TinhTrangLamViec',$this->TinhTrangLamViec);
		$stmt->bindParam(':GhiChu',$this->GhiChu);
		
		$stmt->bindParam(':date_created',$this->);
		$stmt->bindParam(':time_created',$this->);
		//Execute query
		if($stmt->execute()){
			return true;
		}
		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;
	}

	//Delete employee
	public function delete(){

		//Create query
		$query = "DELETE FROM $this->table
		          WHERE maNV = :get_maNV";
		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->maNV= htmlspecialchars(strip_tags($this->maNV));

		//Bind data
		$stmt->bindParam(':get_maNV',$this->maNV);

		//Execute query
		if($stmt->execute()){
			return true;
		}

		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;

	}

}
?>
