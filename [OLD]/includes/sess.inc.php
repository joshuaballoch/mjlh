<?

class Sess
{
	var $lang;

	function Sess()
	{
		if (session_is_registered("lang"))
		{
			$this->lang = $_SESSION["lang"];
		}
		else
		{
			session_register("lang");
			$this->lang = "en";
			$this->save();
		}
	}
	
	function save()
	{
		$_SESSION["lang"]=$this->lang;
	}
	
	function switch_lang()
	{		
		if ($this->lang == "en")
		{
			$this->lang = "fr";
		}
		else
			$this->lang = "en";
			
		$_SESSION["lang"]=$this->lang;
	}

}



?>