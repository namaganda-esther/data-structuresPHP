<?php
class ReadingList
{
    protected $stack;
    protected $limit;
    
    public function __construct($limit = 10) {
        // initialize the stack
        $this->stack = array();
        // stack can only contain this many items
        $this->limit = $limit;
    }

    public function push($item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!'); 
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
	      throw new RunTimeException('Stack is empty!');
	  } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    public function displayStack(){
        return $this->stack;
    }
}

$myFarm = new ReadingList();

// adding items
$myFarm->push('Maize');
$myFarm->push('Beans');
$myFarm->push('Potatoes');
$myFarm->push('Matooke');
$myFarm->push('Cassava'); 
$myFarm->push('Wheat');

$result = $myFarm->displayStack();

var_dump($result);

// deleting items
echo $myFarm->pop(); 
echo $myFarm->pop(); 

?>

