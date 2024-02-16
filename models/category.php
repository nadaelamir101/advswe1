<?php
  require_once(__ROOT__ . "model/Model.php");
?>
<?php 
class category extends Model{
private $category_id;
private $category_name;

function set_category_id ($category_id)
{
    $this->category_id = $category_id;
}

function get_category_id()
{
    return  $this->category_id;
}

function set_category_name ($category_name)
{
    $this->category_name = $category_name;
}

function get_category_name()
{
    return  $this->category_name;
}


}


?>