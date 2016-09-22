<?php
	class User
	{
		protected $id;
		protected $nom;
		protected $pwd;

		public function __construct($id, $nom, $pwd)
		{
			$this->setId($id);
			$this->setNom($nom);
			$this->setPwd($pwd);
		}
/* setter */
		public function setId($id)
		{
			if (!isset($this->id)) {
				$this->id = $id;
			}
		}

		public function setNom($nom)
		{
			if (!isset($this->nom)) {
				$this->nom = $nom;
			}
		}

		public function setPwd($pwd)
		{
			if (!isset($this->pwd)) {
				$this->pwd = $pwd;
			}
		}
/* getter */
		public function getId()
		{
			return $this->id;
		}

		public function getNom()
		{
			return $this->nom;
		}

		public function getPwd()
		{
			return $this->pwd;
		}
	}
?>