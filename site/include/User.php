<?php
	class User
	{
		private $id;
		private $nom;
		private $pwd;

		/**
		 * @return mixed
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * @param mixed $id
		 */
		public function setId($id)
		{
			$this->id = $id;
		}
		/**
		 * @return mixed
		 */
		public function getNom()
		{
			return $this->nom;
		}

		/**
		 * @param mixed $nom
		 */
		public function setNom($nom)
		{
			$this->nom = $nom;
		}
		/**
		 * @return mixed
		 */
		public function getPwd()
		{
			return $this->pwd;
		}

		/**
		 * @param mixed $pwd
		 */
		public function setPwd($pwd)
		{
			$this->pwd = $pwd;
		}

		public  function logIn($id, $nom, $pwd){
			$this->setId($id);
			$this->setNom($nom);
			$this->setPwd($pwd);
		}
	}
?>