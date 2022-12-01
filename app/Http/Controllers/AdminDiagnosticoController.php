<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminDiagnosticoController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {
	    	# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->table 			   = "diagnostico";	        
			$this->title_field         = "id";
			$this->limit               = 20;
			$this->orderby             = "id,desc";
			$this->show_numbering      = FALSE;
			$this->global_privilege    = FALSE;	        
			$this->button_table_action = TRUE;   
			$this->button_action_style = "button_icon";     
			$this->button_add          = TRUE;
			$this->button_delete       = TRUE;
			$this->button_edit         = TRUE;
			$this->button_detail       = TRUE;
			$this->button_show         = TRUE;
			$this->button_filter       = TRUE;        
			$this->button_export       = FALSE;	        
			$this->button_import       = FALSE;
			$this->button_bulk_action  = TRUE;	
			$this->sidebar_mode		   = "normal"; //normal,mini,collapse,collapse-mini
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"ID","name"=>"id"];
			$this->col[] = ["label"=>"Equipo","name"=>"id_Equipo"];
			$this->col[] = ["label"=>"Ticket","name"=>"id_Ticket"];
			$this->col[] = ["label"=>"Fecha de diagnóstico","name"=>"created_at"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
		$this->form = [];
		$this->form[] = ["label"=>"DG PS 01 ENCENDIDO","name"=>"DG_PS_01_ENCENDIDO","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 02 START TIME","name"=>"DG_PS_02_START_TIME","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 03 MSJE ERROR","name"=>"DG_PS_03_MSJE_ERROR","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 04 EMICION SONIDOS","name"=>"DG_PS_04_EMICION_SONIDOS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 05 DATETIME SYS","name"=>"DG_PS_05_DATETIME_SYS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 06 DRIVERS","name"=>"DG_PS_06_DRIVERS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 07 REND CPU","name"=>"DG_PS_07_REND_CPU","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 08 REND RAM","name"=>"DG_PS_08_REND_RAM","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 09 REND HDD","name"=>"DG_PS_09_REND_HDD","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 10 REND RED","name"=>"DG_PS_10_REND_RED","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 11 ANTIVIRUS","name"=>"DG_PS_11_ANTIVIRUS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 12 OFFICE","name"=>"DG_PS_12_OFFICE","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 13 OTROS PROG","name"=>"DG_PS_13_OTROS_PROG","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 14 COPIA SISTEMA","name"=>"DG_PS_14_COPIA_SISTEMA","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 15 COPIA ARCHIVOS","name"=>"DG_PS_15_COPIA_ARCHIVOS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 16 VERSION SO","name"=>"DG_PS_16_VERSION_SO","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PS 17 DATETIME LAST UPDATE","name"=>"DG_PS_17_DATETIME_LAST_UPDATE","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 01 SCREEN","name"=>"DG_PH_01_SCREEN","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 02 RAM","name"=>"DG_PH_02_RAM","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 03 HDD","name"=>"DG_PH_03_HDD","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 04 CORE","name"=>"DG_PH_04_CORE","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 05 GPU","name"=>"DG_PH_05_GPU","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 06 KEYBOARD","name"=>"DG_PH_06_KEYBOARD","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 07 MOUSETRACK","name"=>"DG_PH_07_MOUSETRACK","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 08 WIFI","name"=>"DG_PH_08_WIFI","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 09 BATERY","name"=>"DG_PH_09_BATERY","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 10 START BUTTON","name"=>"DG_PH_10_START_BUTTON","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 11 CHASIS","name"=>"DG_PH_11_CHASIS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 12 CAMERA","name"=>"DG_PH_12_CAMERA","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 13 MBOARD","name"=>"DG_PH_13_MBOARD","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 14 FAN","name"=>"DG_PH_14_FAN","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 15 FLEX","name"=>"DG_PH_15_FLEX","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 16 BIOS BATERY","name"=>"DG_PH_16_BIOS_BATERY","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 17 MIC","name"=>"DG_PH_17_MIC","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 18 BISAGRAS","name"=>"DG_PH_18_BISAGRAS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 19 PERNOS","name"=>"DG_PH_19_PERNOS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 20 ETHERNET","name"=>"DG_PH_20_ETHERNET","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 21 DISCIPADOR","name"=>"DG_PH_21_DISCIPADOR","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 22 PARLANTES","name"=>"DG_PH_22_PARLANTES","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"DG PH 23 PUERTOS","name"=>"DG_PH_23_PUERTOS","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
		$this->form[] = ["label"=>"Equipo","name"=>"id_Equipo","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"Equipo,id"];
		$this->form[] = ["label"=>"Ticket","name"=>"id_Ticket","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"Ticket,id"];

			# END FORM DO NOT REMOVE THIS LINE     

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}