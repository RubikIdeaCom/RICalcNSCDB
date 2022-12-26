<?php
/*
	@source https://github.com/RubikIdeaCom/RICalcNSCDB Simple Calculator by PHP using NO Session or Cookie or DB
	@version 1.0.0
	@author RubikIdea.com (Ali Seyedabadi) <info@rubikidea.com>
	@link https://www.linkedin.com/in/ali-seyedabadi/
	@link http://rubikidea.com/
	@copyright 2009 rubikidea.com
	@license MIT
*/
final class RICalcNSCDB {
	public $num;
	public $firstNum;
	public $lastNum;
	public $lastOperator;
	public $ao;
	public $addedOperatorsFlag;
	public $newNum;
	public $operator;
	public $result;

    public function __construct() {
    }

	final public function __destruct() {
		
	}

	final public function emptyFunc() {

	}

	final public function CLR() {
		$this->result = $this->lastNum = $this->firstNum = 0;
		unset($_POST);
	}

	final public function SQRT() {
		if($this->lastNum != null) {
			$this->lastNum = sqrt($this->lastNum);
			$this->result = $this->lastNum;
			$this->addedOperatorsFlag = 1;
		} else {
			$this->firstNum = sqrt($this->firstNum);
			$this->result = $this->firstNum;
			$this->addedOperatorsFlag = 1;
		}
	}

	final public function X1() {
		settype($this->firstNum , 'double');
		settype($this->lastNum , 'double');

		if($this->lastNum != 0) {
			$this->lastNum = 1/$this->lastNum;
			$this->result = $this->lastNum;
			$this->addedOperatorsFlag = 1;
		} else if($this->firstNum != 0) {
			$this->firstNum = 1/$this->firstNum;
			$this->result = $this->firstNum;
			$this->addedOperatorsFlag = 1;
		} else {
			$this->result = 0;
		}
	}

	final public function positiveNegative() {
		if($this->lastNum != null) {
			$this->lastNum *= -1;
			$this->result = $this->lastNum;
			$this->addedOperatorsFlag = 1;
		} else {
			$this->firstNum *= -1;
			$this->result = $this->firstNum;
			$this->addedOperatorsFlag = 1;
		}
	}

	final public function point() {
		if($this->lastNum == null && $this->lastOperator == null) {
			settype($this->firstNum , 'string');
			if(strpos($this->firstNum , '.') == false) {
				$this->firstNum .= '.';
				if(strlen($this->firstNum) == 1)
					$this->firstNum = '0.';
				$this->result = $this->firstNum;
				$this->addedOperatorsFlag = 1;
			} else {
				$this->addedOperatorsFlag = 1;
				$this->result = $this->firstNum = $_POST['firstNum'];
			}
		} else {
			settype($this->lastNum , 'string');
			if(strpos($this->lastNum , '.') == false) {
				$this->lastNum .= '.';
				if(strlen($this->lastNum) == 1)
					$this->lastNum = '0.';
				$this->result = $this->lastNum;
				$this->addedOperatorsFlag = 1;						
			} else {
				$this->addedOperatorsFlag = 1;
				$this->result = $this->lastNum = $_POST['lastNum'];
			}
		}
	}

	final public function backspace() {
		if($this->lastNum != 0) {
			settype($this->lastNum , 'string');
			for($i = 0; $i < strlen($this->lastNum)-1; $i++) {
				$this->newNum .= $this->lastNum[$i];
			}
			if(strlen($this->newNum) == 0) {
				$this->newNum = 0;
			}
			$this->result = $this->newNum;
			$this->lastNum = $this->newNum;
			$this->addedOperatorsFlag = 1;
		} else if($this->firstNum != 0) {
			settype($this->firstNum , 'string');
			for($i = 0; $i < strlen($this->firstNum)-1; $i++) {
				$this->newNum .= $this->firstNum[$i];
			}
			if(strlen($this->newNum) == 0) {
				$this->newNum = 0;
			}
			$this->result = $this->newNum;
			$this->firstNum = $this->newNum;
			$this->addedOperatorsFlag = 1;
		}  else {
			$this->firstNum = $this->lastNum = $this->result = 0;
		}
	}

	final public function CE() {
		if($this->lastNum != null) {
			$this->lastNum *= 0;
			$this->result = $this->lastNum;
			$this->addedOperatorsFlag = 1;
		} else {
			$this->firstNum *= 0;
			$this->lastOperator = null;
			$this->result = $this->firstNum;
			$this->addedOperatorsFlag = 1;
		}
	}

	final public function handleAO() {
		switch($this->ao) {
			case 'sqrt':
				$this->SQRT();
			break;
			case '1/x':
				$this->X1();
			break;
			case '+/-':
				$this->positiveNegative();
			break;
			case '.':
				$this->point();
			break;
			case 'backspace':
				$this->backspace();
			break;
			case 'CE':
				$this->CE();
			break;
		}
	}

	final public function handleLastOperator() {
		switch($this->lastOperator)  {
			case '-':
				$this->result = $this->firstNum - $this->lastNum;
			break;
			case '+':
				$this->result = $this->firstNum + $this->lastNum;
			break;
			case '*':
				$this->result = $this->firstNum * $this->lastNum;
			break;
			case '/':
				$this->result = $this->firstNum / $this->lastNum;
			break;						
		}
		$this->operatorsFlag = 1;
		$this->lastNum = null;
		$this->firstNum = $this->result;
	}

	final public function handleFinalResult() {
		switch($this->lastOperator) {
			case '-':
				$this->result = $this->firstNum - $this->lastNum;
			break;
			case '+':
				$this->result = $this->firstNum + $this->lastNum;
			break;
			case '*':
				if($this->lastNum == 0) {
					$this->lastNum = 1;
				}
				$this->result = $this->firstNum * $this->lastNum;
				$this->lastNum = 0;
			break;
			case '/':
				if($this->lastNum == 0) {
					$this->lastNum = 1;
				}
				$this->result = $this->firstNum / $this->lastNum;
				$this->lastNum = 0;
			break;
			default:
				$this->result = $_POST['result'];
			break;
		}
		$this->lastNum = null;
		$this->lastOperator = null;
		$this->firstNum = null;
	}
}
	$RICalcNSCDBObj = new RICalcNSCDB();
	if(count($_POST) > 0) {
		$RICalcNSCDBObj->lastNum = $_POST['lastNum'];
		$RICalcNSCDBObj->firstNum = $_POST['firstNum'];
		$RICalcNSCDBObj->lastOperator = $_POST['lastOperator'];

		if(isset($_POST['ao'])) {
			if($_POST['ao'] == 'CLR') {
				$RICalcNSCDBObj->CLR();
			} else {
				$RICalcNSCDBObj->ao = $_POST['ao'];
			}
		} else if(isset($_POST['num'])) {
			$RICalcNSCDBObj->num = $_POST['num'];
		} else if (isset($_POST['operator'])) {
			$RICalcNSCDBObj->operator = $_POST['operator'];
		}
		
		if((isset($_POST['ao']) || isset($_POST['operator'])) && $RICalcNSCDBObj->firstNum == null) {
			$RICalcNSCDBObj->firstNum = $_POST['result'];
		}
			
		if($RICalcNSCDBObj->ao != null) {
			$RICalcNSCDBObj->handleAO();
		} else if($RICalcNSCDBObj->operator != null && $RICalcNSCDBObj->lastOperator != null && $RICalcNSCDBObj->lastNum != null) {
			$RICalcNSCDBObj->handleLastOperator();
		}
		
		if($RICalcNSCDBObj->operator != null)  {
			$RICalcNSCDBObj->lastOperator = $RICalcNSCDBObj->operator;
			$RICalcNSCDBObj->result = $RICalcNSCDBObj->firstNum;
		}
		
		if($RICalcNSCDBObj->lastNum == null && $RICalcNSCDBObj->operator == null && $RICalcNSCDBObj->lastOperator == null && $RICalcNSCDBObj->ao == null) {
			$RICalcNSCDBObj->firstNum .= $RICalcNSCDBObj->num;
			settype($RICalcNSCDBObj->firstNum , 'double');
			$RICalcNSCDBObj->result = $RICalcNSCDBObj->firstNum;
		} else if($RICalcNSCDBObj->lastNum != null && $RICalcNSCDBObj->operator == null && $RICalcNSCDBObj->ao == null && !isset($_POST['finalResult'])) {
			$RICalcNSCDBObj->lastNum .= $RICalcNSCDBObj->num;
			settype($RICalcNSCDBObj->lastNum , 'double');
			$RICalcNSCDBObj->result = $RICalcNSCDBObj->lastNum;
		} else if(!$RICalcNSCDBObj->addedOperatorsFlag && $RICalcNSCDBObj->operator == null && !isset($_POST['finalResult']) && $RICalcNSCDBObj->firstNum != 0) {
			$RICalcNSCDBObj->lastNum = $RICalcNSCDBObj->num;
			if($RICalcNSCDBObj->result == null)
				$RICalcNSCDBObj->result = $RICalcNSCDBObj->lastNum;
		}
	
		if(isset($_POST['finalResult'])) {
			$RICalcNSCDBObj->handleFinalResult();
		}
	}
?>