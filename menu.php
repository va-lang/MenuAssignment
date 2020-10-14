<? php 
 
    class menu {
        //attributes
        private $min_role;
        private $text;
        private $link;
        private $tool_tip;
        private $active=false;
        public  $user;
        public $active;
        private $menuItem
        
        //constructor
        function __construct($active, $user=3){
            $this->active = $active;
            $this->{$user} = "dynamic";
        }

        //get_html
        function get_html() {
            $active_class = $this->active ? ' class="active-menu" ' : "";
        
            $html = '<div class="sub-menu"><div class="menu-item"><span class="tooltip">'.$this->tool_tip . '</span>';
            $html .= '<button id="mi"' . $this->text . '"' . $active_class . '">' . $this->text . '</button></div>';
            $html .='<div class="sub-menu-container">';
            foreach($this->sub_menus as $menu ) {
                $html .= $menu->get_html();
            }
            
            $html .= "</div></div>";  // close the sub-menu container and sub-menu div's
            return $html;
        }    
            //Create a method, named add_menu_item that takes a Menu_Item property to add to the private menuItem collection
        function add_menu_Item(){
            $this->menuItem = array(
                new Menu_Item("Home","/",3,"Opening Screen"),
                new Menu_Item("Dashboard","dashboard.php",3,"Your Dashboard"),
                new Menu_Item("Mark","mark_attendance.php",3,"Mark Attendance"),
                new Menu_Item("Past","attendance_log.php",3,"Past Attendance"),
                new Pull_Down_Menu_Item("Manage",[new Menu_Item("Add Student","add_student.php",2,"Add A student to the system"),
                new Menu_Item("Sessions","manage_sessions.php",2,"Add, Remove, Edit upcoming class sessions")
                ],2,"Manage Class"),
                new Menu_Item("Logout","../login/logout.php",3,"Logout of system")
            );
            
            array_push($this->menuItem,new Menu_Item("Home","/",3,"Opening Screen"),
            new Menu_Item("Dashboard","dashboard.php",3,"Your Dashboard"),
            new Menu_Item("Mark","mark_attendance.php",3,"Mark Attendance"),
            new Menu_Item("Past","attendance_log.php",3,"Past Attendance"),
            new Pull_Down_Menu_Item("Manage",[new Menu_Item("Add Student","add_student.php",2,"Add A student to the system"),
            new Menu_Item("Sessions","manage_sessions.php",2,"Add, Remove, Edit upcoming class sessions")
            ],2,"Manage Class"),
            new Menu_Item("Logout","../login/logout.php",3,"Logout of system")
            );
            print_r($this->menuItem);
        }

        //create a method to get_menu_item that takes a single parameter with the text of the menu items, and returns a Menu_Item class that matches it; or null if no menu_item matches it.
       function get_menu_item(){
        foreach($this->menuItem as $val){
            if($val==$Menu_Item){
                echo "Matches"
            }  
            else{
                 echo "Null"
            }
        }
       }

       function delete_menu_item(){
       //Create a method to remove a menu by passing a single parameter of the text name, called delete_menu_item()
       $this->menuItem = array_diff($this->menuItem, array("Home"));
       print_r($this->menuItem);
       }

    }


?>