<?php
class Outletexcel extends CI_Controller {
 
	function __Construct(){
	  parent::__Construct ();
	}
	 
	public function index() {
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('OUTLET REPORT');

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Achievement");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');

		$headers = array('No',
						 'Outlet Name',
						 'January',
						 'Febuary',
						 'March',
						 'April',
						 'May',
						 'June',
						 'July',
						 'August',
						 'September',
						 'October',
						 'November',
						 'December'
						 );
		foreach(range('B','O') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}

    	$outlets = array(
    					array(
    						'1',
    						'outlet_name' => 'Seam Bunly',
    						'address'     => 'Store: 146,147 (inside OLP)',
    						'ba_code'      => '001',
    						'ba_name'	  => 'Ban Sophanet'
    					),
    					array(
    						'2',
    						'outlet_name' => 'Lam Hong',
    						'address'     => '# 22, St 199,Outside Olypich',
    						'ba_code'      => '002',
    						'ba_name'	  => 'Khun Socheatha'
    					)
    			);    
    	$this->load->model('dao/Daoexcelreport');
    	$outlets = $this->Daoexcelreport->getOutletWithItems();	
    	$this->excel->getActiveSheet()->freezePane('B6');
    	$styleArray = array(
		    'borders' => array(
		        'outline' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN
		            //'color' => array('argb' => 'FFFF0000'),
		        ),
		        'inside' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN
		        ),
		    ),
		);
		$this->excel->getActiveSheet()->getStyle('B5:O5')->applyFromArray($styleArray);


    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');
    	$this->excel->getActiveSheet()->getStyle('B5:O'.(count($outlets)+5))->applyFromArray($styleArray);

    	$this->excel->createSheet(1);
    	//activate worksheet number 1
		$this->excel->setActiveSheetIndex(1);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('MONTHLY REPORT');

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Achievement");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');
		$headers = array('No',
						 'Outlet Name',
						 'Address',
						 'BA Code',
						 'BA Name',
						 'Target',
						 'SKC',
						 'Hair',
						 'Ach.',
						 '% Ach.'
						 );
		$this->excel->getActiveSheet()->freezePane('B6');
		foreach(range('B','K') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}

    	$outlets = array(
    					array(
    						'1',
    						'outlet_name' => 'Seam Bunly',
    						'address'     => 'Store: 146,147 (inside OLP)',
    						'ba_code'      => '001',
    						'ba_name'	  => 'Ban Sophanet'
    					),
    					array(
    						'2',
    						'outlet_name' => 'Lam Hong',
    						'address'     => '# 22, St 199,Outside Olypich',
    						'ba_code'      => '002',
    						'ba_name'	  => 'Khun Socheatha'
    					)
    			);
    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');
    	$this->excel->getActiveSheet()->getRowDimension(5)->setRowHeight(20);
    	for($i=0; $i<count($outlets); $i++){
			$this->excel->getActiveSheet()->getRowDimension(6+($i))->setRowHeight(20);
		}

    	$this->excel->createSheet(2);
    	//activate worksheet number  
		$this->excel->setActiveSheetIndex(2);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('WEEK 1');

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Achievement 1st WEEK");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');
		$headers = array('No',
						 'Outlet Name',
						 'Address',
						 'BA Code',
						 'BA Name',
						 'Target',
						 'SKC',
						 'Hair',
						 'Ach.',
						 '% Ach.'
						 );
		foreach(range('B','K') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}

    	$outlets = array(
    					array(
    						'1',
    						'outlet_name' => 'Seam Bunly',
    						'address'     => 'Store: 146,147 (inside OLP)',
    						'ba_code'      => '001',
    						'ba_name'	  => 'Ban Sophanet'
    					),
    					array(
    						'2',
    						'outlet_name' => 'Lam Hong',
    						'address'     => '# 22, St 199,Outside Olypich',
    						'ba_code'      => '002',
    						'ba_name'	  => 'Khun Socheatha'
    					)
    			);
    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');

    	    	$this->excel->createSheet(3);
    	//activate worksheet number 1
		$this->excel->setActiveSheetIndex(3);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('WEEK 2');

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Achievement  2nd WEEK");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');
		$headers = array('No',
						 'Outlet Name',
						 'Address',
						 'BA Code',
						 'BA Name',
						 'Target',
						 'SKC',
						 'Hair',
						 'Ach.',
						 '% Ach.'
						 );
		foreach(range('B','K') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(false);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setWidth(15);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}

    	$outlets = array(
    					array(
    						'1',
    						'outlet_name' => 'Seam Bunly',
    						'address'     => 'Store: 146,147 (inside OLP)',
    						'ba_code'      => '001',
    						'ba_name'	  => 'Ban Sophanet'
    					),
    					array(
    						'2',
    						'outlet_name' => 'Lam Hong',
    						'address'     => '# 22, St 199,Outside Olypich',
    						'ba_code'      => '002',
    						'ba_name'	  => 'Khun Socheatha'
    					)
    			);
    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');

    	    	$this->excel->createSheet(4);
    	//activate worksheet number 1
		$this->excel->setActiveSheetIndex(4);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('WEEK 3');

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Achievement  3rd WEEK");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');
		$headers = array('No',
						 'Outlet Name',
						 'Address',
						 'BA Code',
						 'BA Name',
						 'Target',
						 'SKC',
						 'Hair',
						 'Ach.',
						 '% Ach.'
						 );
		foreach(range('B','K') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}

    	$outlets = array(
    					array(
    						'1',
    						'outlet_name' => 'Seam Bunly',
    						'address'     => 'Store: 146,147 (inside OLP)',
    						'ba_code'      => '001',
    						'ba_name'	  => 'Ban Sophanet'
    					),
    					array(
    						'2',
    						'outlet_name' => 'Lam Hong',
    						'address'     => '# 22, St 199,Outside Olypich',
    						'ba_code'      => '002',
    						'ba_name'	  => 'Khun Socheatha'
    					)
    			);
    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');

    	    	$this->excel->createSheet(5);
    	//activate worksheet number 1
		$this->excel->setActiveSheetIndex(5);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('WEEK 4');

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Achievement  4th WEEK");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');
		$headers = array('No',
						 'Outlet Name',
						 'Address',
						 'BA Code',
						 'BA Name',
						 'Target',
						 'SKC',
						 'Hair',
						 'Ach.',
						 '% Ach.'
						 );
		foreach(range('B','K') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}

    	$outlets = array(
    					array(
    						'1',
    						'outlet_name' => 'Seam Bunly',
    						'address'     => 'Store: 146,147 (inside OLP)',
    						'ba_code'      => '001',
    						'ba_name'	  => 'Ban Sophanet'
    					),
    					array(
    						'2',
    						'outlet_name' => 'Lam Hong',
    						'address'     => '# 22, St 199,Outside Olypich',
    						'ba_code'      => '002',
    						'ba_name'	  => 'Khun Socheatha'
    					)
    			);
    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');
    	

    	/*$row = 6;
    	foreach($outlets as $outlet){
    		$this->excel->getActiveSheet()->setCellValue('A'.$row, $outlet["outlet_name"]);
    		$this->excel->getActiveSheet()->setCellValue('B'.$row, $outlet["outlet_address"]);
    		$this->excel->getActiveSheet()->setCellValue('C'.$row, $outlet["ba_code"]);
    		$this->excel->getActiveSheet()->setCellValue('D'.$row, $outlet["ba_name"]);
    		$row++;
    	}*/
		//merge cell A1 until D1
		//$this->excel->getActiveSheet()->mergeCells('A1:D1');
		//set aligment to center for that merged cell (A1 to D1)
		//$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//$this->excel->getActiveSheet()->freezePane('B2');
		$filename='OUTLET_REPORT'.'_'.date('YmdHis').'.xlsx'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	public function amount($year){
				//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('OUTLET_TOTAL_AMOUNT_YEAR_'.$year);

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Total Amount");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');
		
		$headers = array('No',
						 'Outlet Name',
						 'January',
						 'Febuary',
						 'March',
						 'April',
						 'May',
						 'June',
						 'July',
						 'August',
						 'September',
						 'October',
						 'November',
						 'December'
						 );
		foreach(range('B','O') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(false);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setWidth(12);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}
    	$this->excel->getActiveSheet()->getColumnDimension("B")->setWidth(5);
    	$this->excel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

    	$this->load->model('dao/Daoexcelreport');
    	$outlets = $this->Daoexcelreport->getOutletSaleAmountPerYear($year);	
    	$this->excel->getActiveSheet()->freezePane('B6');
    	$styleArray = array(
		    'borders' => array(
		        'outline' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN
		            //'color' => array('argb' => 'FFFF0000'),
		        ),
		        'inside' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN
		        ),
		    ),
		);
		$this->excel->getActiveSheet()->getStyle('B5:O5')->applyFromArray($styleArray);

    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');
    	$this->excel->getActiveSheet()->getStyle('B5:O'.(count($outlets)+5))->applyFromArray($styleArray);

		$filename='OUTLET_TOTAL_AMOUNT_IN_YEAR_'.$year.'_'.date('YmdHis').'.xlsx'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	public function quantity($year){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('OUTLET_TOTAL_QUANTITY_YEAR_'.$year);

		$this->excel->getActiveSheet()->setCellValue('B2',"BA's  and Outlet Sales Total Quantity");
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$this->excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
		$this->excel->getActiveSheet()
        			->getStyle('B2')
        			->getFill()
        			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        			->getStartColor()
        			->setRGB('FF6699');
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('B2:K2');
		
		$headers = array('No',
						 'Outlet Name',
						 'Product Name',
						 'January',
						 'Febuary',
						 'March',
						 'April',
						 'May',
						 'June',
						 'July',
						 'August',
						 'September',
						 'October',
						 'November',
						 'December'
						 );
		foreach(range('B','P') as $key=>$columnID)
		{
				$this->excel->getActiveSheet()->setCellValue($columnID."5",$headers[$key]);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(false);
    			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setWidth(12);
    			$this->excel->getActiveSheet()->getStyle($columnID."5")->getFont()->setBold(true);
    	}
    	$this->excel->getActiveSheet()->getColumnDimension("A")->setWidth(1);
    	$this->excel->getActiveSheet()->getColumnDimension("B")->setWidth(5);
    	$this->excel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
    	$this->excel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

    	$this->load->model('dao/Daoexcelreport');
    	$outlets = $this->Daoexcelreport->		getOutletSaleQtyAmountPerYear($year);	
    	$this->excel->getActiveSheet()->freezePane('B6');
    	$styleArray = array(
		    'borders' => array(
		        'outline' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN
		            //'color' => array('argb' => 'FFFF0000'),
		        ),
		        'inside' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN
		        ),
		    ),
		);
		$this->excel->getActiveSheet()->getStyle('B5:P5')->applyFromArray($styleArray);
    	$this->excel->getActiveSheet()->fromArray($outlets, NULL, 'B6');
    	$this->excel->getActiveSheet()->getStyle('B5:P'.(count($outlets)+5))->applyFromArray($styleArray);

		$filename='OUTLET_TOTAL_QUANTITY_IN_YEAR_'.$year.'_'.date('YmdHis').'.xlsx'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
 
 	public function outlet_quantity(){
 		$this->load->model('dao/Daoexcelreport');
    	$data["outlets"] = $this->Daoexcelreport->getOutletSaleQtyAmountPerYear(2015,2);	
 		return $this->load->view("excel_reports/outlet_total_quantity", $data);
 	}

 	public function outlet_amount(){
 		$this->load->model('dao/Daoexcelreport');
    	$data["outlets"] = $this->Daoexcelreport->getoutletsaleAmountPerYear(2015,2);	
 		return $this->load->view("excel_reports/outlet_total_amount", $data);
 	}
}
?>
