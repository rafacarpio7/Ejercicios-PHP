<?php
class Publisher  
{
    private static $id=0;
    private $name;
    private $address;
    private $telephone;
    private $website;

    function __construct($name,$address,$telephone,$website)
    {
        self::$id++;
        $this->name=$name;
        $this->address=$address;
        $this->telephone=$telephone;
        $this->website=$website;
    }

    public function get_Id () {
        return $this->id;
    }

    public function set_Id($id)
    {
        $this->id=$id;
    }

    public function get_Name()
    {
        return $this->name;
    }

    public function set_Name($name)
    {
        $this->name=$name;
    }

    public function get_Address()
    {
        return $this->address;
    }

    public function set_Address($address)
    {
        $this->address=$address;
    }

    public function get_Telephone()
    {
        return $this->telephone;
    }

    public function set_Telephone($telephone)
    {
        $this->telephone=$telephone;
    }

    public function get_Website()
    {
        return $this->website;
    }

    public function set_Website($website)
    {
        $this->website=$website;
    }

    
}

?>